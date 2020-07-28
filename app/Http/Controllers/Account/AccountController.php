<?php

namespace App\Http\Controllers\Account;

use App\Repositories\Account\AccountRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Enums\OrderStatus as EnumStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function profile()
    {
        return view("account.profile");
    }

    public function updateAccount(Request $request)
    {
        $account = Account::find(Auth::user()->id);
        $data = $request->only(['email', 'phone', 'full_name', 'birthday', 'address']);
        $account->fill($data)->save();
        return redirect()->action('Account\AccountController@profile');
    }

    public function myOrder()
    {
        $orders = Order::where('account_id', Auth::user()->id)->get();
        return view("account.my-order", compact('orders'));
    }

    public function changePassword()
    {
        return view("account.change-password");
    }

    public function updatePassword(Request $request)
    {
        $account = Account::find(Auth::user()->id);

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $oldPassword = $request->oldPassword;
        $password = $request->password;

        if (app('hash')->check($oldPassword, $account->password)) {
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
