<?php

namespace App\Repositories\Account;

use App\Models\Account;
use App\Repositories\BaseRepository;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{
    /**
     * @var Account
     */
    protected $model;

    /**
     * AccountRepository constructor.
     *
     * @param Account $model
     */
    public function __construct(Account $model)
    {
        parent::__construct($model);
    }
}
