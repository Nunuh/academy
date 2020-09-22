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
            <h2>Dokumentasi</h2>
        </div>
        <div class="module-body">
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="25%">
                            Nama
                        </td>
                        <td width="50%">
                            Foto-foto
                        </td>
                        <td width="25%">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Transaction::all() as $trans)
                        <tr class="unread">
                            <td>
                                {{ $trans->user->fullname }}
                            </td>
                            <td>
                                @foreach($trans->user->hasil as $hsl)
                                    <img data-toggle="modal" data-target="#modalp_{{ $hsl->id}}" width="100px" src="{{ asset('images/dokumentasi/'.$hsl->foto) }}">
                                     <div id="modalp_{{ $hsl->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- body modal -->
                                                <div class="modal-body">
                                                    <img src="{{ asset('images/dokumentasi/'.$hsl->foto) }}">
                                                </div>
                                                <!-- footer modal -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    
                            </td>
                            <td> 
                                <div class="row">
                                <div class="col-md-6">
                                @if(!$trans->dokumentasi)
                                    <form action="{{ route('checkDokumen', ['id' => $trans->id ]) }}" method="POST">
                                        @csrf
                                        <input type="checkbox" id="dokumentasi" name="dokumentasi" value="1" required>
                                        <button type="submit" class="btn btn-primary">Verify</button>
                                    </form>
                                    </div>
                                <div class="col-auto">
                                    <a class ="btn btn-sm btn-danger" href="{{route('gagalDok',['id'=>$trans->user->id,'ws'=>$trans->workshop->slug_judul])}}">Gagal </a>
                                @else
                                    <i class="icon-check"></i>
                                @endif
                                </div>
                            </td>
                        </tr>
                       
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
