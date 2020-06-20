<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\khatma;
use App\User;


class KhatmaController extends Controller
{
     
    public function __construct(){
        $this->middleware('auth');
    }

 
    public function index(){
        $user = auth()->user();

        $khatmas = khatma::whereIn('user_id', $user);

        dd($khatmas);

       return view('khatmas.index', compact('khatmas'));
   }


    public function create(){
        return view('khatmas.create');
    }
    

    public function store(){
         
        $data = request()->validate([
            'name' => 'required',
            'peeps' => 'required',
            'days' => 'required',
        ]);
      
           
        auth()->user()->khatmas()->create([
            'name' => $data['name'],
            'peeps' => $data['peeps'],
            'days' => $data['days'],
            'user_id' => auth::id(),
        ]);

        return redirect('/home');
    }

    public function show(){

    }

}
