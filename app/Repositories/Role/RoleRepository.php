<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;

    function __construct(Role $model)
    {
        parent::__construct($model);
    }
}
