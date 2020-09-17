<?php
/**
 * NotificationController.php
 * Created by: trainheartnet
 * Created at: 8/31/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Notification\Http\Controllers;

use AluCMS\Core\Supports\FlashMessages;
use AluCMS\Notification\Repositories\NotificationRepository;
use AluCMS\Wallet\Repositories\WalletRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends BaseController
{
    protected $notification;

    public function __construct(Request $request, LaravelDebugbar $debugbar, NotificationRepository $notificationRepository)
    {
        parent::__construct($request, $debugbar);
        $this->notification = $notificationRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getIndex(Request $request) : View
    {
        $keywords = $request->get('keywords');
        $type = $request->get('type');

        $notification = $this->notification->scopeQuery(function ($q) use ($type) {
            return $q->with('user')->where('type', $type);
        })->paginate(config('core.paginate'));

        if ($keywords) {
            $notification = $this->notification->search($keywords, $type);
        }

        return view('notification::index', [
            'notification' => $notification
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function getEdit($id) : View
    {
        return view('notification::edit', [
            'notification' => $this->notification->with('user')->find($id)
        ]);
    }

    public function postEdit($id, Request $request, WalletRepository $walletRepository)
    {
        $data = $request->all();
        $this->notification->update($data, $id);

        if ($request->get('status') == 'processed') {
            $amount = $request->get('amount');
            $userId = $request->get('user_id');
            try {
                $walletRepository->changeAmount($userId, $amount, $data['type']);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(trans('dashboard::error.error.create'));
            }
        }

        return redirect()->route('alucms::notification.index.get', ['type' => $data['type']])->with(FlashMessages::returnMessage('edit'));
    }
}
