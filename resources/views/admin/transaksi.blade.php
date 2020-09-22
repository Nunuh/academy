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
            <h2>Transaksi Kelas</h2>
        </div>
        <div class="module-body">
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="20%">
                            Kode
                        </td>
                        <td width="20%">
                            Nama User
                        </td>
                        <td width="20%">
                            Kelas
                        </td>
                        <td width="20%">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($works as $trans)
                        <tr class="unread">
                            <td>
                                {{ $trans->kode }}
                            </td>
                            <td>
                                <a data-toggle="modal"
                                   data-target="#modalus_{{ $trans->id }}">{{ $trans->user->name }}</a>
                            </td>
                            <td>

                            </td>
                            <td>
                                @if(!$trans->keterangan)
                                    <form action="{{ route('lunas.admin', ['id' => $trans->id]) }}" method="post">
                                        @csrf
                                        <input type="checkbox" name="keterangan" value="1" required>&nbsp;
                                        &nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary">Lunasi</button>
                                    </form>
                                @else
                                    <h5>sudah lunas</h5>
                                @endif
                            </td>
                        </tr>
                        <div id="modalus_{{$trans->id}}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <h5 class="modal-title">Detail Penjahit</h5>
                                        <ul>
                                            <li>
                                                {{$trans->user->fullname}}
                                            </li>
                                            <li>
                                                {{$trans->user->telp}}
                                            </li>
                                            <li>
                                                {{$trans->user->email}}
                                            </li>
                                            <li>
                                                Kelas yang telah diikuti :
                                                @foreach($trans->user() as $kurs)
                                                    <ul>
                                                        <li>
                                                            {{$kurs->course->judul}}
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- footer modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $kurs -> appends(['kurs' => $kurs -> currentPage()]) ->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="module message">
        <div class="module-head">
            <h2>Transaksi Workshop</h2>
        </div>
        <div class="module-body">
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="15%">
                            Tanggal
                        </td>
                        <td width="10%">
                            Kode
                        </td>
                        <td width="20%">
                            Nama User
                        </td>
                        <td width="20%">
                            Workshop
                        </td>
                        <td width="15%">
                            Total
                        </td>
                        <td width="20%">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kurs as $trans)
                        <tr class="unread">
                            <td>
                                {{ \Carbon\Carbon::parse($trans->created_at)->format('d/M - H:i') }}
                            </td>
                            <td>
                                {{ $trans->kode }}
                            </td>
                            <td>
                                <a data-toggle="modal"
                                   data-target="#modalis_{{ $trans->id }}">{{ $trans->user->fullname }}</a>
                            </td>
                            <td>
                                {{ $trans->workshop->judul }}
                            </td>
                            <td>
                                {{ $trans->total }}
                            </td>
                            <td>
                                @if(!$trans->keterangan)
                                    <form action="{{ route('lunas.admin', ['id' => $trans->id]) }}" method="post">
                                        @csrf
                                        <input type="checkbox" name="keterangan" value="1" required>&nbsp;
                                        &nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary">Lunasi</button>
                                    </form>
                                @else
                                    <h5>sudah lunas</h5>
                                @endif
                            </td>
                        </tr>
                        <div id="modalis_{{$trans->id}}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <h5 class="modal-title">Detail Penjahit</h5>
                                        <ul>
                                            <li>
                                                {{$trans->user->fullname}}
                                            </li>
                                            <li>
                                                {{$trans->user->telp}}
                                            </li>
                                            <li>
                                                {{$trans->user->email}}
                                            </li>
                                            <li>
                                                Workshop yang pernah diikuti :
                                                @foreach($trans->user->workshop as $wss)
                                                    <ul>
                                                        <li>
                                                            {{$wss->judul}} - {{ \Carbon\Carbon::parse($wss->updated_at)->format('d/M/Y') }}
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- footer modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $works -> appends(['works' => $works -> currentPage()]) ->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
