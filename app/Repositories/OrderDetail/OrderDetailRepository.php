<?php

namespace App\Repositories\OrderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    /**
     * @var OrderDetail
     */
    protected $model;

    /**
     * OrderDetailRepository constructor.
     *
     * @param OrderDetail $model
     */
    public function __construct(OrderDetail $model)
    {
        parent::__construct($model);
    }
}
