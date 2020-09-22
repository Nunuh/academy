<?php

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Route :: filter ( 'https' , function () { if ( ! Request :: secure ()) return Redirect :: secure ( URI :: current ()); });

Route::get('/', function (){
    return redirect()->route('home');
});

Route::get('user/verify', [
    'uses' => 'UserController@verifyUser',
    'as' => 'toVerify'
]);

Route::post('reset/{id}', [
    'uses' => 'UserController@resetPass',
    'as' => 'reset'
]);

Route::get('resetpassword/{token}', [
    'uses' => 'UserController@reset',
    'as' => 'emailResetPass'
]);

Route::post('sendmail', [
    'uses' => 'UserController@sendMail',
    'as' => 'sendMailReset'
]);

Route::get('forgotPass', [
    'uses' => 'TestController@forgot',
    'as' => 'forgot'
]);

Route::get('home', [
    'uses' => 'UserController@index',
    'as' => 'home'
]);

Route::get('checkout/{slug}', [
    'uses' => 'CourseController@checkCourse',
    'as' => 'checkout.course'
]);

Route::post('check/{kode}', [
    'uses' => 'CourseController@transaksi',
    'as' => 'bayar.course'
]);

Route::get('checkouts/{slug}', [
    'uses' => 'WorkshopController@checkWorkshop',
    'as' => 'checkout.workshop'
]);

Route::post('checks/{kode}', [
    'uses' => 'WorkshopController@transaksi',
    'as' => 'bayar.workshop'
]);

Route::get('tentang', [
    'uses' => 'TestController@tentang',
    'as' => 'tentang'
]);

Route::get('mitra', [
    'uses' => 'TestController@mitra',
    'as' => 'mitra'
]);

Route::get('riwayat', [
    'uses' => 'TestController@riwayat',
    'as' => 'riwayat'
]);

Route::get('password', [
    'uses' => 'TestController@password',
    'as' => 'password'
]);

Route::get('checkout', [
    'uses' => 'TestController@checkout',
    'as' => 'checkout'
]);
Route::get('galeri', [
    'uses' => 'TestController@gallery',
    'as' => 'gallery'
]);

Route::get('kontak', [
    'uses' => 'TestController@kontak',
    'as' => 'kontak'
]);

Route::get('kursus', [
    'uses' => 'TestController@kursus',
    'as' => 'kursus'
]);

Route::get('search', [
    'uses' => 'TestController@search',
    'as' => 'cari'
]);

Route::get('user/login', [
    'uses' => 'UserController@login',
    'as' => 'user.loginpage'
]);

Route::get('user/register', [
    'uses' => 'UserController@register',
    'as' => 'user.regpage'
]);

Route::get('logout', [
    'uses' => 'UserController@logout',
    'as' => 'user.logout'
]);

Route::post('loginPost', [
    'uses' => 'UserController@loginPost',
    'as' => 'user.login'
]);

Route::post('registerPost', [
    'uses' => 'UserController@create',
    'as' => 'user.reg'
]);

Route::get('shop', [
    'uses' => 'TestController@shop',
    'as' => 'shop'
]);
Route::get('shopdetail', [
    'uses' => 'TestController@shopdetail',
    'as' => 'shop.detail'
]);

Route::post('akun/pass', [
    'uses' => 'UserController@ubahPass',
    'as' => 'ubahPass.user'
]);

Route::post('akun/profile', [
    'uses' => 'UserController@ubahProfil',
    'as' => 'ubahProfil.user'
]);

Route::post('akun/portofolio', [
    'uses' => 'UserController@portofolio',
    'as' => 'tambah.porto'
]);

Route::post('akun/profiles', [
    'uses' => 'UserController@ubahAkun',
    'as' => 'ubahAkun.user'
]);

Route::get('akun/{nama}', [
    'uses' => 'TestController@akun',
    'as' => 'user.akun'
]);

Route::get('workshop', [
    'uses' => 'TestController@workshop',
    'as' => 'workshop'
]);
Route::get('workshop/{slug}',[
    'uses' => 'WorkshopController@detail',
    'as' => 'workshop.detail'
]);

Route::get('penjahit', [
    'uses' => 'TestController@penjahit',
    'as' => 'penjahit'
]);

Route::get('kursus/{slug}', [
    'uses' => 'CourseController@detailCourse',
    'as' => 'kursus.detail'
]);

Route::get('hapus/ktp/{id}',[
    'uses' => 'UserController@hapusktp',
    'as' => 'user.hapusktp'
]);
Route::get('loadakun',[
    'uses' => 'UserController@loadakun',
    'as' => 'user.loadakun'
]);

Route::get('institusi/{slug}', [
    'uses' => 'TestController@institusi',
    'as' => 'user.institution'
]);

Route::get('porto/hapus/{id}', [
    'uses' => 'UserController@hapusPorto',
    'as' => 'hapus.porto'
]);

Route::post('akun/dropdown', [
    'uses' => 'UserController@dropdown',
    'as' => 'dropdown'
]);

