<?php
/**
 * ThemeBankController.php
 * Created by: trainheartnet
 * Created at: 9/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Bank\Repositories\BankRepository;
use AluCMS\Core\Supports\FlashMessages;
use AluCMS\Theme\Http\Requests\CreateBankRequest;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ThemeBankController extends BaseController
{
    protected $bank;

    public function __construct(Request $request, LaravelDebugbar $debugbar, BankRepository $bankRepository)
    {
        parent::__construct($request, $debugbar);
        $this->bank = $bankRepository;
    }

    /**
     * @return View
     */
    public function getIndex() : View
    {
        $banks = $this->bank->findWhere([
            'user_id' => Auth::id()
        ]);
        return view('theme::layouts.bank_index', [
            'bank' => $banks
        ]);
    }

    /**
     * @return View
     */
    public function getCreate() : View
    {
        $listBanks = config('core.bank_lists');
        return view('theme::layouts.bank_create', [
            'listBanks' => $listBanks
        ]);
    }

    /**
     * @param CreateBankRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postCreate(CreateBankRequest $request)
    {
        $user = Auth::user();
        $userPayPassword = $user->pay_password;
        $payPassword = $request->get('pay_password');

        if (!Hash::check($payPassword, $userPayPassword)) {
            return redirect()->back()->withErrors('Mật khẩu thanh toán không chính xác');
        }

        $data = $request->except('_token', 'bank_number_check', 'pay_password');
        $data['user_id'] = $user->id;

        $this->bank->create($data);

        return redirect()->route('theme.bank_index.get')->with([
            'message' => 'Thêm tài khoản ngân hàng thành công'
        ]);
    }

    public function getDelete($id)
    {
        $this->bank->delete($id);
        return redirect()->back()->with(FlashMessages::returnMessage('delete'));
    }
}
