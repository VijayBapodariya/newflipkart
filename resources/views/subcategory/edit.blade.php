@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Add Sub Category</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Sub Category</li>
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
                    <form method="post" action="{{url('subcategory/'.$edata->sub_id)}}" enctype="multipart/form-data">
                    	@csrf
                        @method('PUT')
                    	 <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control" name="category_id">
                                <option value="-1">-----select sub category---------</option>
                                   @foreach($cdata as $c)
                                    <option value="{{$c->category_id}}" {{($c->category_id == $edata->sub_category_id) ? 'selected' :''}}>{{$c->category_name}}</option>
                                   @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <input class="form-control" type="text" name="subcategory_name" value="{{$edata->sub_category_name}}" placeholder="Enter Your Sub Category Name">
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