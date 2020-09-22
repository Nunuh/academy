<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='courses';

    protected $fillable = [
        'id', 'admin_id', 'kategori_id', 'judul', 'deskripsi', 'kategori', 'harga', 'durasi', 'effort', 'institution_id', 'subject', 'quizzes','level', 'language', 'subtitle', 'certificate', 'syllabus', 'video', 'thumbnail', 'tampil', 'kode', 'url', 'slug_judul', 'start_tgl', 'end_tgl', 'sale', 'alat', 'bahan', 'cara'
    ];

    public function user(){
        return $this ->belongsToMany('App\User', 'courses_users', 'course_id', 'user_id');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

    public function institution() {
        return $this->belongsTo('App\Institution', 'institution_id');
    }

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }

    public function pola(){
        return $this->hasMany('App\Pola');
    }
}
