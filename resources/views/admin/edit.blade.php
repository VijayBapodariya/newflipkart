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
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form method="post" action="{{url('dash/'.$edata->id)}}" enctype="multipart/form-data">
                    	@csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{$edata->name}}" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" value="{{$edata->email}}" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" value="{{$edata->password}}" placeholder="Enter Your Password">
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <label class="ui-radio ui-radio-inline">
                                <input type="radio" name="gender" value="male" {{($edata->gender == "male") ? 'checked' : '' }} >
                                <span class="input-span"></span>Male
                            </label>
                            <label class="ui-radio ui-radio-inline">
                                <input type="radio" name="gender" value="female" {{($edata->gender == "female") ? 'checked' : '' }}>
                                <span class="input-span"></span>Female
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Hobby</label><br>
                            @php 
                                $hob = explode(',',$edata->hobby);
                            @endphp
                            <label class="ui-checkbox ui-checkbox-inline">
                                <input type="checkbox" name="hobby[]" value="reading" {{in_array("reading",$hob) ? 'checked' : ''}}>
                                <span class="input-span"></span>Reading
                            </label>
                            <label class="ui-checkbox ui-checkbox-inline">
                                <input type="checkbox" name="hobby[]" value="dancing" {{in_array("dancing",$hob) ? 'checked' : ''}}>
                                <span class="input-span"></span>Dancing
                            </label>
                            <label class="ui-checkbox ui-checkbox-inline">
                                <input type="checkbox" name="hobby[]" value="travelling"  {{in_array("travelling",$hob) ? 'checked' : ''}}>
                                <span class="input-span"></span>Travelling
                            </label>
                        </div>
                        <div class="form-group">
                            <label>D.o.b</label>
                            <input class="form-control" type="date" name="dob" value="{{$edata->dob}}">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" placeholder="Enter your Address">{{$edata->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <select class="form-control" name="state" id="state_id">
                                <option value="-1">---select state---</option>
                                @foreach($sdata as $s)
                                    <option value="{{$s->state_id}}" {{($s->state_id == $edata->state) ?'selected' : ''}}>{{$s->state_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control" name="city" id="city_id">
                                <option value="-1">-----select city---------</option>
                                @foreach($cdata as $c)
                                    <option value="{{$c->city_id}}" {{($c->city_id == $edata->city) ?'selected' : ''}}>{{$c->city_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label><br>
                            <input class="input-inline" type="file" name="profile" value="{{$edata->profile}}">
                            <img src="{{asset('storage/'.$edata->image)}}" width="50">
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