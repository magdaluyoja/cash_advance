@extends('main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Pariculars</div>
                <div class="panel-body">
                    <a href="/particulars/create" class="btn btn-success">Create</a>
                    <ul class="list-group">
                        @foreach($particulars as $particular)
                            <li class="list-group-item"><a href="/particulars/{{$particular->id}}">{{ $particular->particular }} -- {{ $particular->account_code }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection