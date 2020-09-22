<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const PROFESI = [
        'Penjahit Kebaya', 'Penjahit Seragam', 'Penjahit Jas', 'Penjahit Batik', 'Penjahit Dress', 'Penjahit Gamis', 'Penjahit Mukena', 'Penjahit Sepatu', 'Penjahit Kaos', 'Penjahit Tas', 'Penjahit Kemeja', 'Penjahit Blouse', 'Penjahit Tunik', 'Penjahit Kasur', 'Penjahit Jilbab', 'Penjahit Jeans', 'Penjahit Celana', 'Penjahit Rok'
    ];

    const FAILED = [
        'hasil jahitan yang Anda upload belum sesuai dengan kriteria kami', 'KTP yang Anda unggah tidak sesuai dengan data diri Anda', 'Alamat yang Anda masukkan tidak sesuai dengan data yang ada di KTP'
    ];

//    public function routeNotificationForZenzivaSms()
//    {
//        return $this->telp;
//    }

    protected $table = 'users';

    protected $guarded = ['id'];

    protected $fillable = [
        'id', 'name', 'email', 'foto', 'fullname', 'password', 'telp', 'gender', 'tgl_lahir', 'alamat', 'kodepos', 'nik', 'umur', 'ava', 'konfirmasi', 'verifikasi', 'images', 'provinsi_id', 'kota_id', 'kecamatan_id', 'domisili', 'wa', 'email_verified_at', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function course(){
        return $this->belongsToMany('App\Course', 'courses_users', 'user_id', 'course_id');
    }

    public function workshop(){
        return $this->belongsToMany('App\Workshop', 'users_workshops', 'user_id', 'workshop_id');
    }

    public function portofolio(){
        return $this->hasMany('App\Portofolio');
    }

    public function hasil(){
        return $this->hasMany('App\Hasil');
    }

    protected $casts = [
        'images' => 'array',
        'email_verified_at' => 'datetime'
    ];

    public function verify()
    {
        return $this->hasOne('App\Verify');
    }

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi', 'provinsi_id');
    }

    public function kota(){
        return $this->belongsTo('App\Kota', 'kota_id');
    }

    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id');
    }

    public function profesi(){
        return $this->belongsToMany('App\Profesi', 'profesis_users');
    }
}