Route::post('akun/dropdown1', [
    'uses' => 'UserController@dropdown1',
    'as' => 'dropdown1'
]);

Route::post('subscribe', [
    'uses' => 'UserController@subscribe',
    'as' => 'subscribe'
]);

Route::get('editprofesi/{id}',[
    'uses' => 'UserController@editProfesi',
    'as' => 'editProfesi'
]);

Route::post('mitra/join', [
    'uses' => 'InstitutionsController@addMitra',
    'as' => 'tambahMitra'
]);

Route::get('cari', [
    'uses' => 'UserController@search',
    'as' => 'search'
]);

Route::get('search', [
    'uses' => 'TestController@search',
    'as' => 'user.search'
]);

Route::post('simpan_foto', [
    'uses' => 'UserController@save_image',
    'as' => 'user.foto'
]);

Route::post('dokumentasi', [
    'uses' => 'UserController@dokumentasi',
    'as' => 'dokumentasi'
]);

Route::get('hapus/dokumen/{id}', [
    'uses' => 'UserController@hapusDok',
    'as' => 'hapus.dok'
]);

Route::get('registrasi/{telp}', [
    'uses' => 'TestController@otp',
    'as' => 'otp'
]);

Route::get('registrasi/resendotp/{telp}', [
    'uses' => 'UserController@resendOtp',
    'as' => 'resendOtp'
]);

Route::get('selesai', [
    'uses' => 'TestController@selesai',
    'as' => 'selesai'
]);

Route::post('registrasi/{telp}/setpassword', [
    'uses' => 'UserController@setPassword',
    'as' => 'setPass'
]);


//    Route::get('artikel', [
//    'uses' => 'TestController@artikel',
//    'as' => 'artikel'
//    ]);
//
//    Route::get('artikel-detail/{id}', [
//    'uses'=>'ArtikelController@artikel_detail',
//    'as' => 'artikel-detail'
//    ]);

//    Route::get('admin/artikel', [
//        'uses' => 'AdminController@artikel',
//        'as' => 'artikel.admin'
//    ]);
//
//    Route::post('admin/artikel/tambah', [
//        'uses' => 'ArtikelController@tambah',
//        'as' => 'tambahartikel.admin'
//    ]);
//
//    Route::get('admin/artikel/hapus/{id}', [
//        'uses' => 'ArtikelController@delete',
//        'as' => 'hapusartikel.admin'
//    ]);
//
//    Route::post('admin/artikel/edit/{id}', [
//        'uses' => 'ArtikelController@edit',
//        'as' => 'editartikel.admin'
//    ]);

// ---- Admin -----


Route::get('Jahitan1', [
    'uses'=>'AdminController@index',
    'as'=>'admin'
]);

Route::post('Jahitan1/login', [
    'uses' => 'AdminController@logged',
    'as' => 'admin.loginPost'
]);

