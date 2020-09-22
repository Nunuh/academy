@extends('layout')
@section('judul')
Galeri | Jahitin Academy
@endsection
@section('isi')
<!-- Start Page Title Area -->
        <div class="page-title-area item-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="page-title-content">
                    <ul>
                        <li><a href="{{ route('home')}}">Home</a></li>
                        <li>Galeri</li>
                    </ul>
                    <h2>Galeri Kami</h2>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Gallery Area -->
        <section class="gallery-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    @foreach(\App\Galeri::all() as $galeri)
                    <div class="col-lg-4 col-md-6 col-sm-6" style="padding:10px;">
                        <div class="single-gallery-item">
                            <img src="{{ asset('images/galeri/'.$galeri->poto)}}" alt="Gallery Image" style="object-fit: cover;height:300px;width:100%;" data-original="{{ asset('images/galeri/'.$galeri->poto)}}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
		<!-- End Gallery Area -->
@endsection