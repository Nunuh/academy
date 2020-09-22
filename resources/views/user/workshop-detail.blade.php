@extends('layout')
<title> Workshop Detail | Jahitin Academy </title>
@section('isi')
    <style>
    .default-btn {
-webkit-transition: 0.5s;
transition: 0.5s;
display: inline-block;
padding: 13px 25px 12px 55px;
position: relative;
background-color: #7e1037;
color: #ffffff;
border-width: 2px;
border-style: solid;
border-color: #7e1037;
border-radius: 1px;
font-size: 14.5px;
font-weight: 700;
font-family: "Poppins", sans-serif;
}

.courses-sidebar-information ul {
    height: 100%;
    padding-left: 0;
    margin-bottom: 0;
    list-style-type: none;
    background-color: #ffffff;
    -webkit-box-shadow: 0px 8px 16px 0px rgba(146, 184, 255, 0.2);
    box-shadow: 0px 8px 16px 0px rgba(146, 184, 255, 0.2);
}

.courses-details-image{
height:100%;
display:flex;
}
.courses-details-image img {
    width: 100%;
    border-radius: 5px;
    min-height: 200px;
    object-fit: cover;
}
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
    font-size: 16px;
    font-weight: 500;
}

@media (min-width: 480px) and (max-width: 768px) {
    .nav {
        display: -webkit-box;
        display: -ms-flexbox;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none
    }
}

@media (max-width: 480px) {
     .default-btn {
        padding: 5px 25px 5px 50px;
    }
    .default-btn .icon-arrow {
        top: 5px;
        font-size: 18px;
    }
    .nav {
        display: -webkit-box;
        display: -ms-flexbox;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none
    }
    .courses-sidebar-information ul {
    height: auto;
    padding-left: 0;
    margin-bottom: 0;
    list-style-type: none;
    background-color: #ffffff;
    -webkit-box-shadow: 0px 8px 16px 0px rgba(146, 184, 255, 0.2);
    box-shadow: 0px 8px 16px 0px rgba(146, 184, 255, 0.2);
}
    .courses-details-image img {
        width: 100%;
        border-radius: 5px;
        height:200px;
    	min-height: 200px;
        object-fit: cover;
    }
    .courses-details-image{
height:auto;
display:block;
}
    .nav-link {
        display: block;
        padding: .5rem 1rem;
        font-size: 12px;
        font-weight: 500;
    }
}

.tab-content > .tab-pane {
    display: none
}

.tab-content > .active {
    display: block
}

.nav-pills .nav-link {
    border-radius: 0rem;
}

.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #7e1037;
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

.disabled {
    pointer-events: none;
    cursor: default;
    background: #eee;
}

