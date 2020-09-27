<?php
/**
 * PostRepository.php
 * Created by: trainheartnet
 * Created at: 9/19/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Post\Repositories;

use AluCMS\Post\Models\Post;
use Prettus\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Post::class;
    }
}
