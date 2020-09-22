@extends('layout')
<title> Penjahit | Jahitin Academy </title>
@section('isi')
    <Style>
        .cari {
            padding: 0px 5px;
        }

        @media (max-width: 480px) {
            .cari {
                padding: 0px 5px;
            }

            .form-control {
                font-size: 12px;
            }
        }

        .penjahit-web {
            display: block;
        }

        .penjahit-mobile {
            display: none;
        }

        @media (max-width: 480px) {
            .penjahit-web {
                display: none;
            }

            .penjahit-mobile {
                display: block;
            }
        }

        .css-1214sf7 {
            display: flex;
            height: 48px;
            position: fixed;
            bottom: 20px;
            z-index: 5;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: rgba(88, 71, 71, 0.12) 0px 2px 6px 0px;
            width: 224px;
            background-color: white;
            border-radius: 28px;
            border-width: initial;
            border-style: none;
            border-color: initial;
            border-image: initial;
        }

        .css-1tzpxmf {
            width: 24px;
            height: 24px;
            display: inline-block;
            position: relative;
            background-image: url(https://ecs7.tokopedia.net/assets-tokopedia-lite/v2/atreus/production/dffede2d.svg);
            background-size: auto;
            vertical-align: top;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .css-1pufcw0 {
            height: 24px;
            float: left;
            position: relative;
            text-align: left;
            width: 50%;
            margin: 12px 0px;
            padding: 0px 0px 0px 15px;
            border-left: none;
        }

        .css-hrw7tx {
            height: 24px;
            float: left;
            position: relative;
            text-align: left;
            width: 50%;
            margin: 12px 0px;
            padding: 0px 0px 0px 15px;
            border-left: 0.5px solid rgb(224, 224, 224);
        }

        .css-tcjvjw {
            width: 24px;
            height: 24px;
            display: inline-block;
            position: relative;
            background-image: url(https://ecs7.tokopedia.net/assets-tokopedia-lite/v2/atreus/production/8ae0fe9e.svg);
            background-size: auto;
            vertical-align: top;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .css-3a4xom {
            height: 24px;
            line-height: 24px;
            display: inline-block;
            position: relative;
            font-size: 14px;
            font-weight: 600;
            color: rgba(0, 0, 0, 0.7);
            vertical-align: top;
            padding-left: 8px;
        }

        .offcanvas-active {
            overflow: hidden;
        }

        .screen-overlay {
            width: 0%;
            height: 100%;
            z-index: 30;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0;
            visibility: hidden;
            background-color: rgba(34, 34, 34, 0.6);
            transition: opacity .2s linear, visibility .1s, width 1s ease-in;
        }

        .screen-overlay.show {
            transition: opacity .5s ease, width 0s;
            opacity: 1;
            width: 100%;
            visibility: visible;
        }

        .offcanvas {
            width: 100%;
            visibility: hidden;
            transform: translateX(-100%);
            transition: all .2s;
            border-radius: 0;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 1200;
            background-color: #fff;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .offcanvas.offcanvas-right {
            bottom: 0;
            top: auto;
            transform: translateY(100%);
        }

        .offcanvas.show {
            visibility: visible;
            transform: translateX(0);
            transition: transform .2s;
        }

        .offcanvas .btn-close {
            position: absolute;
            right: 15px;
            top: 15px;
        }

    </Style>

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function () {
            // jQuery code
            $(".btn-close, .screen-overlay").click(function (e) {
                $(".screen-overlay").removeClass("show");
                $(".offcanvas").removeClass("show");
                $("body").removeClass("offcanvas-active");
            });

        }); // jquery end
    </script>
    <aside class="offcanvas offcanvas-right" id="my_offcanvas2">
        <header class="p-4 bg-light border-bottom">
            <button class="btn btn-outline-danger btn-close"> &times</button>
        </header>
        <form action="{{ route('penjahit') }}" method="get">
            <select class="form-control" name="sortBy">
                <option value="ASC">Urutkan..</option>
                <option value="ASC">A - Z</option>
                <option value="DESC">Z - A</option>
            </select>
            <button class="btn btn-info" style="width:100%;position:absolute;bottom:0;" type="submit">Temukan</button>
        </form>
    </aside>
    <aside class="offcanvas offcanvas-right" id="my_offcanvas1">
        <header class="p-4 bg-light border-bottom">
            <button class="btn btn-outline-danger btn-close"> &times</button>
        </header>
        <form action="{{ route('penjahit') }}" method="get">
            <select class="form-control" name="orderBy">
                <option value="">Tampilkan menurut profesi..</option>
                @foreach(\App\User::PROFESI as $profesi)
                    <option value="{{ $profesi }}">{{ $profesi }}</option>
                @endforeach
            </select>
            <button class="btn btn-info" style="width:100%;position:absolute;bottom:0;" type="submit">Temukan</button>
        </form>
    </aside>
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Penjahit</li>
                </ul>
                <h2>Penjahit</h2>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <section class="my-account-area ptb-100">
        <div class="container">
            <div class="penjahit-web">
                <form action="{{ route('penjahit') }}" method="get">
                    <div class="row">
                        <div class="col-lg-3 col-4 cari">
                            <div class="form-group">
                                <input class="form-control" style="border-radius: 30px;" name="cari" type="search"
                                       placeholder="Cari.."
                                       aria-label="Search">
                            </div>
                        </div>
                        <div class="col-lg-3 col-4 cari">
                            <div class="form-group">
                                <select class="form-control" name="sortBy" style="border-radius: 30px;">
                                    <option value="ASC">Urutkan..</option>
                                    <option value="ASC">A - Z</option>
                                    <option value="DESC">Z - A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-4 cari">
                            <div class="form-group">
                                <select class="form-control" name="orderBy" style="border-radius: 30px;">
                                    <option value="">Tampilkan menurut profesi..</option>
                                    @foreach(\App\User::PROFESI as $profesi)
                                        <option value="{{ $profesi }}">{{ $profesi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-4" style="margin: 0px auto;">
                            <button class="btn btn-info" style="width:100%;border-radius:1.5em;padding:10px;"
                                    type="submit">Temukan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="penjahit-mobile">
                <div class="go-top">

                </div>
                <div class="css-1214sf7 edoebsv0">
                    <div data-cy="searchRsltSort" class="css-1pufcw0 edoebsv1" data-trigger="#my_offcanvas2">
                        <i class="css-1tzpxmf edoebsv3"></i><span class="css-3a4xom edoebsv4">Sort</span>
                    </div>
                    <div id="floating-filter-icon" data-trigger="#my_offcanvas1"
                    " class="css-hrw7tx edoebsv1">
                    <i class="css-tcjvjw edoebsv2"></i><span class="css-3a4xom edoebsv4">Filter</span>
                </div>
            </div>
        </div>
        @if(count($us) > 0)
            @foreach($us as $user)

                    <div class="myAccount-profile">
                        <div class="row" style="margin:0;">
                            <div class="col-lg-2 col-4" style="padding:15px 0px;">
                                <div class="profile-image" style="margin-left:20px;">
                                    <img class="hp-foto" style="max-height:150px;object-fit:cover;"
                                         src="{{ asset('images/user/'.$user->ava) }}" alt="User Image"
                                         onerror=this.src="{{ asset('images/user/icon.png') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-8">
                                <div style="padding:20px 0px 0px 15px;">
                                    <h6>{{ $user->fullname }}</h6>
                                    <p style="text-transform:capitalize;font-size:8pt;">{{ $user->kota->nama}}, {{ $user->provinsi->nama}}</p>
                                    <h6>Keahlian</h6>
                                    <div class="row" style="margin:0;">
                                        @foreach($user->profesi as $profes)
                                            <span
                                                style="background:#deedff;color:#000;font-size:8pt; padding: 5px 10px;margin: 2px;border-radius: 15px;">{{$profes->nama}}</span>
                                            <p></p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 penjahit-porto">
                                <div class="container" style="padding:20px 20px;">
                                    <h6>Hasil Jahitan</h6>
                                    <section class="gallery-area">
                                        <div class="team-slides owl-carousel owl-theme" style="margin:0px;">
                                            @foreach($user->portofolio as $porto)
                                                <img class="hp-foto" style="height:100px;"
                                                     src="{{ asset('images/porto/'.$porto->photo)}}"
                                                     data-original="{{ asset('images/porto/'.$porto->photo) }}">
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

            @endforeach
            {{ $us->links() }}
        @else
            <p>Belum ada penjahit</p>
            @endif
            </div>
    </section>
@endsection
