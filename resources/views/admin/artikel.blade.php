@extends('admin_layout')

@section('content')

    {{--<div class="module">--}}
        {{--<div class="module-head">--}}
            {{--<h2>Artikel</h2>--}}
        {{--</div>--}}
        {{--<div class="module-body">--}}
            {{--<form class="form-horizontal row-fluid" action="{{ route('tambahartikel.admin') }}" method="post" enctype="multipart/form-data">--}}
                {{--@csrf--}}
                {{--<div class="control-group">--}}
                    {{--<label class="control-label" for="basicinput">Pilih Gambar</label>--}}
                    {{--<div class="controls">--}}
                        {{--<input type="file" name="inputgambar" >--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="control-group">--}}
                    {{--<label class="control-label" for="basicinput">Judul</label>--}}
                    {{--<div class="controls">--}}
                        {{--<input type="text" id="judul" name="judul" placeholder="Judul Artikel" class="span8" required>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="control-group">--}}
                    {{--<label class="control-label" for="basicinput">Kategori</label>--}}
                    {{--<div class="controls">--}}
                        {{--<input type="text" id="kategori" name="kategori" placeholder="Kategori" class="span8" required>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="control-group">--}}
                    {{--<label class="control-label" for="basicinput">Deskripsi</label>--}}
                    {{--<div class="controls">--}}
                        {{--<textarea class="form-control" id="konten" name="isi"></textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="control-group">--}}
                    {{--<div class="controls">--}}
                        {{--<button type="submit" class="btn btn-primary">Tambah</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}

            {{--<br>--}}
            {{--<div class="row" >--}}
                {{--@foreach(\App\Artikel::all() as $artikel)--}}
                    {{--<div class="col-sm-4 md-margin-b-50">--}}
                        {{--<div class="margin-b-20">--}}
                                {{--<div class="card" style="width: 18rem;">--}}
                                    {{--<img class="card-img-top" src="{{ asset('images/artikel/'.$artikel->gambar) }}" alt="Card image cap">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h2 class="card-title">{{ $artikel->judul }}</h2>--}}
                                        {{--<h5 class="card-header">{{ $artikel->kategori }}</h5>--}}
                                        {{--<p class="card-text">{{ $artikel->isi }}</p>--}}
                                        {{--<a class="btn" data-toggle="modal" data-target="#myModal">Edit</a>--}}
                                        {{--<a  href="{{ route('hapusartikel.admin', ['id' => ($artikel->id)]) }}" class="btn btn-danger">Hapus</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="myModal" class="modal fade" role="dialog" href="{{ route('editartikel.admin', ['id' => ($artikel->id)]) }}">--}}
                        {{--<div class="modal-dialog">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                    {{--<h4 class="modal-title">Edit Artikel {{ $artikel->judul }}</h4>--}}
                                {{--</div>--}}
                                {{--<!-- body modal -->--}}
                                {{--<div class="modal-body">--}}
                                    {{--<form action="{{ route('editartikel.admin', ['id' => ($artikel->id)]) }}" method="post" enctype="multipart/form-data">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<div class="control-group">--}}
                                            {{--<label class="control-label" for="basicinput">Pilih Gambar</label>--}}
                                            {{--<div class="controls">--}}
                                                {{--<input type="file" name="inputgambar">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="control-group">--}}
                                            {{--<label class="control-label" for="basicinput">Judul</label>--}}
                                            {{--<div class="controls">--}}
                                                {{--<input type="text" id="judul" name="judul" value="{{ $artikel->judul }}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="control-group">--}}
                                            {{--<label class="control-label" for="basicinput">Kategori</label>--}}
                                            {{--<div class="controls">--}}
                                                {{--<input type="text" id="kategori" name="kategori" class="span4" value="{{ $artikel->kategori }}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="control-group">--}}
                                            {{--<label class="control-label" for="basicinput">Deskripsi</label>--}}
                                            {{--<div class="controls">--}}
                                                {{--<textarea class="form-control" id="konten" name="isi"> {{ $artikel->isi }}</textarea>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="control-group">--}}
                                            {{--<div class="controls">--}}
                                                {{--<button type="submit" class="btn btn-primary">Simpan</button>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                                {{--<!-- footer modal -->--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection