@extends('layouts.main')

@section('content')
<!-- START PAGE CONTENT-->

            <div class="page-heading">
                <h1 class="page-title">Profile</h1>
                <ol class="breadcrumb">
                   

                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Profile</li>0





                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="nav nav-tabs tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Change Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Change Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-1">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="ibox">
                                                    <div class="ibox-body text-center">
                                                        <div class="m-t-20">
                                                            <img class="img-circle" src="{{asset('storage/'.Auth::user()->image)}}" />
                                                        </div>
                                                        <h5 class="font-strong m-b-20 m-t-10">{{Auth::user()->name}}</h5>
                                                        <div class="col-md-6" style="margin: 0 auto;">
                                                            <table class="table table-responsive">
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::user()->email}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gender</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::user()->gender}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hobby</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::user()->hobby}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dob</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::user()->dob}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::user()->address}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>State</td>
                                                                    <td><div class="m-b-10 text-muted"></div></td>
                                                                </tr>   
                                                                <tr>
                                                                    <td>City</td>
                                                                    <td><div class="m-b-10 text-muted"> </div></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2">
                                        <form method="post" action="{{url('profileUp/'.Auth::user()->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Enter Your Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}" placeholder="Enter Your Email">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="hidden" name="password" value="{{Auth::user()->password}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label><br>
                                                <label class="ui-radio ui-radio-inline">
                                                    <input type="radio" name="gender" value="male" {{(Auth::user()->gender == "male") ? 'checked' : '' }} >
                                                    <span class="input-span"></span>Male
                                                </label>
                                                <label class="ui-radio ui-radio-inline">
                                                    <input type="radio" name="gender" value="female" {{(Auth::user()->gender == "female") ? 'checked' : '' }}>
                                                    <span class="input-span"></span>Female
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Hobby</label><br>
                                                @php 
                                                    $hob = explode(',',Auth::user()->hobby);
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
                                                <input class="form-control" type="date" name="dob" value="{{Auth::user()->dob}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" name="address" placeholder="Enter your Address">{{Auth::user()->address}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <select class="form-control" name="state" id="state_id">
                                                    <option value="-1">---select state---</option>
                                                    @foreach($sdata as $s)
                                                        <option value="{{$s->state_id}}" {{($s->state_id == Auth::user()->state) ?'selected' : ''}}>{{$s->state_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control" name="city" id="city_id">
                                                    <option value="-1">-----select city---------</option>
                                                    @foreach($cdata as $c)
                                                        <option value="{{$c->city_id}}" {{($c->city_id == Auth::user()->city) ?'selected' : ''}}>{{$c->city_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Profile Picture</label><br>
                                                <input class="input-inline" type="file" name="profile">
                                                <img src="{{asset('storage/'.Auth::user()->image)}}" width="50">
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
                                    <div class="tab-pane fade" id="tab-3">
                                        <form method="post" action="{{url('ch_profile')}}" enctype="multipart/form-data">
                                            @csrf
                                           
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input class="form-control" type="text" name="opass" placeholder="Enter Your old password">

                                                @if (Session::has('msg'))
                                                    <div class="alert alert-danger">             {{Session::get('msg')}}
                                                    </div>           
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input class="form-control" type="text" name="npass" placeholder="Enter Your new password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input class="form-control" type="text" name="cpass" placeholder="Enter Your confirm password">
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
                </div>
                <style>
                    .profile-social a {
                        font-size: 16px;
                        margin: 0 10px;
                        color: #999;
                    }

                    .profile-social a:hover {
                        color: #485b6f;
                    }

                    .profile-stat-count {
                        font-size: 22px
                    }
                </style>
            </div>
            <!-- END PAGE CONTENT-->
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