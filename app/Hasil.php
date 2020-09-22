<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasils';

    protected $fillable = [
        'id', 'user_id', 'foto'
    ];

    public function user(){
        return $this -> belongsTo('App\User', 'user_id');
    }
}
