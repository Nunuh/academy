<?php

namespace App\Http\Controllers;

use App\Mail\GratisMail;
use App\User;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifikasiMail;

class EmailController extends Controller
{
    public function verify($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update([
            'verifikasi' => $request->verifikasi
        ]);

        $work = Workshop::where('sale', 0)->first();

        $free = array(
            'nama' => $user->fullname,
            'link' => $work->url,
            'workshop' => $work->judul
        );
        Mail::to($user->email)->send(new GratisMail(
            $free
        ));

        return back()->with('message', 'Sudah diverifikasi');
    }
}
