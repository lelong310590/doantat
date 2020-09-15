<?php
/**
 * BankRepository.php
 * Created by: trainheartnet
 * Created at: 9/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Bank\Repositories;

use AluCMS\Bank\Models\Bank;
use Prettus\Repository\Eloquent\BaseRepository;

class BankRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Bank::class;
    }
}
