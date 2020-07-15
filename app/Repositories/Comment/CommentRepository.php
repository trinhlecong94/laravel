<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    /**
     * @var Comment
     */
    protected $model;

    /**
     * CommentRepository constructor.
     *
     * @param Comment $model
     */
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
}
