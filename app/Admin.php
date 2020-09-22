<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $guarded = ['id'];

    protected $fillable = [
        'id', 'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function workshop(){
        return $this->hasMany('App\Workshop');
    }

    public function course(){
        return $this->hasMany('App\Course');
    }
}
