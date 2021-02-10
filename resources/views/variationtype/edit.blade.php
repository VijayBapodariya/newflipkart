@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Add variation_types</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">variation_type</li>
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
                    <form method="post" action="{{url('variation_type/'.$edata->variation_type_id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>variation_type Name</label>
                            <input class="form-control" type="text" name="variation_type_name" placeholder="Enter Your variation_type Name" value="{{$edata->variation_type_name}}">
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