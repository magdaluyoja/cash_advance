@extends('main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Create Remark</h1>
            <hr/>
            <form action="{{ route('remarks.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="remark" class="form-label">Remark</label>
                    <input type="text" name="remark" id="remark" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="particular" class="form-label">Paricular</label>
                    <select id="particular" name="particular" class="form-control">
                        <option value="">--Please Select--</option>
                        @foreach($particulars as $particular)
                            <option value="{{$particular->id}}">{{$particular->particular}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
            </form> 
        </div>
    </div>
@endsection