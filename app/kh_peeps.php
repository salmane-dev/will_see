<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kh_peeps extends Model
{
    protected $guarded = [];

    //
    public function khatma(){
        return $this->belongsToMany('\App\khatma');
    } 

    public function user(){
        return $this->belongsToMany('\App\User');
    }   


}
