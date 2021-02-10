@extends('layouts.main')

@section('content')
<div class="page-heading">
    <h1 class="page-title">Add Variation Type</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Variation Type</li>
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
                    <form method="post" action="{{url('/variationtype')}}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label>Variation Type Name</label>
                            <input class="form-control" type="text" name="variation_type_name" placeholder="Enter Your Variation Type Name" value="{{old('variation_type_name')}}">

                            <!-- error particuler field wise -->
                            @error('variation_type_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

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