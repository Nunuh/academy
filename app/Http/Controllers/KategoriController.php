<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function tambah(Request $request){
        $this->validate($request, [
            'nama' => 'required'
        ]);

        Kategori::create([
            'nama' => $request->nama
        ]);

        return view('admin.kategori')->with('message', 'Berhasil Menambahkan kategori');
    }

    public function hapus($id){
        $kategori = Kategori::findOrFail($id);
        $kategori -> delete();
        return back()->with('message', 'Sudah terhapus');
    }
}
