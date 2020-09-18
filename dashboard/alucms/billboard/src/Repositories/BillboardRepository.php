<?php
/**
 * BillboardRepository.php
 * Created by: trainheartnet
 * Created at: 9/18/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Billboard\Repositories;

use AluCMS\Award\Models\Award;
use AluCMS\Billboard\Models\Billboard;
use Carbon\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;

class BillboardRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Billboard::class;
    }

    public function getWinner()
    {
        $lastAwardHasWinner = Award::where('status', 'disable')->latest()->first();
        $billboards = [];
        if ($lastAwardHasWinner) {
            $billboards = $this->with('user')->findWhere([
                'result_id' => $lastAwardHasWinner->id
            ]);
        }

        return $billboards;
    }
}
