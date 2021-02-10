@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Admin Add</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Admin Add</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">

        <!-- error message in errors in any error to display all error display -->
        <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->
        <!-- error end -->

        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form method="post" action="{{url('/dash')}}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter Your Name" value="{{old('name')}}">

                            <!-- error particuler field wise -->
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                        
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email"  placeholder="Enter Your Email" value="{{old('email')}}">

                            <!-- error particuler field wise -->
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Enter Your Password" value="{{old('password')}}">

                            <!-- error particuler field wise -->
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <label class="ui-radio ui-radio-inline">
                                <input type="radio" name="gender" value="male" {{old('gender')=="male" ? 'checked' : ''}}>
                                <span class="input-span" ></span>Male
                            </label>
                            <label class="ui-radio ui-radio-inline">
                                <input type="radio" name="gender" value="female" {{old('gender')=="female" ? 'checked' : ''}}>
                                <span class="input-span"></span>Female
                            </label>

                            <!-- error particuler field wise -->
                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label>Hobby</label><br>
                            <label class="ui-checkbox ui-checkbox-inline">
                                <input type="checkbox" name="hobby[]" value="reading" {{@in_array("reading",old('hobby')) ? 'checked' : ''}}>
                                <span class="input-span"></span>Reading
                            </label>
                            <label class="ui-checkbox ui-checkbox-inline">
                                <input type="checkbox" name="hobby[]" value="dancing" {{@in_array("dancing",old('hobby')) ? 'checked' : ''}}>
                                <span class="input-span"></span>Dancing
                            </label>
                            <label class="ui-checkbox ui-checkbox-inline">
                                <input type="checkbox" name="hobby[]" value="travelling" {{@in_array("travelling",old('hobby')) ? 'checked' : ''}}>
                                <span class="input-span"></span>Travelling
                            </label>

                            <!-- error particuler field wise -->
                            @error('hobby')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label>D.o.b</label>
                            <input class="form-control" type="date" name="dob" value="{{old('dob')}}">

                            <!-- error particuler field wise -->
                            @error('dob')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" placeholder="Enter your Address">{{old('address')}}</textarea>

                            <!-- error particuler field wise -->
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <select class="form-control" name="state" id="state_id">
                                <option value="-1">---select state---</option>
                               @foreach($sdata as $s)
                                <option value="{{$s->state_id}}">{{$s->state_name}}</option>
                               @endforeach
                               
                            </select>

                            <!-- error particuler field wise -->
                            @error('state')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control" name="city" id="city_id">
                                <option value="-1">-----select city---------</option>
                                
                            </select>
                            <!-- error particuler field wise -->
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label><br>
                            <input class="input-inline" type="file" name="profile" value="{{old('profile')}}">

                            <!-- error particuler field wise -->
                            @error('profile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- error end -->
                            
                        </div>
                        <div class="form-group">
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>Remamber me</label>
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
            $('#state_id').change(function(){
                    //alert($(this).val());
                    //alert($('input[name="_token"]').val());
                    var cat_id = $(this).val();
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/get_city')}}",
                        type:'POST',    
                        data:{
                            cat:cat_id,
                            _token:token
                        },
                        success:function(res)
                        {
                            $('#city_id').html(res);
                        }

                    });
            });
        });
    </script>
@endsection