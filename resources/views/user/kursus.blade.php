@extends('layout')
@section('judul')
    Kelas | Jahitin Academy
@endsection
@section('isi')
 <style>
     p{
         font-size:10pt;
     }
     @media (max-width: 480px) {
        p{
            font-size:9pt;
        }
    }

</style>
    <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Kelas</li>
                </ul>
                <h2>Daftar Kelas</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <section class="courses-area pt-70 pb-70">
        <div class="container">
            <div class="row">
                @foreach(App\Course::all() as $course)
                    <div class="col-lg-6 col-md-12">
                    <div class="single-courses-list-box mb-30">
                        <div class="box-item">
                            <div class="courses-image">
                                <div class="image">
                                    <img src="{{ asset('images/course/'.$course->thumbnail) }}" alt="image" class="fit-imge" style="width:100%;">
                                    <div class="courses-tag">
                                        @if($course->sale == 0)
                                            <a class="d-block">GRATIS</a>
                                        @else
                                            <a class="d-block">BERBAYAR</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="courses-desc">
                                <div style="position:relative;">
                                    <div class="courses-diskon"  style="left:15px;">
                                        <span class="persentase"> {{ ($course->harga - $course->sale) / $course->harga * 100  }}%</span>
                                        <s class="strikeout" style="font-size:12px;">Rp {{ number_format($course -> harga) }}</s>
                                    </div>
                                </div>
                                <div class="courses-harga" style="right:35px;">Rp {{ number_format($course -> sale) }}</div><br>
                                <div class="courses-content">
                                    <div class="course-author d-flex align-items-center">
                                        <a href="{{ route('user.institution', ['slug' => $course->institution->nama]) }}"><img src="{{ asset('images/insti/'.$course->institution->gambar) }}" class="rounded-circle mr-2 institusi-home" style="display:inline-block;"  alt="image"><span>{{ $course->institution->namaInstansi }}</span></a>
                                        <span class="tersedia-kelas">Tersedia </span>
                                    </div>
                                    <h5 style="max-height:50px;"><a href="{{ route('kursus.detail', ['slug' => $course->slug_judul]) }}" class="d-inline-block judul-home">{{ $course->judul }}</a></h5>
                                    <div class="teks-desktop">
                                        {!! str_limit($course->deskripsi, $limit = 90, $end = ' . . .') !!} </p>
                                    </div>
                                    <div class="teks-mobile">
                                        {!! str_limit($course->deskripsi, $limit = 75, $end = ' . . .') !!} </p>
                                    </div>
                                    <div style="padding-top: 10px;">
                                    <span class="badge-home"><i class='bx bxs-badge-check'></i> {{$course->level}} &nbsp;&nbsp;@if($course->certificate == 'YA')<i class='bx bx-certification'></i> Sertifikat @endif  </span>
                                     </div>
                                </div>

                            </div>

                            <div class="courses-box-footer" style="padding:0;width:100%;">
                                 @if(Auth::guard('user')->check())
                                        @if(Auth::guard('user')->user()->course->contains($course->id))
                                            <a href="{{ route('kursus.detail', ['slug' => $course->slug_judul]) }}" class="btn default-btn1"><span class="label">Buka Kelas</span></a>
                                        @else
                                            <a href="{{ route('kursus.detail', ['slug' => $course->slug_judul]) }}" class="btn default-btn1"><span class="label">Beli</span></a>
                                        @endif
                                    @else
                                    <a href="{{ route('kursus.detail', ['slug' => $course->slug_judul]) }}" class="btn default-btn1"><span class="label">Beli</span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                 </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection
