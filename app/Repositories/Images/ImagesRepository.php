<?php

namespace App\Repositories\Images;

use App\Models\Images;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class ImagesRepository extends BaseRepository implements ImagesRepositoryInterface
{
    /**
     * @var Images
     */
    protected $model;

    /**
     * ImagesRepository constructor.
     *
     * @param Images $model
     */
    public function __construct(Images $model)
    {
        parent::__construct($model);
    }
}
