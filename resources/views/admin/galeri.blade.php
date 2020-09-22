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
            <h2>Galeri</h2>
        </div>
        
        <div class="container" style="width:100%;">
            <form class="form-horizontal row-fluid" action="{{ route('tambah.galeri') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="basicinput">Photo</label>
                    <div class="controls">
                        <input type="file" name="poto" accept="image/*" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <div class="row">
                @foreach(\App\Galeri::all() as $galer)
                    <div class="col-md-3" style="padding:10px;">
                        <img src="{{asset('images/galeri/'. $galer->poto )}}"  style="object-fit: cover; max-height:125px; width:100%;">
                            <a style="position:absolute; right:15px; bottom:15px;" href="{{ route('hapus.galeri', ['id'=>$galer->id]) }}"><button class="btn btn-xs btn-success">Hapus</button></a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection