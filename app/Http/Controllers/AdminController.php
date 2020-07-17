<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountService;

class AdminController extends Controller
{

    private $accountService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccountService $accountService)
    {
        //$this->middleware('auth');
        $this->accountService = $accountService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewAccount(Request $request)
    {

        //$request->user()->authorizeRoles(['admin']);

        return view('admin.view-account');
    }

    public function accountManager(Request $request)
    {
        $accounts = $this->accountService->pagination();
        return view('admin.account-manager',compact('accounts'));
    }

    public function addAccount(Request $request)
    {
        return view('admin.add-account');
    }
}
