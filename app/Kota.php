<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kotas';

    public $timestamps = false;

    protected $fillable = [
        'id', 'provinsi_id', 'nama'
    ];

    public function kecamatan(){
        return $this ->hasMany('App\Kecamatan');
    }

    public function provinsi(){
        return $this -> belongsTo('App\Provinsi', 'provinsi_id');
    }

    public function user(){
        return $this -> hasMany('App\User');
    }
}