</style>
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('workshop') }}">Workshop</a></li>
                    <li>{{ $workshop->judul }}</li>
                </ul>
                <h2>Workshop</h2>
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
                            <h2>{{ $workshop->judul }}</h2>
                        </div>
                        <div class="courses-meta">
                            <ul>
                                <li>
                                    <i class='bx bx-folder-open'></i>
                                    <span>Kategori</span>
                                    {{ $workshop->kategori->nama}}
                                <li>
                                    <i class='bx bx-group'></i>
                                    <span>Siswa terdaftar</span>
                                    {{ $user }}
                                </li>
                                <li>
                                    <i class='bx bx-calendar'></i>
                                    <span>Pembaruan Terakhir</span>
                                    {{ $workshop->updated_at->format('d-m-Y') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="courses-price">
                            @if($workshop->sale == 0)
	                       @if(Auth::guard('user')->check())
                                    @if(Auth::guard('user')->user()->workshop->contains($workshop->id))
                                        <p></p>
                                    @else
                                        <a class="price">Gratis</a>
                                    @endif
                                    @else

                                        <a class="price">Gratis</a>
                                @endif
                            @else
                                @if(Auth::guard('user')->check())
                                    @if(Auth::guard('user')->user()->workshop->contains($workshop->id))
                                        <p></p>
                                    @else
                                        <div class="price">Rp {{ number_format($workshop ->sale) }}</div>
                                    @endif
                                @else
                                    <div class="price">Rp {{ number_format($workshop ->sale) }}</div>
                                @endif
                            @endif
                            @if(Auth::guard('user')->check())
                                @if(Auth::guard('user')->user()->verifikasi == 1)
                                    @if(Auth::guard('user')->user()->workshop->contains($workshop->id))
                                        <p></p>
                                    @else
                                        <a href="{{ route('checkout.workshop',['slug' => $workshop->slug_judul]) }}"
                                           class="default-btn"><i
                                                class='bx bx-paper-plane icon-arrow before'></i><span
                                                class="label">Daftar</span><i class="bx bx-paper-plane icon-arrow after"></i></a>
                                    @endif
                                @else
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="default-btn"><i class='bx bx-paper-plane icon-arrow before'></i><span class="label">Daftar</span><i class="bx bx-paper-plane icon-arrow after"></i></a>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center>
                                                        <img src="{{ asset('img/verify-ico.jpg') }}" style="height:150px;">
                                                        <h6 style="color:#7e1037;">Lengkapi Data Diri Anda</h6>
                                                        <p>Pastikan data diri yang telah Anda isi benar <br>dan sesuai dengan KTP Anda</p>
                                                        <a href="{{ route('user.akun', ['nama' => Auth::guard('user')->user()->name]) }}" class="default-btn" style="border-radius:30px;padding: 12px 25px 12px 25px;">Oke</a>
                                                    </center>
                                                </div>
                                                <div class="modal-footer" style="padding:0;">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <style>
                                    .item {
                                        display: contents;
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
                                        <p class="default-btn5"><i class='bx bx-paper-plane icon-arrow before'></i><span class="align">Daftar</span><i class="bx bx-paper-plane icon-arrow after"></i></p>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="courses-details-image text-center">
                        <img src="{{asset('images/workshop/'.$workshop->image)}}" style="object-position:left;">
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="courses-sidebar-information">
                        <ul>
                            <li>
                                <span><i class='bx bx-calendar'></i>Pemesanan:</span>
                                September - Oktober 2020
                                <!-- {{ \Carbon\Carbon::parse($workshop->start_tgl)->format('d/m/Y')}}
                                - {{ \Carbon\Carbon::parse($workshop->end_tgl)->format('d/m/Y')}} -->
                            </li>
                            <li>
                                <span><i class='bx bx-calendar'></i>Pelaksanaan:</span>
                                 September - Oktober 2020
                                <!-- <?php Carbon\Carbon::setLocale('id');?>
                                {{Carbon\Carbon::parse($workshop->waktu)->translatedFormat('l, d F Y')}} -->
                            </li>
                            <li>
                                <span><i class='bx bx-time'></i>Waktu:</span>
                                {{ $workshop->jam}}
                            </li>
                            <li>
                                <span><i class='bx bx-buildings'></i>Tempat:</span> {{ $workshop->tempat }}

                            </li>
                            <li>
                                <span><i class='bx bxs-map'></i>Kota:</span>{{ $workshop->kota }}
                            </li>
                            <li>
                                <span><i class='bx bx-badge'></i>Tingkatan:</span>{{ $workshop->level }}
                            </li>
                            <li>
                                <span><i class='bx bx-certification'></i>Sertifikat:</span>
                                {{ $workshop->certificate }}
                            </li>
                            <li>
                                <span style="width:100%;"><i class='bx bx-notepad'></i>Workshop Kit:</span>{!! $workshop->kit !!}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 mt-4" style="border-radius: 3px;">
                    <div class="row"
                         style="box-shadow: 0 5px 30px 0 rgba(107, 107, 107, .1);padding: 15px 0px;margin:0px;">
                        <div class="col-md-3" style="border-right: 1px solid #efefef;">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                   role="tab" aria-controls="v-pills-home" aria-selected="true">Deskripsi</a>
                                @if(Auth::guard('user')->check())
                                    @if(Auth::guard('user')->user()->workshop->contains($workshop->id))
                                        <a class="nav-link @if(Auth::guard('user')->check()) @else disabled @endif" class="nav-link {{old('tab') == '' ? 'active' : null}}"
                                           id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                           role="tab" aria-controls="v-pills-profile" aria-selected="false">Alat</a>
                                        <a class="nav-link @if(Auth::guard('user')->check()) @else disabled @endif"
                                           id="v-pills-bahan-tab" data-toggle="pill" href="#v-pills-bahan" role="tab"
                                           aria-controls="v-pills-bahan" aria-selected="false">Bahan</a>
                                        <a class="nav-link @if(Auth::guard('user')->check()) @else disabled @endif"
                                           id="v-pills-cara-tab" data-toggle="pill" href="#v-pills-cara" role="tab"
                                           aria-controls="v-pills-cara" aria-selected="false">Cara</a>
                                        <a class="nav-link @if(Auth::guard('user')->check()) @else disabled @endif"
                                           id="v-pills-pola-tab" data-toggle="pill" href="#v-pills-pola" role="tab"
                                           aria-controls="v-pills-pola" aria-selected="false">Pola</a>
                                        <a class="nav-link @if(Auth::guard('user')->check()) @else disabled @endif" class="nav-link {{old('tab') == 'v-pills-hasil' ? 'active' : null}}" id="v-pills-hasil-tab" data-toggle="pill" href="#v-pills-hasil" role="tab" aria-controls="v-pills-hasil" aria-selected="false">Hasil</a>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade{{old('tab') == '' ? '-in active' : null}} " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <p></p>
                                    <h4>Apa yang kamu pelajari?</h4>
                                    {!! $workshop->deskripsi !!}
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                     aria-labelledby="v-pills-profile-tab">
                                    {!! $workshop->alat !!}
                                </div>
                                <div class="tab-pane fade" id="v-pills-bahan" role="tabpanel"
                                     aria-labelledby="v-pills-bahan-tab">
                                    {!! $workshop->bahan !!}
                                </div>
                                <div class="tab-pane fade" id="v-pills-cara" role="tabpanel"
                                     aria-labelledby="v-pills-cara-tab">
                                    {!! $workshop->cara !!}
                                </div>
                                <div class="tab-pane fade" id="v-pills-pola" role="tabpanel"
                                     aria-labelledby="v-pills-pola-tab">

                                    <section class="gallery-area p-3">
                                        <div class="row">
                                            @foreach($workshop->pola as $pola)
                                                <div class="col-md-4 col-6">
                                                    <div class="single-gallery-item">
                                                        <img
                                                            src="{{ asset('images/pola/'. $workshop->id.'/'.$pola->image) }}"
                                                            alt="{{$pola->teks}}"
                                                            style="object-fit: cover;height:200px;width:100%;"
                                                            data-original="{{ asset('images/pola/'. $workshop->id.'/'.$pola->image) }}">
                                                        <center><p>{{$pola->teks}}</p></center>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <br>
                                        <center><a href="{{ asset('modul/'.$workshop->modul) }}" download>
                                                <button class="btn btn-success" style="font-size:12px">Download Modul
                                                    disini
                                                </button>
                                            </a></center>
                                    </section>
                                </div>
                                <div class="tab-pane fade{{old('tab') == 'v-pills-hasil' ? '-in active' : null}}" id="v-pills-hasil" role="tabpanel"
                                     aria-labelledby="v-pills-hasil-tab">
                                    <form class="edit-account" action="{{ route('dokumentasi') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <br>
                                            <div class="form-group">
                                                <label>Unggah Hasil Pengerjaan</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-file" name="hasil">
                                                    <input type="text" class="form-control" placeholder='Pilih foto hasil pengerjaan' />			
                                                    <span class="input-group-btn">
                                                        <button class="btn default-btn" style="padding: 10px 20px" type="button"><i class='bx bx-upload'></i> Pilih</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <span style="color:#F00;font-size:9pt;">*Unggah hasil jahit sebagai dokumentasi</span><br><br>
                                            <button type="submit" class="default-btn" style="padding: 10px 30px"> Unggah </button>
                                    </form>
                                    <hr>
                                    <div class="row">
                                    @if(Auth::guard('user')->check())
                                    @foreach(Auth::guard('user')->user()->hasil as $hsl)
                                        <div class="col-md-4 col-6">
                                            <div class="single-gallery-item mb-30">
                                                <img class="hp-foto"
                                                     src="{{ asset('images/dokumentasi/'.$hsl->foto) }}"
                                                     data-original="{{ asset('images/dokumentasi/'.$hsl->foto) }}">
                                                <br><br>
                                                <a style="position:absolute;bottom:50px; background:#fff; padding:5px; border-radius:10px; right:20px;font-size:18pt;"
                                                   href="{{ route('hapus.dok', ['id' => $hsl->id]) }}">
                                                    <i class='bx bxs-trash'></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                        @else

                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
    </script>
    <!-- End Courses Details Area -->
@endsection
