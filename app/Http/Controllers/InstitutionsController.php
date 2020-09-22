<?php

namespace App\Http\Controllers;

use App\Institution;
use App\Mail\MitaMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InstitutionsController extends Controller
{
    public function tambah(Request $request, $id){

        $institution = Institution::findOrFail($id);
        $this->validate($request, [
            'url' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'background' => 'required'
        ]);

        $institution->update([
            'url' => $request -> url,
            'deskripsi' => $request -> deskripsi,
            'gambar' => '',
            'background' => ''
        ]);

        $img = $request->file('gambar');
        $img->move('images/insti/', $institution->namaInstansi .time(). '.' . $img->getClientOriginalExtension());
        $institution->gambar = $institution->namaInstansi .time(). '.' . $img->getClientOriginalExtension();

        $gbr = $request->file('background');
        $gbr->move('images/backinsti/', $institution->namaInstansi .time(). '.' . $img->getClientOriginalExtension());
        $institution->background = $institution->namaInstansi .time(). '.' . $img->getClientOriginalExtension();

        $institution->save();

        return back()->with('message', 'Berhasil mengupdate Institution');
    }

    public function addMitra(Request $request){
        $this->validate($request, [
            'namaInstansi' => 'required|unique:institutions',
            'telp' => 'required|unique:institutions',
            'alamat' => 'required',
            'kota' => 'required',
            'namaPic' => 'required|unique:institutions',
            'email' => 'required|email|unique:institutions'
        ], [
            'namaInstansi.unique'=> 'Instansi dengan nama terserbut sudah ada',
            'telp.unique'=> 'Nomer Hp telah digunakan oleh pengguna lain',
            'namaPic.unique' => 'Nama PIC tersebut sudah ada',
            'email.unique'=> 'Email telah digunakan oleh mitra yang lain'
        ]);

        $slug = Str::slug($request->get('namaInstansi'));

        $insti = Institution::create([
            'namaInstansi' => $request -> namaInstansi,
            'nama' => $slug,
            'telp' => $request -> telp,
            'alamat' => $request -> alamat,
            'kota' => $request -> kota,
            'namaPic' => $request -> namaPic,
            'email' => $request -> email
        ]);

        $mitra = array(
            'nama' => $insti->namaInstansi,
            'telp' => $insti->telp
        );

        Mail::to($insti->email)->send(new MitaMail(
            $mitra
        ));

        return back()->with('status', 'Terimakasih sudah menjadi partner Kami');
    }

    public function delete($id)
    {
        $institution = Institution::findOrFail($id);
        if ($institution->gambar != '' && $institution->gambar != null) {
            $path = 'images/insti/';
            File::delete($path.$institution->gambar);
        }
        if ($institution->background != '' && $institution->background != null) {
            $paths = 'images/backinsti/';
            File::delete($paths.$institution->background);
        }
        $institution->delete();
        return back()->with('message', 'Institusi berhasil dihapus');
    }
}
