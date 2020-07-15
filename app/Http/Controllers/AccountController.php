<?php

namespace App\Http\Controllers;

use App\Repositories\Account\AccountRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;

class AccountController extends Controller
{
    /**
     * @var AcountRepositoryInterface
     */
    private $accountRepository;
    private $roleRepository;

    /**
     * UserController constructor.
     * 
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        AccountRepositoryInterface $accountRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->accountRepository = $accountRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        $account = $this->accountRepository->findById($id);
        //echo '<pre>',print_r($account,1),'</pre>';
        return view("test", compact('account'));
    }
}
