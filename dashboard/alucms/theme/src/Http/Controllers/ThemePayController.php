<?php
/**
 * ThemePayController.php
 * Created by: trainheartnet
 * Created at: 8/28/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Core\Supports\FlashMessages;
use AluCMS\Notification\Repositories\NotificationRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;

class ThemePayController extends BaseController
{
    protected $notification;

    public function __construct(Request $request, LaravelDebugbar $debugbar, NotificationRepository $notificationRepository)
    {
        parent::__construct($request, $debugbar);
        $this->notification = $notificationRepository;
    }

    public function getPay()
    {
        return view('theme::layouts.pay_create', [
            'notification' => $this->notification->scopeQuery(function ($q) {
                return $q->where([
                    ['status', '!=', 'rejected'],
                    'type' => 'cash_in'
                ]);
            })->paginate(10)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postPay(Request $request)
    {
        $data = $request->all();
        $data['type'] = 'cash_in';
        $data['content'] = 'Yêu cầu nạp '.number_format($request->get('amount')).' VNĐ vào tài khoản '.$request->get('username');
        $this->notification->create($data);
        return redirect()->back()->with([
            'message' => 'Bạn đã gửi yêu cầu nạp tiền thành công, hệ thống sẽ xử lý trong ít phút'
        ]);
    }
}
