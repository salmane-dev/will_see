<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\khatma;
use App\User;
use App\kh_peeps;


class KhatmaController extends Controller
{
     
    public function __construct(){
        $this->middleware('auth');
    }

    
 
    public function index(){

    /* 

        $user = auth()->user();
        $khatmas = khatma::whereIn('user_id', $user);
        return view('index', compact('khatmas'));

    */

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $khatmas = $user->khatmas;
 
        return view('welcome', compact('khatmas'));
        
   }



    public function create(){
        return view('khatmas.create');
    }
    

    public function store(){
   
        $data = request()->validate([
            'name' => ['required', 'string', 'max:125'],
            'peeps' => ['required', 'integer', 'max:30'],
            'days' => ['required', 'integer', 'max:30'],
        ]);
        


     $kha =  auth()->user()->khatmas()->create([
            'name' => $data['name'],
            'peeps' => $data['peeps'],
            'days' => $data['days'],
            'user_id' => auth::id(),
        ]);

        auth()->user()->kh_peeps()->create([
            'khatma_id' => $kha->id,
            'peeps_id' => 00,
        ]);
       
         
       
        
        $message = "Created successfully !";
        return redirect('/')->with('message', $message);
    }



    public function show(khatma $khatma){

        if(auth::user()->id == $khatma->user->id){
            return view('khatmas.show', compact('khatma'));
        }

        $message = "you are not in ";
        return view('welcome', compact('message'));
    }


    
    public function destroy(khatma $khatma){
        $khatma->delete();
        $message = "Deleted successfully !";
        return redirect('/')->with('message', $message);
  }



}
