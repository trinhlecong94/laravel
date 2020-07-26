<?php

namespace App\Repositories\OrderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepository;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{

    protected $model;

    public function __construct(OrderDetail $model)
    {
        parent::__construct($model);
    }
}
