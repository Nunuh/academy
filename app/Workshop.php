<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = 'workshops';

    protected $fillable =  [ 'id', 'admin_id', 'kategori_id', 'judul', 'deskripsi', 'harga', 'kode', 'waktu', 'tempat', 'level', 'certificate', 'kota', 'image', 'tampil', 'url', 'institution_id', 'jam', 'slug_judul', 'kit', 'start_tgl', 'end_tgl', 'sale', 'alat', 'bahan', 'cara', 'modul', 'sertif'
    ];

    public function user(){
        return $this ->belongsToMany('App\User', 'users_workshops', 'workshop_id', 'user_id');
    }

    public function kategori(){
        return $this -> belongsTo('App\Kategori', 'kategori_id');
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
