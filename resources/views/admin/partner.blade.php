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
            <h2>Partner</h2>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" action="{{ route('tambahpartner.admin') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="basicinput">Pilih Gambar</label>
                    <div class="controls">
                        <input type="file" name="image" accept="image/*" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Link Partner</label>
                    <div class="controls">
                        <input type="text" id="url" name="url" placeholder="URL" class="span8" required>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
<BR>
    <div class="module-body table">
            <table class="table table-message">
                <thead>
                <tr class="heading">
                    <td width="50%">
                        Logo
                    </td>
                    <td width="30%">
                        Link
                    </td>
                    <td width="20%">
                    </td>
                </tr>
                </thead>
                <tbody>
        @foreach(\App\Partner::all() as $partner)
                    <tr class="unread">
                        <td>
                            <img class="card-img-top" style="width:150px;" src="{{ asset('images/partner/'.$partner->image) }}" alt="Card image cap">
                        </td>
                        <td>
                           <a href="{{ $partner->url }}">{{ $partner->url }}</a>
                        </td>
                        <td>
                            <a  href="{{ route('hapuspartner.admin', ['id' => ($partner->id)]) }}" class="btn btn-primary">Hapus</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection