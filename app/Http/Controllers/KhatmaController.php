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
       
        $message = "Created successfully !";
        return redirect('/home')->with('message', $message);
    }



    public function show(khatma $khatma){

        if(auth::user()->id == $khatma->user->id){
            return view('khatmas.show', compact('khatma'));
        }

        $message = "you are not in ";
        return view('/home', compact('message'));
    }


    
    public function destroy(khatma $khatma){
        $khatma->delete();
        $message = "Deleted successfully !";
        return redirect('/home')->with('message', $message);
  }



}
