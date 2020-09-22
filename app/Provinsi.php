<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsis';

    public $timestamps = false;

    protected $fillable = [
        'id', 'nama'
    ];

    public function kota(){
        return $this -> hasMany('App\Kota');
    }

    public function user(){
        return $this->hasMany('App\User');
    }
}
