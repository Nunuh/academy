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
            <h3>User Verifikasi</h3>
        </div>

        <div class="module-option clearfix">
            {{--<div class="pull-left">--}}
            {{--<form class="navbar-search pull-left input-append" action="{{ route('user.search') }}" method="GET">--}}
            {{--<input type="text" class="span3" name="cari" placeholder="search.." value="{{ old('cari') }}">--}}
            {{--<button class="btn" type="submit">--}}
            {{--<i class="icon-search"></i>--}}
            {{--</button>--}}
            {{--</form>--}}
            {{--</div>--}}
            {{--<div class="pull-right">--}}
            {{--<a href="#" class="btn btn-primary">Compose</a>--}}
            {{--</div>--}}
        </div>

        <div class="module-body table">
            <table class="table table-responsive table-message">
                <thead>
                <tr class="heading">
                    <td width="20%">
                        Nama
                    </td>
                    <td width="15%">
                        No. HP
                    </td>
                    <td width="15%">
                        Daerah
                    </td>
                    <td width="15%">
                        KTP
                    </td>
                    <td width="35%">
                        Verifikasi
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    <tr class="unread">
                        <td data-toggle="modal" data-target="#modal_{{$us->id}}">
                            {{ $us -> fullname }}
                        </td>
                        <td data-toggle="modal" data-target="#modal_{{$us->id}}">
                            {{ $us-> telp }}
                        </td>
                        <td data-toggle="modal" data-target="#modal_{{$us->id}}">
                            @if(isset($us->kota)) {{$us->kota->nama}} @else Belum @endif
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#modal{{$us->id}}">
                                <img width="150px" src="{{ asset('images/ktp/'.$us->foto) }}" alt=""> </a>
                        </td>
                        <td>
                            @if(!$us->verifikasi)
                                <center>
                                    <form action="{{ route('user.verifikasi', ['id' => $us->id]) }}" method="post">
                                        @csrf
                                        
                                        <div class="row" style="margin:0;">
                                            <div class="col-md-8" style="padding:5px;">
                                                <input type="checkbox" id="verifikasi" name="verifikasi" value="1" style="padding:5px;" required>
                                            </div>
                                            <div class="col-md-4" style="padding:5px;">
                                                <button type="submit"  class="btn btn-primary">Verifikasi</button>
                                            </div>
                                        </div>
                                    </form>
                                </center>
                                <div class="row" style="margin:0;">
                                  <form action="{{ route('emailGagal', ['id' => $us->id]) }}" method="get">
                                    <div class="col-md-8" style="padding:5px;">
                                            <select name="konten" id="konten">
                                                @foreach(\App\User::FAILED as $konten)
                                                    <option value="{{ $konten }}">{{ $konten }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-md-4" style="padding:5px;">
                                        <a class="btn btn-success" href="{{ route('emailGagal', ['id'=>$us->id]) }}">Email</a>
                                    </div>
                                    
                                        </form>
                                </div>
                            @else
                               <div class="row" style="margin:0;">
                                    <div class="col-md-8" style="padding:5px;">
                                        Penjahit telah diverifikasi
                                    </div>
                                    <div class="col-md-4" style="padding:5px;">
                                       <a class="btn btn-danger" href="{{ route('cancel.verifikasi', ['id'=>$us->id]) }}">Cancel</a>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                    <div id="modali_{{$us->id}}" class="modal fade" role="dialog" style="overflow:auto;">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    @if(isset($us->provinsi) && isset($us->kota) && isset($us->kecamatan))
                                        {{ $us -> alamat.', '.$us->kecamatan->nama.', '.$us->kota->nama.', '.$us->provinsi->nama.' - '.$us->kodepos}}
                                    @else
                                        {{ $us -> alamat.', '.$us->kodepos}}
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modal{{$us->id}}" class="modal fade" role="dialog" style="overflow:auto;">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                
                                    <h4>Biodata sesuai KTP</h4>
                                    <img width="100%" src="{{ asset('images/ktp/'.$us->foto) }}" alt="">
                                    <div style="padding:0px 15px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="control-group">
                                                <label class="control-label">NIK</label>
                                                <div class="controls">
                                                    {{ $us -> nik }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="control-group">
                                                <label class="control-label">Nama Lengkap</label>
                                                <div class="controls">
                                                    {{ $us -> fullname }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="control-group">
                                                <label class="control-label">Jenis Kelamin</label>
                                                <div class="controls">
                                                    {{ $us->gender }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="control-group">
                                                <label class="control-label">Tempat, Tanggal Lahir</label>
                                                <div class="controls"> 
                                                    {{ $us -> tgl_lahir }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                                <div class="control-group">
                                                <label class="control-label">Alaamat sesuai KTP</label>
                                                <div class="controls"> 
                                                    {{ $us -> alamat }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modal_{{ $us->id }}" class="modal fade" style="z-index:9999;">
                        <div class="modal-dialog">
                            <div class="modal-content modal-lg">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Detail {{ $us->name }}</h4>
                                </div>
                                <!-- body modal -->
                                <div class="modal-body ">
                                    <div class="row" style="padding:0px 25px;">
                                            <div class="col-md-4">
                                                <label>Foto Profil</label>
                                                <img width="200px" src="{{asset('images/user/'.$us->ava)}}" onerror=this.src="{{ asset('images/user/icon.png') }}">
                                                <br>
                                                <label>KTP</label><br>
                                                <img width="200px" src="{{asset('images/ktp/'.$us->foto) }}" onerror=this.src="{{ asset('images/ktp/ktp.png') }}">
                                            </div>
                                            
                                            <div class="col-md-8">
                                                <h4>Data Profil</h4><hr>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="control-group">
                                                            <label class="control-label">NIK</label>
                                                            <div class="controls">
                                                                {{ $us -> nik }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="control-group">
                                                            <label class="control-label">Nama Lengkap</label>
                                                            <div class="controls">
                                                                {{ $us -> fullname }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="control-group">
                                                            <label class="control-label">Jenis Kelamin</label>
                                                            <div class="controls">
                                                                {{ $us->gender }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                         <div class="control-group">
                                                            <label class="control-label">Tempat, Tanggal Lahir</label>
                                                            <div class="controls"> 
                                                                {{ $us -> tgl_lahir }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="control-group">
                                                            <label class="control-label">Email</label>
                                                            <div class="controls">
                                                                {{ $us -> email }}
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="control-group">
                                                            <label class="control-label">No. Handphone</label>
                                                            <div class="controls">
                                                                {{ $us -> telp }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="control-group">
                                                    <label class="control-label">Alamat Domisili</label>
                                                    <div class="controls">
                                                        {{ $us -> domisili }}
                                                    </div>
                                                </div>   
                                                <div class="control-group">
                                                    <label class="control-label">Alamat Sesuai KTP</label>
                                                    <div class="controls">
                                                        {{ $us -> alamat }}
                                                    </div>
                                                </div>                                              
                                                <div class="control-group">
                                                    <label class="control-label">Profesi</label>
                                                    <div class="controls">
                                                        @if(isset($us->profesi))
                                                            @foreach($us->profesi as $po)
                                                                {{ $po->nama.', ' }}
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
                {{ $user->links()}}
        </div>
    </div>
@endsection
