<?php

namespace App\Repositories\Size;

use App\Models\Size;
use App\Repositories\BaseRepository;

class SizeRepository extends BaseRepository implements SizeRepositoryInterface
{
    protected $model;

    public function __construct(Size $model)
    {
        parent::__construct($model);
    }
}
