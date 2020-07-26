<?php

namespace App\Repositories\Shipping;

use App\Models\Shipping;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

class ShippingRepository extends BaseRepository implements ShippingRepositoryInterface
{
    protected $model;

    public function __construct(Shipping $model)
    {
        parent::__construct($model);
    }
}
