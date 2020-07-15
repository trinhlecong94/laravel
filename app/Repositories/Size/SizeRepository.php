<?php

namespace App\Repositories\Size;

use App\Models\Size;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class SizeRepository extends BaseRepository implements SizeRepositoryInterface
{
    /**
     * @var Size
     */
    protected $model;

    /**
     * SizeRepository constructor.
     *
     * @param Size $model
     */
    public function __construct(Size $model)
    {
        parent::__construct($model);
    }
}
