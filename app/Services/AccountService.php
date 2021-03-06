<?php

namespace App\Services;

use App\Models\Account;
use App\Repositories\Account\AccountRepositoryInterface;

class AccountService
{

    private $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function pagination()
    {
        return Account::with('roles')->paginate(9);
    }

}
