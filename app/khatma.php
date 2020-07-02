<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class khatma extends Model
{
    protected $guarded = [];

    //
    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function kh_peeps(){
        return $this->hasMany('\App\kh_peeps');
    }

    

}
