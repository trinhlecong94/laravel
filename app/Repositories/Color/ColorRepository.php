<?php

namespace App\Repositories\Color;

use App\Models\Color;
use App\Repositories\BaseRepository;

class ColorRepository extends BaseRepository implements ColorRepositoryInterface
{
    protected $model;

    public function __construct(Color $model)
    {
        parent::__construct($model);
    }
}
