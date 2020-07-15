<?php

namespace App\Repositories\Promotion;

use App\Models\Promotion;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class PromotionRepository extends BaseRepository implements PromotionRepositoryInterface
{
    /**
     * @var Promotion
     */
    protected $model;

    /**
     * PromotionRepository constructor.
     *
     * @param Promotion $model
     */
    public function __construct(Promotion $model)
    {
        parent::__construct($model);
    }
}
