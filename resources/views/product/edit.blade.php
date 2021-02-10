@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Add Product</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Product</li>
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
                    <form method="post" action="{{url('product/'.$pdata->product_id)}}" enctype="multipart/form-data">
                    	@csrf
                    	@method('PUT')
                    	<div class="form-group">
                            <label>User</label>
                            <select class="form-control" name="product_user_id">
                                <option value="-1">-----Select User---------</option>
                               @foreach($udata as $u)
                                <option value="{{$u->id}}" {{($u->id == $pdata->product_user_id) ? 'selected' : ''}}>{{$u->name}}</option>
                               @endforeach
                            </select>    
                        </div>

                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control" name="product_category_id" id="product_category_id">
                                <option value="-1">-----Select Category---------</option>
                               @foreach($cdata as $c)
                                <option value="{{$c->category_id}}" {{($c->category_id == $pdata->product_category_id) ? 'selected' : ''}}>{{$c->category_name}}</option>
                               @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <select class="form-control" name="product_sub_category_id" id="product_sub_category_id">
                            	@foreach($sdata as $s)
                            		<option value="{{$s->sub_id}}" {{($s->sub_category_id == $pdata->product_sub_category_id) ? 'selected' : ''}}>{{$s->sub_category_name}}</option>
                               	@endforeach
                            </select>        
                        </div>

                        <div class="form-group table-responsive">
                            <label>Variation Name</label>
                            <table class="table table-bordered">
                                <thead class="thead-default">
                                    <tr>
                                        <th>Variation Type</th>
                                        <th>Variation</th>
                                    </tr>
                                </thead>
                                @php 
                                	$var  = explode(',',$pdata->product_variation_id);
                                @endphp
                            @foreach($vdata as $k => $v)
                               <tr>
                                   <td>{{$k}}</td>
                                   <td>
                                       @foreach($v as $data)
                                        <label class="ui-checkbox">
                                            <input type="checkbox" name="v_id[]" value="{{$data['variation_id']}}" {{in_array($data['variation_id'],$var) ? 'checked' : ''}}>
                                            <span class="input-span"></span>
                                            {{$data['variation_name']}}
                                        </label>
                                       @endforeach
                                   </td>
                               </tr>
                            @endforeach
                           </table>      
                        </div>

                        <div class="form-group">
                            <label>Product Name</label>
                            <input class="form-control" type="text" name="product_name" placeholder="Enter Your Product Name" value="{{$pdata->product_name}}">    
                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input class="form-control" type="text" name="product_price" placeholder="Enter Your Product Price" value="{{$pdata->product_price}}">    
                        </div>

                        <div class="form-group">
                            <label>Product Qty</label>
                            <input class="form-control" type="text" name="product_qty" placeholder="Enter Your Product Qty" value="{{$pdata->product_qty}}">    
                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" name="product_description" placeholder="Enter your Product Description">{{$pdata->product_description}}</textarea>    
                        </div>
                         <div class="form-group">
                            <label>Profile Images</label>
                           <input class="form-control" type="file" name="profile[]" multiple>
                           @foreach($pdata->product_image as $p)
                           		<img src="{{asset('product_image/'.$p['product_image_name'])}}" width="100px">

                                <input type="checkbox" name="img_all[]" value="{{$p['product_image_id']}}">

                                
                           @endforeach 
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

@section('custom_js')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#product_category_id').change(function(){
                // alert($(this).val());
                // alert($('input[name="_token"]').val());
                var cat_id = $(this).val();
                var token = $('input[name="_token"]').val();
                $.ajax({
                        url:"{{url('/get_category')}}",
                        type:'POST',
                        data:{
                            cate:cat_id,
                            _token:token
                        },
                        success:function(res)
                        {
                            $('#product_sub_category_id').html(res);
                        }

                });
            });
        });
    </script>

@endsection