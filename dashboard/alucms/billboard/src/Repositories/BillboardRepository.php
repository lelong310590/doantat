<?php
/**
 * BillboardRepository.php
 * Created by: trainheartnet
 * Created at: 9/18/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Billboard\Repositories;

use AluCMS\Billboard\Models\Billboard;
use Prettus\Repository\Eloquent\BaseRepository;

class BillboardRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Billboard::class;
    }
}
