@extends('main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Remarks</div>
                <div class="panel-body">
                    <a href="/remarks/create" class="btn btn-success">Create</a>
                    <ul class="list-group">
                        @foreach($remarks as $remark)
                            <li class="list-group-item"><a href="/remarks/{{$remark->id}}">{{ $remark->remark }} -- {{ $remark->particular->particular }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection