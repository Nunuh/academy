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
            <h2>Kategori</h2>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" action="{{ route('tambahkategori.admin') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="control-group">
                    <label class="control-label" for="basicinput">Tambah Kategori</label>
                    <div class="controls">
                        <input type="text" id="nama" name="nama" class="span4" required>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="25%">
                            Id
                        </td>
                        <td width="50%">
                            Kategori
                        </td>
                        <td width="25%">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(App\Kategori::all() as $kategori)
                        <tr class="unread">
                            <td>
                                {{ $kategori->id }}
                            </td>
                            <td>
                                {{ $kategori->nama }}
                            </td>
                            <td>
                                <a  href="{{ route('hapuskategori.admin', ['id' => ($kategori->id)]) }}" class="btn btn-primary">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection