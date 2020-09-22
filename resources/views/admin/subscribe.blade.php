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
            <h2>Subscriber</h2>
        </div>
        <div class="module-body">
            <a class="btn btn-success" target="_blank" href="{{ route('export.subscriber') }}">EXPORT</a>
            <br><br>
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="10%">
                            Nomor
                        </td>
                        <td width="90%">
                            Email
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach(App\Subscribe::orderBy('created_at', 'ASC')->get() as $subs)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>
                                {{ $subs->email }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection