<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = 'institutions';

    protected $fillable = [
        'id', 'nama', 'gambar', 'url', 'deskripsi', 'background', 'namaInstansi', 'namaPic', 'kota', 'alamat', 'telp', 'email'
    ];

    public function course(){
        return $this -> hasMany('App\Course');
    }

    public function workshop(){
        return $this -> hasMany('App\Workshop');
    }
}
