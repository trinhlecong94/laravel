<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Http\Controllers\Controller;
use App\Enums\Role as EnumRole;
use App\Enums\Status as EnumStatus;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\AccountService;

class AdminController extends Controller
{

    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
        $this->middleware('auth');
    }

    public function viewAccount(Request $request, $id)
    {
        echo $request->user()->authorizeRoles([EnumRole::ROLE_ADMIN]);
        
        $account = Account::find($id);
        return view('admin.view-account', compact('account'));
    }

    public function accountManager(Request $request)
    {
        $accounts = $this->accountService->pagination();
        return view('admin.account-manager', compact('accounts'));
    }

    public function addAccount(Request $request)
    {
        $roles = Role::all();
        return view('admin.add-account', compact('roles'));
    }

    public function updateAccount(Request $request)
    {
        $account = Account::find($request->userId);

        $account->email = $request->input('email');
        $account->phone = $request->input('phone');
        $account->full_name = $request->input('full_name');
        $account->birthday = $request->input('birthday');
        $account->address = $request->input('address');
        $account->status = EnumStatus::getValue($request->input('status'));
        $account->save();

        $account->roles()->detach();

        $arrRole = $request->input('role');
        foreach ($arrRole as $key => $role) {
            $roleFromDatabase = Role::where('name', EnumRole::getValue($role))->first();
             $account->roles()->save($roleFromDatabase);
        }       
        return view('admin.view-account', compact('account'));
    }
}
