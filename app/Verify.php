<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    protected $table = 'verifies';

    protected $guarded = [];

    protected $fillable = [
        'id', 'user_id', 'token'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
