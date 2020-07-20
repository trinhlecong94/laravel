<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Enums\Role as EnumRole;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', ],
            'address' => ['required', 'string', 'max:255', ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthday' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string', 'min:10'],
            'full_name' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $time = strtotime($data['birthday']);
        $newDateFormat =  date('Y-m-d',$time);

        $account =  Account::create([
            'username' => $data['username'],
            'address' => $data['address'],
            'birthday' => $newDateFormat,
            'email' => $data['email'],
            'full_name' => $data['full_name'],
            'status' => EnumRole::ROLE_USER,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $account->roles()
            ->attach(Role::where('name', 'employee')->first());
        return $account;
    }
}
