<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
 
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     **/

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function khatmas(){
        return $this->hasMany('App\khatma')->orderBy('created_at', 'DESC');
    } 

    public function kh_peeps(){
        return $this->hasMany('App\kh_peeps')->orderBy('created_at', 'DESC');
    }   

    public function users_khatma(){
        return $this->belongsToMany('App\khatma')->orderBy('created_at', 'DESC')->withTimestamps();
    }   


}
