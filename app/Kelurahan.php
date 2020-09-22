<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahans';

    public $timestamps = false;

    protected $fillable = [
        'id', 'kecamatan_id', 'nama'
    ];

    public function kecamatan(){
        return $this -> belongsTo('App\Kecamatan', 'kecamatan_id');
    }
}
