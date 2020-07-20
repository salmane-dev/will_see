<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\khatma;
use App\User;
use App\kh_peeps; 
use Illuminate\Support\Facades\DB;


class KhatmaController extends Controller
{
     
    public function __construct(){
        $this->middleware('auth');
    }

 
    public function index(){
        
        $khatmas = auth()->user()->khatmas;
        $joined_khatmas = auth()->user()->users_khatma;
        $khatmas = $khatmas->merge($joined_khatmas); 
        $khatmas = $khatmas->sortDesc();

        return view('welcome', compact('khatmas' ));
   }



    public function create(){
        return view('khatmas.create');
    }
    

    public function store(){
   
        $data = request()->validate([
            'name' => ['required', 'string', 'max:125'],
            'peeps' => ['required', 'integer', 'min:1', 'max:30'],
            'days' => ['required', 'integer', 'min:1', 'max:30']  ,
            'join' => 'in:0,1'
        ]);

        $kha =  auth()->user()->khatmas()->create([
            'name' => $data['name'],
            'peeps' => $data['peeps'],
            'days' => $data['days'],
            'user_id' => auth::id(),
        ]);

        // check if the khatma creator want to join it
         if($data['join'] == 1){
            Auth::user()->users_khatma()->attach($kha->id);
         }
       
       

        $message = "Created successfully !";
        return redirect('/khatma/'.$kha->id)->with('message', $message);
    }

    public function join(khatma $khatma){

        if($khatma->khatmas_users->contains(auth::user())){
            $message = 'you are in';
            return view('khatmas.show', compact(['khatma',  'message']));
        }

        $message = "Join the khatma"; 
        return view('/khatmas/join') ->with(['message' => $message, 'khatma' => $khatma ]);
        
    }

    public function show(khatma $khatma){


            if( $khatma->khatmas_users->contains(auth::user()) || auth::user()->id == $khatma->user->id){
                return view('khatmas.show', compact(['khatma',  'message']));
            }

            $message = "Join the khatma"; 

            return view('/khatmas/join', compact(['message','khatma']));
    }


    public function edit($id){
        
    }



    public function update(khatma $khatma){

            Auth::user()->users_khatma()->toggle($khatma);

            if($khatma->khatmas_users->contains(auth::user())){
            $message = 'you are in';
            return view('khatmas.show', compact(['khatma',  'message']));
        }
 
            $message = "somehow you can't join this khatma";
            return view('/khatmas/join', compact(['message','khatma']));
    }

    public function destroy(khatma $khatma){
        if( auth::id() == $khatma->user_id){
            
            // dd($khatma->kh_peeps('khatma_id')->delete()); 
            //Auth::user()->users_khatma()->detach($khatma);
            
            $khatma->khatmas_users()->detach();
            $khatma->delete();
            
            $message = "Deleted successfully!";
            return redirect('/')->with(['message'=> $message]);            
        }else{
            $msg = "you can't !";
            return back()->with(['msg'=> $msg]);   
        }
  }


}
