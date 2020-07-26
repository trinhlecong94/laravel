<?php

namespace App\Repositories\Promotion;

use App\Models\Promotion;
use App\Repositories\BaseRepository;

class PromotionRepository extends BaseRepository implements PromotionRepositoryInterface
{
    protected $model;

    public function __construct(Promotion $model)
    {
        parent::__construct($model);
    }
}
