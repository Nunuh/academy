<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'id', 'user_id', 'course_id', 'workshop_id', 'kode', 'keterangan', 'dokumentasi', 'total', 'seri'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function course(){
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function workshop(){
        return $this->belongsTo('App\Workshop', 'workshop_id');
    }
}
