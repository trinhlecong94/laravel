<?php

namespace App\Http\Controllers\Account;

use App\Repositories\Account\AccountRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Models\Account;
use App\Models\Order;
use App\Enums\OrderStatus as EnumStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    private $accountRepository;
    private $roleRepository;

    public function __construct(
        AccountRepositoryInterface $accountRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->accountRepository = $accountRepository;
        $this->roleRepository = $roleRepository;
    }

    public function profile(Request $request)
    {
        return view("account.profile");
    }

    public function updateAccount(Request $request)
    {
        $id = Auth::user()->id;
        $account = Account::find($id);

        $account->email = $request->email;
        $account->phone = $request->phone;
        $account->full_name = $request->full_name;
        $account->birthday = $request->birthday;
        $account->address = $request->address;

        $account->save();

        return redirect()->action('Account\AccountController@profile');
    }

    public function myOrder()
    {
        $id = Auth::user()->id;

        $orders = Order::where('account_id', $id)->get();

        return view("account.my-order", compact('orders'));
    }

    public function changePassword()
    {
        return view("account.change-password");
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $account = Account::find($id);

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $oldPassword = $request->input('oldPassword');
        $password = $request->input('password');

        $user = Account::find($id);
        $hasher = app('hash');
        if ($hasher->check($oldPassword, $user->password)) {
            $account->password = Hash::make($password);
            $account->save();
        }
        return view("account.change-password");
    }

    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $order->status = EnumStatus::getValue('CANCELLED');
        $order->save();

        $orders = Order::where('account_id', Auth::user()->id)->get();
        return view("account.my-order", compact('orders'));
    }
}
