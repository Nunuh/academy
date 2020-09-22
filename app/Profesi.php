<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    protected $table = 'profesis';

    public $timestamps = false;

    protected $fillable = [
        'id', 'nama'
    ];

    public function user(){
        return $this ->belongsToMany('App\User', 'profesis_users');
    }
}
