<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function tambah(Request $request){

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'gambar' => ''
        ]);

        $gambar = $request -> file('inputgambar');
        $gambar -> move('images/artikel', $artikel->id.'.'.$gambar->getClientOriginalExtension());
        $artikel -> gambar = $artikel->id.'.'.$gambar->getClientOriginalExtension();
        $artikel -> save();

        return view('admin.artikel', compact('artikel'))->with('success', 'Berhasil Menambahkan Artikel');

    }

    public function delete ($id){
        $artikel = Artikel::findOrFail($id);
        $artikel -> delete();
        return back()->with('message', 'Artikel berhasil dihapus');
    }

    public function edit(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            'isi' => 'required',
            'gambar' => 'required'
        ]);

        Artikel::findOrFail($request->id)->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'gambar' => $request->gambar
        ]);

        return back()->with('message', 'Artikel berhasil diedit');
    }

    public function artikel_detail($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('user.artikel-detail',[
            'artikel' => $artikel
        ]);
    }
}
