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
                    <form method="post" action="{{url('/product')}}" enctype="multipart/form-data">
                    	@csrf
                    	<div class="form-group">
                            <label>User</label>
                            <select class="form-control" name="product_user_id">
                                <option value="-1">-----Select User---------</option>
                               @foreach($udata as $u)
                                <option value="{{$u->id}}">{{$u->name}}</option>
                               @endforeach
                            </select>    

                            <!-- error particuler field wise -->
                            @error('product_user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

                        </div>

                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control" name="product_category_id" id="product_category_id">
                                <option value="-1">-----Select Category---------</option>
                               @foreach($cdata as $c)
                                <option value="{{$c->category_id}}">{{$c->category_name}}</option>
                               @endforeach
                            </select>    

                            <!-- error particuler field wise -->
                            @error('product_category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

                        </div>

                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <select class="form-control" name="product_sub_category_id" id="product_sub_category_id">
                                <option value="-1">-----Select Sub Category---------</option>

                            </select>       

                            <!-- error particuler field wise -->
                            @error('product_sub_category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
 
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
                            @foreach($vdata as $k => $v)
                               <tr>
                                   <td>{{$k}}</td>
                                   <td>
                                       @foreach($v as $data)
                                        <label class="ui-checkbox">
                                            <input type="checkbox" name="v_id[]" value="{{$data['variation_id']}}">
                                            <span class="input-span"></span>
                                            {{$data['variation_name']}}
                                        </label>
                                       @endforeach
                                   </td>
                               </tr>
                            @endforeach
                           </table>       

                            <!-- error particuler field wise -->
                            @error('v_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
 
                        </div>

                        <div class="form-group">
                            <label>Product Name</label>
                            <input class="form-control" type="text" name="product_name" placeholder="Enter Your Product Name">    

                            <!-- error particuler field wise -->
                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input class="form-control" type="text" name="product_price" placeholder="Enter Your Product Price">    

                            <!-- error particuler field wise -->
                            @error('product_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

                        </div>

                        <div class="form-group">
                            <label>Product Qty</label>
                            <input class="form-control" type="text" name="product_qty" placeholder="Enter Your Product Qty">    

                            <!-- error particuler field wise -->
                            @error('product_qty')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" name="product_description" placeholder="Enter your Product Description"></textarea>    

                            <!-- error particuler field wise -->
                            @error('product_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

                        </div>
                         <div class="form-group">
                            <label>Profile Images</label>
                           <input class="form-control" type="file" name="profile[]" multiple>    

                            <!-- error particuler field wise -->
                            @error('profile')
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