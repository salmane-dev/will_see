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
            'days' => ['required', 'integer', 'max:30']  ,
            'join' => 'in:0,1'
        ]);

        $kha =  auth()->user()->khatmas()->create([
            'name' => $data['name'],
            'peeps' => $data['peeps'],
            'days' => $data['days'],
            'user_id' => auth::id(),
        ]);

        // check if the khatma creator want to join it
        ($data['join'] == 1) ? $peep = auth::id() : $peep = null ; 
         
        for( $i = 0 ; $i < $data['peeps'] ; $i++){
            if( $i == 0){
                auth()->user()->kh_peeps()->create([
                    'khatma_id' => $kha->id,  
                    'peeps_id' => $peep, 
                ]);
            } 
            else{
            auth()->user()->kh_peeps()->create([
                'khatma_id' => $kha->id,  
                'peeps_id' => null,
                ]);
            }
        } 

        
        $message = "Created successfully !";
        return redirect('/')->with('message', $message);
    }



    public function show(khatma $khatma){
       
        if(auth::user()->id == $khatma->user->id){
            
            // get the name of the khatmas peeps
            $peeps = DB::table('users')
                        ->join('kh_peeps' , 'kh_peeps.peeps_id', '=', 'users.id')
                        ->where('kh_peeps.khatma_id', $khatma->id )
                        ->select('users.name')->get();
         
        //  $peeps = DB::table('kh_peeps')->where('khatma_id', $khatma->id )->pluck('peeps_id');
            
        //  $peeps = App\User::all();
        
        // $khatma->kh_peeps ..... could do the trick 

            return view('khatmas.show', compact(['khatma', 'peeps']));
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
