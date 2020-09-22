<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolios';

    protected $fillable = [
        'id', 'user_id', 'judul', 'photo'
    ];

    public function user(){
        return $this -> belongsTo('App\User', 'user_id');
    }
}
