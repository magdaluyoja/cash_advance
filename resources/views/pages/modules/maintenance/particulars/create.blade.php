@extends('main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Create Particular</h1>
            <hr/>
            <form action="{{ route('particulars.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="particular" class="form-label">Particular</label>
                    <input type="text" name="particular" id="particular" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="account_code" class="form-label">Account Code</label>
                    <input type="text" name="account_code" id="account_code" class="form-control">
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
            </form> 
        </div>
    </div>
@endsection