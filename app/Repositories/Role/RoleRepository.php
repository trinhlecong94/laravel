<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * @var Role
     */
    protected $model;

    /**
     * RoleRepository constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}
