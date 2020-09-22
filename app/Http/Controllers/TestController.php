<?php

namespace App\Http\Controllers;

use App\Course;
use App\Institution;
use App\Partner;
use App\Provinsi;
use App\Transaction;
use App\User;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function tentang()
    {

        $part = Partner::all();
        return view('user.tentang', [
            'part' => $part
        ]);
    }

    public function riwayat()
    {
        $ser = Auth::guard('user')->user();
        $transc = Transaction::where('user_id', $ser->id)
            ->where('workshop_id', null)
            ->get();

        $transw = Transaction::where('user_id', $ser->id)
            ->where('course_id', null)
            ->get();

        return view('user.riwayat', [
            'transc' => $transc,
            'transw' => $transw
        ]);
    }

    public function password()
    {
        return view('user.password');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function gallery()
    {
        return view('user.galeri');
    }

    public function penjahit(Request $request)
    {
        $us = User::when($request->orderBy, function ($q) use ($request) {
            $q->whereHas('profesi', function ($q) use ($request) {
                $q->where('nama', $request->orderBy);
            });
        })
            ->when($request->cari, function ($penjahit) use ($request) {
                $penjahit->where('fullname', 'LIKE', '%' . $request->cari . '%');
            })
            ->when($request->sortBy, function ($q) use ($request) {
                $q->orderBy('fullname', $request->sortBy);
            })
            ->where('verifikasi', true)
            ->paginate(10);

        return view('user.penjahit', ['us' => $us]);
    }

    public function mitra()
    {
        $mitra = Institution::count();
        $kelas = Course::count();
        $user = User::count();
        $wk = Workshop::count();
        return view('user.mitra', [
            'mitra' => $mitra,
            'kelas' => $kelas,
            'user' => $user,
            'wk' => $wk
        ]);
    }

    public function search(Request $request)
    {
        $work = Workshop::when($request->search, function ($cari) use ($request) {
            $cari->where('judul', 'LIKE', '%' . $request->search . '%');
        })->get();

        return view('user.cari', [
            'work' => $work,
            'search' => $request->search
        ]);
    }

    public function kontak()
    {
        return view('user.kontak');
    }

    public function artikel()
    {
        return view('user.artikel');
    }

    public function kursus()
    {
        $kelas = Course::paginate(10);
        return view('user.kursus', [
            'kelas' => $kelas
        ]);
    }

    public function forgot()
    {
        return view('user.forgotPass');
    }
    public function selesai()
    {
        return view('user.selesai');
    }

    public function akun()
    {
        $provinsi = Provinsi::pluck('nama', 'id');

        return view('user.akun', [
            'provinsi' => $provinsi,
        ]);

    }

    public function otp($telp)
    {
        $user = User::where('telp', $telp)->first();
        return view('user.otp', [
            'telp'=>$telp,
            'user'=>$user
        ]);
    }

    public function shop()
    {
        return view('user.shop');
    }

    public function shopdetail()
    {
        return view('user.shop-detail');
    }

    public function workshop()
    {
        $work = Workshop::paginate(10);
        return view('user.workshop', [
            'work' => $work
        ]);
    }

    public function institusi($slug)
    {
        $insti = Institution::where('nama', $slug)->first();
        $course = Course::all();
        return view('user.institution', [
            'insti' => $insti,
            'course' => $course
        ]);
    }
}
