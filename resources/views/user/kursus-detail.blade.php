@extends('layout')
<title> Kursus Detail | Jahitin Academy </title>
@section('isi')
<style>
.nav {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	padding-left: 0;
	margin-bottom: 0;
	list-style: none
}
.nav-link {
	display: block;
    padding: .5rem 1rem;
    font-size:16px;
    font-weight:500;
}
.tab-content>.tab-pane {
	display: none
}
.tab-content>.active {
	display: block
}
.nav-pills .nav-link {
	border-radius: .25rem
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
	color: #fff;
	background-color:#7e1037;
}
.nav-link:hover {
    color: #fff;
	background-color:#7e1037;
}
.nav-fill .nav-item {
	-webkit-box-flex: 1;
	-ms-flex: 1 1 auto;
	flex: 1 1 auto;
	text-align: center
}
.nav-justified .nav-item {
	-ms-flex-preferred-size: 0;
	flex-basis: 0;
	-webkit-box-flex: 1;
	-ms-flex-positive: 1;
	flex-grow: 1;
	text-align: center
}

</style>
<!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('kursus') }}">Kelas</a></li>
                <li>{{ $course->judul }}</li>
            </ul>
            <h2>Kelas</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Courses Details Area -->
<section class="courses-details-area pt-70 pb-70">
    <div class="container">
        <div class="courses-details-header">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="courses-title">
                        <h2>{{ $course->judul }}</h2>
                    </div>
                    <div class="courses-meta">
                        <ul>
                            <li>
                                <i class='bx bx-folder-open'></i>
                                <span>Kategori</span>
                                <a href="#"> {{ $course->kategori->nama }}</a>
                            </li>
                            <li>
                                <i class='bx bx-group'></i>
                                <span>Siswa terdaftar</span>
                                <a href="#">{{ $course->user()->count() }}</a>
                            </li>
                             <li>
                                <i class='bx bx-group'></i>
                                <span>Pembaharuan terakhir</span>
                                <a href="#">{{ $course->updated_at->format('d-m-Y') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="courses-price">
                        @if($course->harga == 0)
                            <div class="price">Gratis</div>
                        @else
                            @if(Auth::guard('user')->check())
                                @if(Auth::guard('user')->user()->course->contains($course->id))
                                        <p></p>
                                    @else
                                    <div class="price">Rp {{ number_format($course -> harga) }}</div>
                                @endif
                            @else
                            <div class="price">Rp {{ number_format($course -> harga) }}</div>
                            @endif
                        @endif

                        @if(Auth::guard('user')->check())
                            @if(Auth::guard('user')->user()->verifikasi==1 )
                                @if($course->harga == 0)
                                    <p></p>
                                @else
                                    @if(Auth::guard('user')->user()->course->contains($course->id))
                                        <p></p>
                                    @else
                                        <a href="{{ route('checkout.course', ['slug' => $course->slug_judul]) }}"
                                           class="default-btn"><i
                                                class='bx bx-paper-plane icon-arrow before'></i><span
                                                class="label">Ikut Kursus</span><i
                                                class="bx bx-paper-plane icon-arrow after"></i></a>
                                    @endif
                                @endif
                            @else
                                <a href="{{ route('user.akun', ['nama' => Auth::guard('user')->user()->name]) }}"
                                   class="default-btn"><i
                                        class='bx bx-paper-plane icon-arrow before'></i><span
                                        class="label">Lengkapi Data Diri</span><i
                                        class="bx bx-paper-plane icon-arrow after"></i></a>
                            @endif
                        @else
                            <style>
                                .item{
                                    display:contents;
                                }
                                .item:hover a p.default-btn5 span {
                                    display: none;
                                }

                                .item:hover a p.default-btn5:after {
                                    content: 'Daftar';
                                    position: relative;
                                    right: 30px;

                                }
                            </style>
                            <div class="item">
                                <a href="{{ route('user.loginpage') }}">
                                    <p class="default-btn5"><i class='bx bx-paper-plane icon-arrow before'></i><span
                                            class="align">Ikuti Kelas</span><i
                                            class="bx bx-paper-plane icon-arrow after"></i></p>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="courses-details-image text-center">
                    @if (Auth::guard('user')->check())
                        @if(Auth::guard('user')->user()->verifikasi = 1)
                            @if($course->harga == 0)
                                <iframe
                                    src="{{ $course->video }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&autoplay=0"
                                    width="100%" height="500" frameborder="1" allowfullscreen
                                    allowtransparency></iframe>
                            @else
                                @if(Auth::guard('user')->user()->course->contains($course->id))
                                    <iframe
                                        src="{{ $course->video }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&autoplay=0"
                                        width="100%" height="500" frameborder="1" allowfullscreen
                                        allowtransparency></iframe>
                                @else
                                    <img src="{{ asset('images/course/'.$course->thumbnail) }}">
                                @endif
                            @endif
                        @else
                            <img src="{{ asset('images/course/'.$course->thumbnail) }}">
                        @endif
                    @else
                        <img src="{{ asset('images/course/'.$course->thumbnail) }}">
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="courses-sidebar-information">
                    <ul>
                        <li>
                            <span><i class='bx bx-time'></i> Durasi:</span>
                            {{ $course->durasi }}
                        </li>
                        <li>
                            <span><i class='bx bxs-institution'></i> Institusi:</span>
                            <a href="{{ route('user.institution', ['slug' => $course->institution->nama]) }}"
                               class="d-inline-block">{{ $course->institution->namaInstansi }}</a>
                        </li>
                        <li>
                            <span><i class='bx bxs-graduation'></i> Subyek :</span>
                            {{ $course->subject }}
                        </li>
                        <li>
                            <span><i class='bx bx-atom'></i> Quis :</span>
                            {{ $course->quizzes }}
                        </li>
                        <li>
                            <span><i class='bx bxs-badge-check'></i> Tingkatan :</span>
                            {{ $course->level }}
                        </li>
                        <li>
                            <span><i class='bx bx-support'></i> Bahasa :</span>
                            {{ $course->language }}
                        </li>
                        <li>
                            <span><i class='bx bx-certification'></i> Sertifikat :</span>
                            {{ $course->certificate }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 mt-4" style="border-radius: 3px;height: 100%;">
                <div class="row" style="box-shadow: 0 5px 30px 0 rgba(107, 107, 107, .1);padding: 15px 0px;margin:0px;">
                    <div class="col-md-3" style="border-right: 1px solid #efefef;">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Deskripsi</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Tujuan Pembelajaran</a>
                             <a class="nav-link" id="v-pills-alat-tab" data-toggle="pill" href="#v-pills-alat" role="tab" aria-controls="v-pills-alat" aria-selected="false">Alat</a>
                             
                             <a class="nav-link" id="v-pills-bahan-tab" data-toggle="pill" href="#v-pills-bahan" role="tab" aria-controls="v-pills-bahan" aria-selected="false">Bahan</a>
                             
                             <a class="nav-link" id="v-pills-cara-tab" data-toggle="pill" href="#v-pills-cara" role="tab" aria-controls="v-pills-cara" aria-selected="false">Cara</a>
                        </div>
                    </div>
                
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h3>Apa yang kamu pelajari?</h3>
                                {!! $course->deskripsi !!}
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                Ini konten Tujuan Pembelajaran
                            </div>
                             <div class="tab-pane fade" id="v-pills-alat" role="tabpanel" aria-labelledby="v-pills-alat-tab">
                                Ini konten Alat 
                            </div>
                            <div class="tab-pane fade" id="v-pills-bahan" role="tabpanel" aria-labelledby="v-pills-bahan-tab">
                                Ini konten Bahan
                            </div>
                            <div class="tab-pane fade" id="v-pills-cara" role="tabpanel" aria-labelledby="v-pills-cara-tab">
                                
                                {!! $course->syllabus !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Courses Details Area -->


@endsection
