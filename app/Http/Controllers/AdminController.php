<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Course;
use App\Exports\SubscribeExport;
use App\Exports\UserExport;
use App\Galeri;
use App\Hasil;
use App\Mail\CourseMail;
use App\Mail\DokumenMail;
use App\Mail\FailMail;
use App\Mail\VerifikasiMail;
use App\Mail\WorkshopMail;
use App\Subscribe;
use App\Transaction;
use App\User;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function index(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('dashboard.admin');
        }
        else{
            return view('admin.login');
        }
    }

    public function dashboard()
    {
        $works = Workshop::paginate(3, ['*'], 'works');
        $courses = Course::paginate(3, ['*'], 'courses');
        $subs = User::where('verifikasi', '=', null)->count();
        $trans = Transaction::where('keterangan', '=', null)->count();
        $user = User::count();

        return view('admin.dashboard', [
            'trans' => $trans,
            'works' => $works,
            'courses' => $courses,
            'user' => $user,
            'subs' => $subs
        ]);
    }

    public function listUser(Request $request)
    {
        if (isset($request->cari)){
            $u = User::where('email', 'LIKE', '%' . $request->cari . '%')
                ->orWhere('fullname', 'LIKE', '%' . $request->cari . '%')
                ->paginate(10);
        }
        else{
            $u = User::paginate(10);
        }
        return view('admin.client', ['user' => $u]);
    }

    public function course()
    {
        return view('admin.course');
    }

    public function partner()
    {
        return view('admin.partner');
    }

    public function account()
    {
        return view('admin.account');
    }

    public function subs()
    {
        $subscribe = Subscribe::all();
        return view('admin.subscribe', [
            'subscribe' => $subscribe
        ]);
    }

    public function verification()
    {
        $user = User::paginate(10);
        return view('admin.verification', [
            'user' => $user
        ]);
    }

    public function subscribe()
    {
        return view('admin.subscribed');
    }

    public function kategori()
    {
        return view('admin.kategori');
    }

    public function dok(){
        return view('admin.dokumentasi');
    }

    public function galeri(){
        return view('admin.galeri');
    }

    public function addGaleri(Request $request){

        $poto = $request->file('poto');
        $filename = time() . '_' . $poto->getClientOriginalName();
        $poto->move('images/galeri/', $filename);

        Galeri::create([
            'poto' => $filename
        ]);
        return back()->with('message', 'Berhasil menambahkan foto galeri');
    }

    public function hapusGaleri($id){
        $galeri = Galeri::findOrFail($id);
        $path = 'images/galeri/';
        File::delete($path. $galeri->poto);
        $galeri->delete();
        return back()->with('message', 'Berhasil menghapus foto galeri');
    }

    public function institution()
    {
        return view('admin.institution');
    }

    public function artikel()
    {
        return view('admin.artikel');
    }

    public function exportSubscriber(){
        return Excel::download(new SubscribeExport, 'subscriber.xlsx');
    }

    public function exportUser(){
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        if ($user->ava != '' && $user->ava != null) {
            $tumb = 'images/user/';
            File::delete($tumb.$user->ava);
        }
        if ($user->foto != '' && $user->foto != null) {
            $katepe = 'images/ktp/';
            File::delete($katepe.$user->foto);
        }
        $user->delete();
        return back()->with('message', 'User sudah terhapus');
    }

    public function cancel($id)
    {
        $user = User::findOrFail($id);
        $user->verifikasi = null;
        $user->save();
        return back()->with('message', 'Sudah dibatalkan verifikasinya');
    }

    public function logged (Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/Jahitan1/dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password Anda salah']);
    }

    public function logout (){
        Auth::guard($this->getAttemptedGuard())->logout();
        return view('admin.login');
    }

    public function getAttemptedGuard()
    {
        if (Auth::guard('user')->check()) {
            return 'user';
        }
        if (Auth::guard('admin')->check()) {
            return 'admin';
        }
        return null;
    }

    public function register (){
        return view('admin.add_admin');
    }

    public function registerPost (Request $request){
        $this->validate($request, [
            'name'=>'required|min:4',
            'email'=>'required|min:4|email|unique:admins',
            'password'=>'required|min:8',
            'passConfirm'=>'required|same:password',
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('account.admin')->with('message', 'Admin Berhasil Ditambah');
    }

    public function hapusAdmin($id){
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return back()->with('message', 'Berhasil dihapus');
    }

    public function ubahPassword(Request $request){
        $this->validate($request, [
            'pass_lama' => 'required|min:8',
            'pass_baru' => 'required|min:8',
            'konfirmasi_pass_baru' => 'required|min:8'
        ]);

        if (Hash::check($request->pass_lama, Auth::guard('admin')->user()->password)){
            if ($request->pass_baru == $request->konfirmasi_pass_baru){
                Auth::guard('admin')->user()->update([
                    'password' => bcrypt($request->pass_baru)
                ]);
            }
            else{
                return back()->with('message', 'Konfirmasi password Salah!');
            }
        }
        else{
            return back()->with('message', 'Password lama salah!');
        }

        return back()->with('message', 'Password berhasil diubah');
    }

    public function validasiCourse(Request $request){
        $this->validate($request, [
            'kursus' => 'required',
            'email' => 'required'
        ]);

        $course = Course::findOrFail($request->kursus);
        $course->user()->attach($request->email);

        $us = User::findOrFail($request->email);

        $kurs = array(
            'nama' => $us->fullname,
            'judul' => $course->judul
        );

        Mail::to($us->email)->send(new CourseMail(
            $kurs
        ));

        return back()->with('message', 'Berhasil Validasi Course');
    }

    public function lunas($id, Request $request){
        $trans = Transaction::findOrFail($id);
        $trans->update([
            'keterangan' => $request->keterangan
        ]);
        $work = Workshop::findOrFail($trans->workshop->id);
        $work->user()->attach($trans->user->id);
        $ws = array(
            'nama' => $trans->user->fullname,
            'judul' => $work->judul,
            'url' => $work->url,
        );
        Mail::to($trans->user->email)->send(new WorkshopMail(
            $ws
        ));
        return back()->with('message', 'Sudah disetujui pelunasannya');
    }

    public function validasiWorkshop(Request $request){
        $this->validate($request, [
            'ws' => 'required',
            'email' => 'required'
        ]);

        $work = Workshop::findOrFail($request->ws);
        $work->user()->attach($request->email);
        $us = User::findOrFail($request->email);

        //Qr Code
//        $writer = new ImageRenderer(
//            new RendererStyle(400),
//            new ImagickImageBackEnd()
//        );
//        $qr = new Writer($writer);
//        $path = public_path('images/qr/qrcode.png');
//        $qr->writeFile($us->name.' '. $us->telp. ' mengikuti '. $work->judul, $path);

        $ws = array(
            'nama' => $us->fullname,
            'judul' => $work->judul,
            'url' => $work->url,
//            'qr' => is_object($qr),
//            'path' => $path
        );

//        Mail::to($us->email)->send(new WorkshopMail(
//            $ws
//        ));

        return back()->with('message', 'Berhasil Validasi Workshop');
    }

    public function checkdokumen($id, Request $request){

        $dokumen = Transaction::findOrFail($id);

        $dokumen->update([
            'dokumentasi' => $request->dokumentasi
        ]);

        $img = Image::make('images/sertif/'.$dokumen->workshop->sertif);
        $img->text($dokumen->user->fullname, 530, 300, function ($font){
            $font->file(public_path('fonts/OpenSans-ExtraBold.ttf'));
            $font->size(56);
            $font->align('center');
            $font->valign('top');
            $font->angle(0);
        });

        $img->save('images/sertifikat/'.$dokumen->workshop->sertif);

        $dok = array(
            'nama' => $dokumen->user->fullname,
            'judul' => $dokumen->workshop->judul,
            'works' => 'https://academy.jahitin.com/workshop'
        );
        Mail::to($dokumen->user->email)->send(new DokumenMail($dok));

        return back()->with('message', 'Sudah dikonfirmasi dokumentasinya');
    }

    public function fail($id, Request $request)
    {
        $user = User::findOrFail($id);
        $fail = array(
            'nama' => $user->fullname,
            'konten' => $request->konten
        );
        Mail::to($user->email)->send(new FailMail($fail));
        return back()->with('message', 'Email telah terkirim');
    }

    public function failDokumentasi($id, $ws){
        $user = User::findOrFail($id);
        $work = Workshop::where('slug_judul', $ws)->first();
        $datas = array(
            'name' => $user->fullname,
            'workshop' => $work->judul
        );
        Mail::to($user->email)->send(new VerifikasiMail(
            $datas
        ));
        return back()->with('message', 'Berhasil mengirim email ke penjahit yang gagal');
    }

}
