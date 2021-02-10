@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Add Variation</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Variation</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">From</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div> 
                <div class="ibox-body">
                    <form method="post" action="{{url('variation/'.$data->variation_id)}}" enctype="multipart/form-data">
                    	@csrf
                        @method('PUT')
                    	 <div class="form-group">
                            <label>Variation Type Name</label>
                            <select class="form-control" name="variation_type_id">
                                <option value="-1">-----Select Variation Type---------</option>
                                   @foreach($vdata as $v)
                                    <option value="{{$v->variation_type_id}}" {{($v->variation_type_id == $data->variation_type_id) ? 'selected' :''}}>{{$v->variation_type_name}}</option>
                                   @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Variation Name</label>
                            <input class="form-control" type="text" name="variation_name" value="{{$data->variation_name}}" placeholder="Enter Your Variation Name">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection