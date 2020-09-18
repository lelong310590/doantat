<?php
/**
 * ThemeWithdrawalController.php
 * Created by: trainheartnet
 * Created at: 9/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Bank\Repositories\BankRepository;
use AluCMS\Notification\Repositories\NotificationRepository;
use AluCMS\Theme\Http\Requests\WithdrawalRequest;
use AluCMS\Wallet\Repositories\WalletRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ThemeWithdrawalController extends BaseController
{
    /**
     * @param BankRepository $bankRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getIndex(
        BankRepository $bankRepository,
        NotificationRepository $notificationRepository,
        WalletRepository  $walletRepository
    )
    {

        $banks = $bankRepository->findWhere([
            'user_id' => Auth::id()
        ], ['id', 'bank_name', 'bank_number']);

        if ($banks->count() == 0) {
            return redirect()->route('theme.bank_index.get')->withErrors('Hãy tạo ít nhất 01 tài khoản ngân hàng để gửi yêu cầu rút tiền');
        }

        $today = Carbon::now()->format('Y-m-d');
        $successWithdrawal = $notificationRepository->scopeQuery(function ($q) use ($today) {
            return $q->whereDate('created_at', $today)->where([
                ['type', '=', 'withdraw'],
                ['status', '=', 'processed']
            ]);
        })->get();

        $balance = $walletRepository->findWhere([
            'user_id' => Auth::id()
        ],  ['amount'])->first();

        $notification = $notificationRepository->scopeQuery(function ($q) {
            return $q->where([
                ['status', '!=', 'rejected'],
                ['type', '=', 'withdraw'],
                ['user_id', '=', Auth::id()]
            ]);
        })->paginate(10);

        return view('theme::layouts.withdrawal', [
            'successWithdrawal' => $successWithdrawal,
            'balance' => $balance->amount,
            'banks' => $banks,
            'notification' => $notification
        ]);
    }

    /**
     * @param WithdrawalRequest $request
     * @param NotificationRepository $notificationRepository
     * @param BankRepository $bankRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postIndex(
        WithdrawalRequest $request,
        NotificationRepository $notificationRepository,
        BankRepository $bankRepository
    )
    {
        $amount = $request->get('amount');
        $status = 'wait';
        $type = 'withdraw';
        $bank = $request->get('bank_name');
        $payPassword = $request->get('pay_password');

        if (Hash::check($payPassword, Auth::user()->pay_password)) {
            return redirect()->back()->withErrors('Mật khẩu thanh toán không chính xác');
        }

        $bankDetail = $bankRepository->find($bank, [
            'bank_name', 'bank_branch', 'bank_number', 'bank_holder', 'created_at'
        ]);

        $now = Carbon::now();
        $dt = Carbon::createFromFormat("Y-m-d H:i:s", $bankDetail->created_at);
        if ($now->diffInHours($dt) < 6 ) {
            return redirect()->back()->withErrors('Tài khoản ngân hàng mới thêm chưa đủ 6 tiếng');
        }

        $content = '<p>Yêu cầu rút tiền từ tài khoản '.Auth::user()->username.'</p>';
        $content .= '<p>Về ngân hàng: '.$bankDetail->bank_name.'</p>';
        $content .= '<p>Chi nhánh: '.$bankDetail->bank_branch.'</p>';
        $content .= '<p>Số tài khoản: '.$bankDetail->bank_number.'</p>';
        $content .= '<p>Tên người nhận: '.$bankDetail->bank_holder.'</p>';
        $content .= '<p>Số tiền rút: '.number_format($amount).' VNĐ</p>';

        $notificationRepository->create([
            'content' => $content,
            'type' => $type,
            'amount' => $amount,
            'user_id' => Auth::id(),
            'status' => $status
        ]);

        return redirect()->back()->with([
            'message' => 'Bạn đã gửi yêu cầu rút tiền thành công, hệ thống sẽ xử lý trong ít phút'
        ]);
    }
}
