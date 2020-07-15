<?php

namespace App\Repositories\Favorite;

use App\Models\Favorite;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    /**
     * @var Favorite
     */
    protected $model;

    /**
     * FavoriteRepository constructor.
     *
     * @param Favorite $model
     */
    public function __construct(Favorite $model)
    {
        parent::__construct($model);
    }
}
