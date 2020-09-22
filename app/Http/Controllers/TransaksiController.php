<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function transaksi()
    {
//        $skrg = Carbon::now();
//        $works = Transaction::whereBetween('created_at', [$skrg->subDays(7), $skrg])
//            ->where('course_id', null)
//            ->orderBy('created_at')
//            ->paginate(10, ['*'], 'works')
//        ;

        $kurs = Transaction::where('workshop_id', null)->orderBy('created_at', 'DESC')->paginate(10, ['*'], 'kurs');
        $works = Transaction::where('course_id', null)->orderBy('created_at', 'DESC')->paginate(10, ['*'], 'works');
        return view('admin.transaksi', [
            'kurs' => $kurs,
            'works' => $works
        ]);
    }
}
