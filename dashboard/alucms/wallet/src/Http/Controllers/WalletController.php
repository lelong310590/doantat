<?php
/**
 * WalletController.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Wallet\Http\Controllers;

use AluCMS\Core\Supports\FlashMessages;
use AluCMS\User\Repositories\UserRepository;
use AluCMS\Wallet\Http\Requests\WalletCreateRequest;
use AluCMS\Wallet\Repositories\WalletRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WalletController extends BaseController
{
    protected $wallet;

    public function __construct(Request $request, LaravelDebugbar $debugbar, WalletRepository $walletRepository)
    {
        parent::__construct($request, $debugbar);
        $this->wallet = $walletRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getIndex(Request $request) : View
    {
        $keywords = $request->get('keywords');
        $wallet = $this->wallet->with('user')->paginate(config('core.paginate'));
        if ($keywords) {
            $wallet = $this->wallet->search($keywords);
        }

        return view('wallet::index', [
            'wallet' => $wallet
        ]);
    }

    /**
     * @param UserRepository $userRepository
     * @return View
     */
    public function getCreate(UserRepository $userRepository) : View
    {
        return view('wallet::create', [
            'users' => $userRepository->all()
        ]);
    }

    /**
     * @param WalletCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(WalletCreateRequest $request) : RedirectResponse
    {
        $this->wallet->createWallet($request->all());
        return redirect()->back()->with(FlashMessages::returnMessage('create'));
    }

    /**
     * @param $id
     * @param UserRepository $userRepository
     * @return View
     */
    public function getEdit($id, UserRepository $userRepository) : View
    {
        return view('wallet::edit', [
            'users' => $userRepository->all(),
            'wallet' => $this->wallet->find($id)
        ]);
    }

    public function postEdit($id, Request $request)
    {
        $this->wallet->update($request->all(), $id);
        return redirect()->back()->with(FlashMessages::returnMessage('edit'));
    }
}
