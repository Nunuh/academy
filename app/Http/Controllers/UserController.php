<?php

namespace App\Http\Controllers;

use App\Course;
use App\Hasil;
use App\Kecamatan;
use App\Kota;
use App\Mail\ForgotMail;
use App\Partner;
use App\Portofolio;
use App\Profesi;
use App\Subscribe;
use App\User;
use App\Verify;
use App\Workshop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Nasution\ZenzivaSms\Client as Sms;
use Tzsk\Otp\Facades\Otp;
use App\Notifications\InvoiceNotif;

class UserController extends Controller
{

    public function index()
    {
        $kelas = Course::all();
        $works = Workshop::where('tampil', true)->get();
        $part = Partner::all();
        return view('user.home', [
            'kelas' => $kelas,
            'works' => $works,
            'part' => $part
        ]);
    }

    public function login()
    {
        return view('user.login');
    }

    public function loginPost(Request $request)
    {
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'telp';

        $login = [
            $fieldType => $request->login,
            'password' => $request->password
        ];

        if (Auth::guard('user')->attempt($login)) {
            return redirect()->intended('/');
        } else
            return back()->withErrors(['email' => 'Email atau password Anda salah']);
    }

    public function logout()
    {
        Auth::guard($this->getAttemptedGuard())->logout();
        return redirect()->route('home');
    }

    public function register()
    {
        return view('user.register');
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

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $us = User::where('email', $request->email)->first();

        if (isset($us)) {
            $us->update([
                'remember_token' => sha1(uniqid(time(), true))
            ]);

            Mail::to($us->email)->send(new ForgotMail($us));
            return back()->with('status', 'Link untuk reset password telah dikirim ke email Anda. Silahkan cek Email Anda');
        } else {
            return back()->with('warning', 'Silahkan daftarkan email kamu terlebih dahulu');
        }
    }

    public function reset($token)
    {
        $resetUser = Verify::where('token', $token)->first();
        $users = $resetUser->user;
        if (isset($resetUser)) {
            return view('user.resetPass', [
                'users' => $users
            ]);
        } else {
            return view('user.forgotPass');
        }
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'telp' => 'required|min:10|max:12'
        ], [
            'telp.min' => 'Nomor Hp tidak boleh kurang dari 10 angka',
            'telp.max' => 'Nomor Hp tidak valid'
        ]);
        $users = User::where('telp', $request->telp)->first();
        if (isset($users)) {
            if ($users->konfirmasi){
                return redirect()->route('user.loginpage')->with('warning', 'Nomor Anda telah terdaftar. Silahkan login');
            }else{
                $code = Otp::digits(6)->expiry(2)->generate($request->telp);
                $sms = new Sms('ae94f3c2b0db', '1fa93ff8702c0918ae1ae783');
                $sms->masking()->otp()->send($request->telp, 'Gunakan kode OTP ' . $code . ' untuk memverifikasi akun Jahitin Academy Anda. Pihak Jahitin tidak pernah meminta kode ini, jangan berikan kode ini kepada siapapun.');
                $users->verify->update([
                    'token' => $code
                ]);
                return redirect()->route('otp', ['telp' => $users->telp])->with('info', 'Berhasil mengirimkan kode OTP');
            }
        } else {
            $code = Otp::digits(6)->expiry(2)->generate($request->telp);
            $user = User::create([
                'telp' => $request->telp
            ]);

            Verify::create([
                'user_id' => $user->id,
                'token' => $code
            ]);
            $sms = new Sms('ae94f3c2b0db', '1fa93ff8702c0918ae1ae783');
            $sms->masking()->otp()->send($request->telp, 'Gunakan kode OTP ' . $code . ' untuk memverifikasi akun Jahitin Academy Anda. Pihak Jahitin tidak pernah meminta kode ini, jangan berikan kode ini kepada siapapun.');
            return redirect()->route('otp', ['telp' => $user->telp])->with('info', 'Berhasil mengirimkan kode OTP');
        }
    }

    public function verifyUser(Request $request)
    {
        $verifyUser = Verify::where('token', $request->otp)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            $user->konfirmasi = true;
            $user->email_verified_at = Carbon::now();
            $user->save();
            return back()->withInput(['tab' => 'isi']);
        } else {
            return back()->with('status', 'Kode OTP yang Anda masukkan salah');
        }
    }

    public function resendOtp($telp)
    {
        $code = Otp::digits(6)->expiry(2)->generate($telp);
        $sms = new Sms('ae94f3c2b0db', '1fa93ff8702c0918ae1ae783');
        $sms->masking()->otp()->send($telp, 'Gunakan kode OTP ' . $code . ' untuk memverifikasi akun Jahitin Academy Anda. Pihak Jahitin tidak pernah meminta kode ini, jangan berikan kode ini kepada siapapun.');
        $user = User::where('telp', $telp)->first();
        $user->verify->update([
            'token' => $code
        ]);
        return back();
    }

    public function setPassword(Request $request, $telp)
    {
        $user = User::where('telp', $telp)->first();
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'email.unique' => 'Email telah digunakan',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        $mail = explode('@', $request->email);
        $user->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $mail[0].Str::random(4)
        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect()->intended('user.selesai');
        else
            return redirect()->route('user.loginpage')->with('info', 'Silahkan login kembali');
    }

    public function ubahPass(Request $request)
    {
        $this->validate($request, [
            'pass_lama' => 'required|min:6',
            'pass_baru' => 'required|min:6',
            'konfirm_pass_baru' => 'required|min:6'
        ]);

        if (Hash::check($request->pass_lama, Auth::guard('user')->user()->password)) {
            if ($request->pass_baru == $request->konfirm_pass_baru) {
                Auth::guard('user')->user()->update([
                    'password' => bcrypt($request->pass_baru)
                ]);
            } else {
                return back()->with('message', 'Konfirmasi password Tidak sama!');
            }
        } else {
            return back()->with('message', 'Password lama salah!');
        }
        return back()->with('message', 'Password berhasil diubah');
    }

    public function hapusktp($id)
    {
        $user = User::findOrFail($id);
        $path = 'images/ktp/';
        File::delete($path . $user->foto);
        $user->update(['foto' => null]);
        return back()
            ->withInput(['tab' => 'akun']);
    }

    public function loadakun()
    {
        return back()
            ->withInput(['tab' => 'akun']);
    }

    public function ubahProfil(Request $request)
    {
        $user = Auth::guard('user')->user();
        $user->update([
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'foto' => ''
        ]);
        $image = $request->file('foto');
        if ($image != '' || $image != null) {
            if ($user->foto != '' || $user->foto != null) {
                $path = 'images/ktp/';
                File::delete($path . $user->foto);
            }
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/ktp/', $name);
            $user->foto = $name;
        } else {
            $user->foto = $request->foto;
        }
        $user->save();
        return back()
            ->withInput(['tab' => 'akun']);
    }

    public function ubahAkun(Request $request)
    {
        $user = Auth::guard('user')->user();

        $user->update([
            'provinsi_id' => $request->provinsi_id,
            'kota_id' => $request->kota_id,
            'kecamatan_id' => $request->kecamatan_id,
            'kodepos' => $request->kodepos,
            'domisili' => $request->domisili,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'telp' => $request->telp,
            'wa' => $request->wa
        ]);

        if ($request->profesi) {
            foreach ($request->profesi as $pro) {
                $profes = Profesi::create([
                    'nama' => $pro
                ]);
                $user->profesi()->attach($profes->id);
            }
        }
        $user->save();
        return back()->withInput(['tab' => 'porto']);
    }

