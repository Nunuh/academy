<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';

    public $timestamps = false;

    protected $fillable = [
        'id', 'nama'
    ];

    public function course(){
        return $this -> hasMany('App\Course');
    }

    public function workshop(){
        return $this -> hasMany('App\Workshop');
    }
}
