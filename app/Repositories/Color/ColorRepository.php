<?php

namespace App\Repositories\Color;

use App\Models\Color;
use App\Repositories\BaseRepository;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class ColorRepository extends BaseRepository implements ColorRepositoryInterface
{
    /**
     * @var Color
     */
    protected $model;

    /**
     * ColorRepository constructor.
     *
     * @param Color $model
     */
    public function __construct(Color $model)
    {
        parent::__construct($model);
    }
}
