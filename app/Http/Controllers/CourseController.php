<?php

namespace App\Http\Controllers;

use App\Course;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function tambah(Request $request)
    {
        $slug = Str::slug($request->get('judul'));

        $course = Course::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'kategori_id' => $request->kategori_id,
            'institution_id' => $request->institution_id,
            'video' => $request->video,
            'thumbnail' => '',
            'kode' => $request->kode,
            'judul' => $request->judul,
            'start_tgl' => $request->start_tgl,
            'end_tgl' => $request->end_tgl,
            'slug_judul' => $slug,
            'subject' => $request->subject,
            'deskripsi' => $request->deskripsi,
            'alat' => $request->alat,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'syllabus' => $request->syllabus,
            'level' => $request->level,
            'url' => $request->url,
            'language' => $request->language,
            'subtitle' => $request->subtitle,
            'harga' => $request->harga,
            'sale' => $request->sale,
            'durasi' => $request->durasi,
            'quizzes' => $request->quizzes,
            'certificate' => $request->certificate,
            'tampil' => $request->tampil
        ]);
        $thumbnail = $request->file('thumbnail');
        $thumbnail->move('images/course', $course->id . '.' . $thumbnail->getClientOriginalExtension());
        $course->thumbnail = $course->id . '.' . $thumbnail->getClientOriginalExtension();
        $course->save();

        return redirect()->route('course.admin')->with('message', 'Berhasil Menambahkan Kursus');
    }

    public function checkCourse($slug){
        $user = Auth::guard('user')->user();
        $course = Course::where('slug_judul', $slug)->first();
        $kode =  mt_rand(100, 1000);

        return view('user.checkout', [
            'course' => $course,
            'user' => $user,
            'kode' => $kode
        ]);
    }

    public function transaksi($kode, Request $request){
        $trans = Transaction::create([
            'user_id' => Auth::guard('user')->user()->id,
            'course_id' => $request->course,
            'kode' => $kode
        ]);

        $user = Auth::guard('user')->user();
        $kurs = Course::where('id', $trans->course_id)->first();
        $total = number_format($kode+$kurs->harga);

        $data = 'Halo, Saya '.$user->fullname. ' sudah melakukan pembayaran Kelas '. $kurs->judul. ' dengan Total sebesar Rp '. $total.'. Akses Kelas untuk '. $user->email. '. Berikut saya lampirkan foto bukti pembayaran : ';

        return redirect()->away('https://api.whatsapp.com/send?phone=6281217033258&text='.$data);
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        if ($course->thumbnail != null){
            $thumb = 'images/course/';
            File::delete($thumb. $course->thumbnail);
        }
        $course->delete();
        return back()->with('message', 'Kursus berhasil dihapus');
    }

    public function edit($id, Request $request)
    {
        $kursus = Course::findOrFail($id);

        $kursus->update([
            'video' => $request->video,
            'thumbnail' => '',
            'kode' => $request->kode,
            'judul' => $request->judul,
            'institution_id' => $request->institution_id,
            'subject' => $request->subject,
            'start_tgl' => $request->start_tgl,
            'end_tgl' => $request->end_tgl,
            'url' => $request->url,
            'deskripsi' => $request->deskripsi,
            'alat' => $request->alat,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'kategori_id' => $request->kategori_id,
            'syllabus' => $request->syllabus,
            'level' => $request->level,
            'language' => $request->language,
            'subtitle' => $request->subtitle,
            'harga' => $request->harga,
            'sale' => $request->sale,
            'durasi' => $request->durasi,
            'quizzes' => $request->quizzes,
            'certificate' => $request->certificate,
            'tampil' => $request->tampil
        ]);

        $imge = $request->file('gambar');
        if (!empty($imge)) {
            File::delete('images/course/'. $kursus->thumbnail);
            $name = time() . '.' . $imge->getClientOriginalExtension();
            $imge->move('images/course/', $name);
            $kursus->thumbnail = $name;
        } else {
            $kursus->thumbnail = $request->thumbnail;
        }

        $kursus->save();
        return back()->with('message', 'Course berhasil diedit');
    }

    public function detailCourse($slug)
    {
        $course = Course::where('slug_judul', $slug)->first();
        return view('user.kursus-detail', ['course' => $course]);
    }
    public function admindetail($slug)
    {
        $course = Course::where('slug_judul', $slug)->first();
        return view('admin.course-detail', ['course' => $course]);
    }
}
