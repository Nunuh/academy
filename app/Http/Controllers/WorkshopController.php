<?php

namespace App\Http\Controllers;

use App\Mail\GratisMail;
use App\Mail\WorkshopMail;
use App\Pola;
use App\Transaction;
use App\User;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WorkshopController extends Controller
{
    public function index()
    {
        return view('admin.workshop');
    }

    public function tambah(Request $request)
    {
        $slug = Str::slug($request->get('judul'));

        $workshop = Workshop::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'kategori_id' => $request->kategori_id,
            'image' => '',
            'modul' => '',
            'sertif' => '',
            'judul' => $request->judul,
            'slug_judul' => $slug,
            'kit' => $request->kit,
            'kode' => $request->kode,
            'waktu' => $request->waktu,
            'jam' => $request->jam,
            'kota' => $request->kota,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
            'alat' => $request->alat,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'level' => $request->level,
            'harga' => $request->harga,
            'start_tgl' => $request->start_tgl,
            'end_tgl' => $request->end_tgl,
            'sale' => $request->sale,
            'certificate' => $request->certificate,
            'tampil' => $request->tampil,
            'url' => $request->url,
            'institution_id' => $request->institution_id
        ]);
        $img = $request->file('image');
        $img->move('images/workshop/', time() . '.' . $img->getClientOriginalExtension());
        $workshop->image = time() . '.' . $img->getClientOriginalExtension();

        $mdl = $request->file('modul');
        $mdl->move('modul/', time(). '_' . $mdl->getClientOriginalName());
        $workshop->modul = time(). '_' . $mdl->getClientOriginalName();

        $serti = $request->file('sertif');
        $serti->move('images/sertif/',  time() .'.'. $serti->getClientOriginalExtension());
        $workshop->sertif = time() . '.' . $serti->getClientOriginalExtension();
        $workshop->save();

        $files = collect($request->file('gambar'));
        $tex = collect($request->teks);

        for ($i = 0; $i < count($files); $i++) {
            $nama[$i] = uniqid(rand(), true) . '.' . $files[$i]->getClientOriginalExtension();
            $files[$i]->move('images/pola/' . $workshop->id . '/', $nama[$i]);
            $pola = Pola::create([
                'workshop_id' => $workshop->id,
                'teks' => $tex[$i],
                'image' => $nama[$i]
            ]);
        }
        return redirect()->route('workshop.admin')->with('message', 'Berhasil Menambahkan Workshop');
    }

    public function delete($id)
    {
        $workshop = Workshop::findOrFail($id);
        File::delete('images/workshop/' . $workshop->image);
        File::delete('modul/' . $workshop->modul);
        $workshop->delete();
        return back()->with('message', 'Workshop berhasil dihapus');
    }

    public function edit($id, Request $request)
    {
        $workshop = Workshop::findOrFail($id);

        $workshop->update([
            'judul' => $request->judul,
            'kode' => $request->kode,
            'kategori_id' => $request->kategori_id,
            'waktu' => $request->waktu,
            'jam' => $request->jam,
            'kit' => $request->kit,
            'kota' => $request->kota,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
            'alat' => $request->alat,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'level' => $request->level,
            'harga' => $request->harga,
            'start_tgl' => $request->start_tgl,
            'end_tgl' => $request->end_tgl,
            'sale' => $request->sale,
            'certificate' => $request->certificate,
            'tampil' => $request->tampil,
            'url' => $request->url,
            'institution_id' => $request->institution_id
        ]);
        $img = $request->file('gambar');
        $mdl = $request->file('pdf');
        $sertifikate = $request->file('sertif');

        if (!empty($img)) {
            File::delete('images/workshop/' . $workshop->image);
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move('images/workshop/', $name);
            $workshop->update(['image'=>$name]);
        } else {
            $workshop->update(['image'=>$request->image]);
        }
        if (!empty($mdl)) {
            File::delete('modul/'.$workshop->modul);
            $nama = time() . '_' . $mdl->getClientOriginalName();
            $mdl->move('modul/', $nama);
            $workshop->update(['modul'=>$nama]);
        } else {
            $workshop->update(['modul'=>$request->modul]);
        }
        if (!empty($sertifikate)) {
            File::delete('images/sertif/' . $workshop->sertif);
            $sertif = time() .'.'. $sertifikate->getClientOriginalExtension();
            $sertifikate->move('images/sertif/', $sertif);
            $workshop->update(['sertif'=>$sertif]);
        } else {
            $workshop->update(['sertif'=>$request->srt]);
        }
        return back()->with('message', 'Workshop berhasil diedit');
    }

    public function detail($slug)
    {
        $workshop = Workshop::where('slug_judul', $slug)->first();
        $transaksi = Transaction::where('workshop_id', $workshop->id)->first();
        $user = $workshop->user()->count();
        return view('user.workshop-detail', [
            'transaksi' => $transaksi,
            'workshop' => $workshop,
            'user' => $user
        ]);
    }

    public function admindetail($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('admin.workshop-detail', ['wk' => $workshop]);
    }

    public function checkWorkshop($slug)
    {
        $user = Auth::guard('user')->user();
        $workshop = Workshop::where('slug_judul', $slug)->first();
        $www = $user->transaction->where('workshop_id', $workshop->id)->first();
        $kode = mt_rand(100, 1000);

        return view('user.checkoutw', [
            'workshop' => $workshop,
            'user' => $user,
            'kode' => $kode,
            'www' => $www
        ]);
    }

    public function hapusPola($id)
    {
        $pola = Pola::findOrFail($id);
        $path = 'images/pola/' . $pola->workshop->id . '/';
        File::delete($path . $pola->image);
        $pola->delete();
        return back();
    }

    public function editPola($id, Request $request)
    {
        $pola = Pola::findOrFail($id);
        $pola->update([
            'teks' => $request->teks,
        ]);
        $img = $request->file('gbr');
        if (!empty($img)) {
            $path = 'images/pola/' . $pola->workshop->id . '/';
            File::delete($path . $pola->image);
            $name = uniqid(rand(), true) . '.' . $img->getClientOriginalExtension();
            $img->move('images/pola/'.$pola->workshop_id.'/', $name);
            $pola->update(['image'=>$name]);
        } else
            $pola->update(['image'=>$request->img]);

        return back();
    }

    public function tambahPola($id, Request $request){
        $ws = Workshop::findOrFail($id);

        $files = collect($request->file('images'));
        $tex = collect($request->text);

        for ($i = 0; $i < count($files); $i++) {
            $nama[$i] = uniqid(rand(), true) . '.' . $files[$i]->getClientOriginalExtension();
            $files[$i]->move('images/pola/' . $ws->id . '/', $nama[$i]);
            Pola::create([
                'workshop_id' => $ws->id,
                'teks' => $tex[$i],
                'image' => $nama[$i]
            ]);
        }
        return redirect()->back();
    }

    public function transaksi($kode, Request $request)
    {
        $user = Auth::guard('user')->user();
        $workshop = Workshop::where('id', $request->workshop)->first();
        $total = $workshop->sale + $kode;
        $seri = Str::random(8);

        $trans = Transaction::create([
            'user_id' => Auth::guard('user')->user()->id,
            'workshop_id' => $workshop->id,
            'kode' => $kode,
            'seri' =>Str::upper('ja-'.$seri)
        ]);

        if ($workshop->sale == 0) {
            $workshop->user()->attach($user->id);
            $ws = array(
                'nama' => $user->fullname,
                'judul' => $workshop->judul,
                'url' => $workshop->url,
                'inv' => $trans->seri
            );
            $tru = 1;
            $total = 0;
            $trans->update([
                'keterangan'=>$tru,
                'total' => $total
            ]);

            Mail::to($user->email)->send(new WorkshopMail(
                $ws
            ));

            return redirect()->route('riwayat')->with('success', 'Selamat Anda sudah terdaftar di Workshop '.$workshop->judul);
        }
        else {
            $ws = array(
                'nama' => $user->fullname,
                'judul' => $workshop->judul,
                'url' => $workshop->url,
                'inv' => $trans->seri
            );
            Mail::to($user->email)->send(new WorkshopMail(
                $ws
            ));
            $trans->update(['total' => $total]);
            $data = 'Halo, Saya ' . $user->fullname . ' sudah melakukan pembayaran Workshop ' . $workshop->judul . ' dengan Total Sebesar Rp ' . $trans->total . '. Akses Workshop untuk ' . $user->email . '. Berikut saya lampirkan foto bukti pembayaran : ';
            return redirect()->away('https://api.whatsapp.com/send?phone=6281217033258&text=' . $data);
        }

    }

}