//    public function porto(Request $request)
//    {
//        $user = Auth::guard('user')->user();
//        $files = $request->file('images');
//        $img = array();
//        foreach ($files as $file) {
//            $filename = uniqid(rand(), true) . $file->getClientOriginalName();
//            $file->move('images/porto/' . $user->id . '/', $filename);
//            array_push($img, $user->id . '/' . $filename);
//        }
//        $user->update([
//            'images' => $img
//        ]);
//        return back()->with('message', 'Berhasil menambahkan foto portofolio');
//    }

    public function portofolio(Request $request)
    {
        $user = Auth::guard('user')->user()->id;
        $this->validate($request, [
            'judul' => 'required',
            'photo' => 'required'
        ]);
        $img = $request->file('photo');
        $filename = time() . '.' . $img->getClientOriginalExtension();
        $img->move('images/porto/', $filename);

        Portofolio::create([
            'user_id' => $user,
            'judul' => $request->judul,
            'photo' => $filename
        ]);
        return back()->withInput(['tab' => 'porto']);
    }

    public function hapusPorto($id)
    {
        $porto = Portofolio::findOrFail($id);
        $path = 'images/porto/';
        File::delete($path . $porto->photo);
        $porto->delete();
        return back()
            ->withInput(['tab' => 'porto']);
    }

    public function dropdown(Request $request)
    {
        $config['cookie_secure'] = TRUE;

        $kota = Kota::where('provinsi_id', $request->get('id'))->get();

        return response()->json($kota);
    }

    public function dropdown1(Request $request)
    {
        $kecamatan = Kecamatan::where('kota_id', $request->get('id'))->get();

        return response()->json($kecamatan);
    }

    public function resetPass($id, Request $request)
    {
        $use = User::findOrFail($id);
        if (isset($use)) {
            if ($request->password == $request->konfirm_pass) {
                $use->update([
                    'password' => bcrypt($request->password)
                ]);
                return redirect()->route('user.loginpage')->with('status', 'Password Anda telah berhasil diubah');
            } else
                return back()->with('warning', 'Konfirmasi password Anda tidak sama');
        } else {
            return back()->with('warning', 'Pastikan Anda telah memeriksa email Anda');
        }
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribes'
        ]);

        Subscribe::create([
            'email' => $request->email
        ]);

        return back()->with('info', 'Terimakasih, Anda telah menjadi subscriber Jahitin Academy');
    }

    public function editProfesi($id)
    {
        $use = User::findOrFail($id);
        $use->profesi()->detach();
        return redirect()->back();
    }

    public function save_image(Request $request)
    {
        $user = Auth::guard('user')->user();
        $avas = $request->file('ava');
        if ($avas) {
            $compPic = time() . '.' . $avas->getClientOriginalExtension();
            $avas->move('images/user/', $compPic);
            $user->update(['ava' => $compPic]);
        }
        if ($user->save()) {
            echo 200;
        } else {
            echo 700;
        }
    }

    public function dokumentasi(Request $request)
    {
        $user = Auth::guard('user')->user()->id;
        $img = $request->file('hasil');
        $filename = time() . '_' . $img->getClientOriginalName();
        $img->move('images/dokumentasi/', $filename);

        Hasil::create([
            'user_id' => $user,
            'foto' => $filename
        ]);
        return back()->withInput(['tab' => 'v-pills-hasil']);
    }

    public function hapusDok($id)
    {
        $dok = Hasil::findOrFail($id);
        $path = 'images/dokumentasi/';
        File::delete($path . $dok->foto);
        $dok->delete();
        return back()->withInput(['tab' => 'v-pills-hasil']);
    }
}
