<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';

    public $timestamps = false;

    protected $fillable = [
        'id', 'kota_id', 'nama'
    ];

    public function kelurahan(){
        return $this -> hasMany('App\Kelurahan');
    }

    public function kota(){
        return $this -> belongsTo('App\Kota', 'kota_id');
    }

    public function user(){
        return $this->hasMany('App\User');
    }
}
