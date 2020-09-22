<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pola extends Model
{
    protected $table = 'polas';

    public $timestamps = false;

    protected $fillable = [
        'id', 'image', 'teks', 'course_id', 'workshop_id'
    ];

    public function course(){
        return $this -> belongsTo('App\Course', 'course_id');
    }

    public function workshop(){
        return $this -> belongsTo('App\Workshop', 'workshop_id');
    }
}
