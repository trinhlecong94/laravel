<?php

namespace App\Repositories\Favorite;

use App\Models\Favorite;
use App\Repositories\BaseRepository;

class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    protected $model;

    public function __construct(Favorite $model)
    {
        parent::__construct($model);
    }
}
