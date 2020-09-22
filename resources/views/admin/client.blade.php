@extends('admin_layout')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="module message">
        <div class="module-head">
            <h3>All User</h3>
        </div>

        <div class="module-option clearfix">
           <form class="form-search" action="{{ route('listUser.admin') }}" method="get">
               <input name="cari" type="search" placeholder="cari.."aria-label="Search">
               <button class="btn btn-outline-info" type="submit">Cari</button>
           </form>
        </div>

        <div class="module-body table">
            <a class="btn btn-success" target="_blank" href="{{ route('export.user') }}">EXPORT USER</a>
            <br><br>
            <table id="user" class="table table-message" style="width: 100%">
                <thead>
                <tr class="heading">
                    <td width="15%">
                        Nama
                    </td>
                    <td width="30%">
                        Workshop
                    </td>
                    <td width="30%">
                        Kursus
                    </td>
                    <td width="5%">
                        Jumlah
                    </td>
                    <td width="20%">
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    <tr class="unread">
                        <td>
                            {{ $us -> name }}
                        </td>
                        <td>
                            @foreach($us->workshop as $wk)
                                <li href="#">
                                    {{ $wk->judul }}
                                </li>
                            @endforeach
                        </td>
                        <td>
                            <ul>
                                @foreach($us->course as $c)
                                    <li href="#">
                                        {{ $c -> judul }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            {{ $us->course->count() + $us->workshop->count()}}
                        </td>
                        <td class="btn-toolbar">
                            <button type="button" class="btn btn-primary btn-xs accordion-toggle" data-toggle="modal"
                                    data-target="#modal_{{ $us->id }}">Detail
                            </button>
                            <button type="button" class="btn btn-default btn-xs accordion-toggle" data-toggle="modal"
                                    data-target="#modalp_{{ $us->id }}">Portofolio
                            </button>
                        </td>
                    </tr>

                    <div id="modalp_{{ $us->id }}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Portofolio {{ $us->name }}</h4>
                                </div>
                                <!-- body modal -->
                                <div class="modal-body">
                                    @foreach($us->portofolio as $porto)
                                        <img width="200" src="{{ asset('images/porto/'. $porto->photo) }}" alt="image">
                                        <p class="center">{{ $porto->judul }}</p>
                                    @endforeach
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="modal_{{ $us->id }}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Detail {{ $us->name }}</h4>
                                </div>
                                <!-- body modal -->
                                <div class="modal-body">
                                    <img width="150px" src="{{asset('images/user/'.$us->ava)}}">
                                    <img width="250px" src="{{asset('images/ktp/'.$us->foto)}}">
                                    <br><br>
                                    <ul>
                                        <li>
                                            {{ $us -> nik }}
                                        </li>
                                        <li>
                                            {{ $us->gender }}
                                        </li>
                                        <li>
                                            {{ $us -> fullname }}
                                        </li>
                                        <li>
                                            {{ $us -> email }}
                                        </li>
                                        <li>
                                            {{ $us -> telp }}
                                        </li>
                                        <li>
                                            @if(isset($us->profesi))
                                                @foreach($us->profesi as $po)
                                                    {{ $po->nama.', ' }}
                                                @endforeach
                                            @endif
                                        </li>
                                        <li>
                                            {{ $us -> tgl_lahir }}
                                        </li>
                                        <li>
                                            @if(isset($us->provinsi) && isset($us->kota) && isset($us->kecamatan))
                                                {{ $us -> alamat.', '.$us->kecamatan->nama.', '.$us->kota->nama.', '.$us->provinsi->nama.' - '.$us->kodepos}}
                                            @else
                                                {{ $us -> alamat.', '.$us->kodepos}}
                                            @endif
                                        </li>

                                    </ul>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            
                
                {{ $user->links() }}
        </div>
    </div>
@endsection