Route::group(['prefix' => 'Jahitan1', 'middleware' => 'auth:admin'], function () {

    Route::get('logout', [
        'uses' => 'AdminController@logout',
        'as' => 'admin.logout'
    ]);

    Route::get('dashboard', [
        'uses' => 'AdminController@dashboard',
        'as' => 'dashboard.admin'
    ]);

    Route::get('export/subscriber', [
        'uses' => 'AdminController@exportSubscriber',
        'as' => 'export.subscriber'
    ]);

    Route::get('export/users', [
        'uses' => 'AdminController@exportUser',
        'as' => 'export.user'
    ]);

    Route::get('subscriber', [
        'uses' => 'AdminController@subs',
        'as' => 'subs.admin'
    ]);

    Route::get('transaksi', [
        'uses' => 'TransaksiController@transaksi',
        'as' => 'transaksi.admin'
    ]);

    Route::get('client', [
        'uses' => 'AdminController@listUser',
        'as' => 'client.admin'
    ]);

    Route::get('course', [
        'uses' => 'AdminController@course',
        'as' => 'course.admin'
    ]);

    Route::get('partner', [
        'uses' => 'AdminController@partner',
        'as' => 'partner.admin'
    ]);

    Route::get('account', [
        'uses' => 'AdminController@account',
        'as' => 'account.admin'
    ]);

    Route::get('subscribe', [
        'uses' => 'AdminController@subscribe',
        'as' => 'subscribe.admin'
    ]);

    Route::get('verification', [
        'uses' => 'AdminController@verification',
        'as' => 'verification.admin'
    ]);

    Route::get('reg', [
        'uses' => 'AdminController@register',
        'as' => 'admin.regpage'
    ]);

    Route::post('edit', [
        'uses' => 'AdminController@ubahPassword',
        'as' => 'ubahPass.admin'
    ]);

    Route::post('registerPost', [
        'uses' => 'AdminController@registerPost',
        'as' => 'admin.reg'
    ]);

    Route::post('course/tambah', [
        'uses' => 'CourseController@tambah',
        'as' => 'tambahcourse.admin'
    ]);

    Route::post('course/edit/{id}', [
        'uses' => 'CourseController@edit',
        'as' => 'editcourse.admin'
    ]);
    Route::get('course/{slug}', [
        'uses' => 'CourseController@admindetail',
        'as' => 'course-detail.admin'
    ]);

    Route::get('course/delete/{id}', [
        'uses' => 'CourseController@deleteCourse',
        'as' => 'hapuscourse.admin'
    ]);

    Route::post('partner/tambah', [
        'uses' => 'PartnerController@add',
        'as' => 'tambahpartner.admin'
    ]);

    Route::get('partner/hapus/{id}', [
        'uses' => 'PartnerController@hapus',
        'as' => 'hapuspartner.admin'
    ]);

    Route::get('allUser', [
        'uses' => 'AdminController@listUser',
        'as' => 'listUser.admin'
    ]);

    Route::get('workshop', [
        'uses' => 'WorkshopController@index',
        'as' => 'workshop.admin'
    ]);

    Route::post('workshop/tambah', [
        'uses' => 'WorkshopController@tambah',
        'as' => 'tambahworkshop.admin'
    ]);

    Route::post('workshop/dynamic', [
        'uses' => 'WorkshopController@dynamic',
        'as' => 'workshopdynamic.admin'
    ]);

    Route::post('workshop/edit/{id}', [
        'uses' => 'WorkshopController@edit',
        'as' => 'editworkshop.admin'
    ]);

    Route::get('workshop/{id}', [
        'uses' => 'WorkshopController@admindetail',
        'as' => 'workshop-detail.admin'
    ]);

    Route::get('workshop/delete/{id}', [
        'uses' => 'WorkshopController@delete',
        'as' => 'hapusworkshop.admin'
    ]);

    Route::get('kategori', [
        'uses' => 'AdminController@kategori',
        'as' => 'kategori.admin'
    ]);

    Route::post('kategori/tambah', [
        'uses' => 'KategoriController@tambah',
        'as' => 'tambahkategori.admin'
    ]);

    Route::get('gallery', [
        'uses' => 'AdminController@galeri',
        'as' => 'galeri'
    ]);

    Route::post('galeri/tambah', [
        'uses' => 'AdminController@addGaleri',
        'as' => 'tambah.galeri'
    ]);

    Route::get('galeri/hapus/{id}', [
        'uses' => 'AdminController@hapusGaleri',
        'as' => 'hapus.galeri'
    ]);

    Route::get('kategori/hapus/{id}', [
        'uses' => 'KategoriController@hapus',
        'as' => 'hapuskategori.admin'
    ]);

    Route::get('client/hapus/{id}', [
        'uses' => 'AdminController@hapus',
        'as' => 'hapusclient.admin'
    ]);

    Route::get('hapus/{id}', [
        'uses' => 'AdminController@hapusAdmin',
        'as' => 'hapus.Admin'
    ]);

    Route::post('verify/{id}', [
        'uses' => 'EmailController@verify',
        'as' => 'user.verifikasi'
    ]);

    Route::get('cancel/{id}', [
        'uses' => 'AdminController@cancel',
        'as' => 'cancel.verifikasi'
    ]);

    Route::post('lunas/{id}', [
        'uses' => 'AdminController@lunas',
        'as' => 'lunas.admin'
    ]);

    Route::get('institution', [
        'uses' => 'AdminController@institution',
        'as' => 'institution.admin'
    ]);

    Route::post('tambah/institution/{id}', [
        'uses' => 'InstitutionsController@tambah',
        'as' => 'tambah.institution'
    ]);

    Route::get('hapus/institusi/{id}', [
        'uses' => 'InstitutionsController@delete',
        'as' => 'hapus.institution'
    ]);

    Route::post('validasi/course', [
        'uses' => 'AdminController@validasiCourse',
        'as' => 'validasi.course'
    ]);

    Route::post('validasi/ws', [
        'uses' => 'AdminController@validasiWorkshop',
        'as' => 'validasi.workshop'
    ]);

    Route::get('hapus/pola/{id}', [
        'uses' => 'WorkshopController@hapusPola',
        'as' => 'hapusPola'
    ]);

    Route::post('edit/pola/{id}', [
        'uses' => 'WorkshopController@editPola',
        'as' => 'editPola'
    ]);

    Route::post('add/pola/{id}', [
        'uses' => 'WorkshopController@tambahPola',
        'as' => 'tambahPola'
    ]);

    Route::get('documentation', [
        'uses' => 'AdminController@dok',
        'as' => 'dokPage'
    ]);

    Route::post('verifikasi/dokumentasi/{id}', [
        'uses' => 'AdminController@checkdokumen',
        'as' => 'checkDokumen'
    ]);

    Route::get('notifikasi/belumLolos/{id}', [
        'uses' => 'AdminController@fail',
        'as' => 'emailGagal'
    ]);

    Route::get('gagalDokumentasi/{id}/{ws}', [
        'uses' => 'AdminController@failDokumentasi',
        'as' => 'gagalDok'
    ]);

});
