<?php

namespace App\Repositories\Images;

use App\Models\Images;
use App\Repositories\BaseRepository;

class ImagesRepository extends BaseRepository implements ImagesRepositoryInterface
{
    protected $model;

    public function __construct(Images $model)
    {
        parent::__construct($model);
    }
}
