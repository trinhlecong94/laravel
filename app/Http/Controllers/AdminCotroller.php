<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCotroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      
        $request->user()->authorizeRoles(['employee', 'admin']);
        
        return view('home');
    }
}