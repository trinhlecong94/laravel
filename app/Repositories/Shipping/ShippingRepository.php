<?php

namespace App\Repositories\Shipping;

use App\Models\Shipping;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class ShippingRepository extends BaseRepository implements ShippingRepositoryInterface
{
    /**
     * @var Shipping
     */
    protected $model;

    /**
     * ShippingRepository constructor.
     *
     * @param Shipping $model
     */
    public function __construct(Shipping $model)
    {
        parent::__construct($model);
    }
}
