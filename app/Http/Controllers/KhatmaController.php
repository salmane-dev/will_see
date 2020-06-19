<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khatma;

class KhatmaController extends Controller
{
     
    public function __construct(){
        $this->middleware('auth');
    }

 
    public function index(){
        $users = auth()->user()->user_id;

        $khatma = khatma::all();

        dd($khatma);

       return view('khatmas.index', compact('khatma'));
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
      
        auth()->user()->khatma()->create([
            'name' => $data['name'],
            'peeps' => $data['peeps'],
            'days' => $data['days'], 
        ]);

        return redirect('/home');
    }

    public function show(){

    }

}
