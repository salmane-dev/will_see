<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khatma;
use App\User;

class HomeController extends Controller
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
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $khatmas = $user->khatmas;
 
       return view('home', compact('khatmas'));
    }
}
