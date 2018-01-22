@extends('main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Edit Remark</h1>
            <hr/>
            <form action="{{ route('remarks.update', $remark->id) }}" method="POST">

                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="remark" class="form-label">Remark</label>
                    <input type="text" name="remark" id="remark" class="form-control" value="{{$remark->remark}}">
                </div>
                
                <div class="form-group">
                    <label for="particular" class="form-label">Paricular</label>
                    <select id="particular" name="particular" class="form-control">
                        <option value="">--Please Select--</option>
                        @foreach($particulars as $particular)
                            @if($particular->id == $remark->particular_id)
                                <option value="{{$particular->id}}" selected>{{$particular->particular}}</option>
                            @else
                                <option value="{{$particular->id}}">{{$particular->particular}}</option>    
                            @endif
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