@extends('main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Edit Particular</h1>
            <hr/>
            <form action="{{ route('particulars.update', $particular->id) }}" method="POST">

                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="particular" class="form-label">Particular</label>
                    <input type="text" name="particular" id="particular" class="form-control" value="{{$particular->particular}}">
                </div>
                
                <div class="form-group">
                    <label for="account_code" class="form-label">Account Code</label>
                    <input type="text" name="account_code" id="account_code" class="form-control" value="{{$particular->account_code}}">
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
            </form> 
        </div>
    </div>
@endsection