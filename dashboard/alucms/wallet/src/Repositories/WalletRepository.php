<?php
/**
 * WalletRepository.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Wallet\Repositories;

use AluCMS\User\Models\User;
use AluCMS\Wallet\Models\Wallet;
use Prettus\Repository\Eloquent\BaseRepository;

class WalletRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Wallet::class;
    }

    public function search($keyword)
    {
        return $this->with('user')->scopeQuery(function ($e) use ($keyword) {
            return $e->where('username', 'LIKE', '%'.$keyword.'%');
        })->paginate(config('core.paginate'));
    }

    public function createWallet($data)
    {
        $userId = $data['user_id'];
        $user = User::find($userId);
        $data['username'] = $user->username;
        $this->create($data);
    }

    public function changeAmount($userId, $amount, $type)
    {
        $wallet = $this->findWhere([
            'user_id' => $userId
        ])->first();

        $currentAmount = $wallet->amount;
        $newAmount = $currentAmount;

        if ($type == 'cash_in') {
            $newAmount = $currentAmount + floatval($amount);
        } elseif ($type == 'withdraw') {
            $newAmount = $currentAmount - floatval($amount);
        }

        $this->update([
            'amount' => $newAmount
        ], $wallet->id);
    }
}
