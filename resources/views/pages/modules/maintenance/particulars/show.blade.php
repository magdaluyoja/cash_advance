@extends('main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Particular Details</h1>
            <hr/>
            <a class="btn btn-success" href="/particulars">View All</a>
            <a class="btn btn-primary" href="/particulars/create">Create</a>
            <div class="well">
                <strong>{{ $particular->particular}} </strong> - {{ $particular->account_code }} 
                <a href="/particulars/{{$particular->id}}/edit" class="btn btn-warning">Edit</a>
                <a 
                    href="#"
                    class="btn btn-danger" 
                    onclick="
                        var result = confirm('Are you sure you wish to delete this Particular?');
                        if( result ){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                    "
                >
                    Delete
                </a>

                <form id="delete-form" action="{{ route('particulars.destroy',[$particular->id]) }}" 
                    method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection