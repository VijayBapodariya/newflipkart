@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Add Category</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Category</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form method="post" action="{{url('/category')}}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category_name" placeholder="Enter Your Category Name" value="{{old('category_name')}}">

                            <!-- error particuler field wise -->
                            @error('category_name')
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