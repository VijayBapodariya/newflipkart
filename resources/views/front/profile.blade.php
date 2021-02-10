@extends('layouts.fmain')

@section('content')
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Up Comming Product Area -->
            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Change Profile</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Change Password</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="ibox">
                                                    <div class="ibox-body text-center">
                                                        <img class="img-circle" width="250px" style="margin:  15px;" src="{{asset('customer/'.Auth::guard('customer')->user()->image)}}" />
                                                        <h5 class="font-strong m-b-20 m-t-10">{{Auth::guard('customer')->user()->name}}</h5>
                                                        <div class="col-md-offset-3 col-md-6">
                                                            <table class="table table-responsive">
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::guard('customer')->user()->email}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gender</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::guard('customer')->user()->gender}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hobby</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::guard('customer')->user()->hobby}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dob</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::guard('customer')->user()->dob}}</div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><div class="m-b-10 text-muted">{{Auth::guard('customer')->user()->address}}</div></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <form method="post" action="{{url('cust/'.Auth::guard('customer')->user()->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name" value="{{Auth::guard('customer')->user()->name}}" placeholder="Enter Your Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="email" value="{{Auth::guard('customer')->user()->email}}" placeholder="Enter Your Email">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="hidden" name="password" value="{{Auth::guard('customer')->user()->password}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label><br>
                                                <label class="ui-radio ui-radio-inline">
                                                    <input type="radio" name="gender" value="male" {{(Auth::guard('customer')->user()->gender == "male") ? 'checked' : '' }} >
                                                    <span class="input-span"></span>Male
                                                </label>
                                                <label class="ui-radio ui-radio-inline">
                                                    <input type="radio" name="gender" value="female" {{(Auth::guard('customer')->user()->gender == "female") ? 'checked' : '' }}>
                                                    <span class="input-span"></span>Female
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Hobby</label><br>
                                                @php 
                                                    $hob = explode(',',Auth::guard('customer')->user()->hobby);
                                                @endphp
                                                <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="hobby[]" value="reading" {{in_array("reading",$hob) ? 'checked' : ''}}>
                                                    <span class="input-span"></span>Reading
                                                </label>
                                                <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="hobby[]" value="dancing" {{in_array("dancing",$hob)? 'checked' : ''}}>
                                                    <span class="input-span"></span>Dancing
                                                </label>
                                                <label class="ui-checkbox ui-checkbox-inline">
                                                    <input type="checkbox" name="hobby[]" value="travelling"  {{in_array("travelling",$hob) ? 'checked' : ''}}>
                                                    <span class="input-span"></span>Travelling
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>D.o.b</label>
                                                <input class="form-control" type="date" name="dob" value="{{Auth::guard('customer')->user()->dob}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" name="address" placeholder="Enter your Address">{{Auth::guard('customer')->user()->address}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <select class="form-control" name="state" id="state_id">
                                                    <option value="-1">---select state---</option>
                                                    @foreach($sidata as $s)
                                                        <option value="{{$s->state_id}}" {{($s->state_id == Auth::guard('customer')->user()->state) ?'selected' : ''}}>{{$s->state_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control" name="city" id="city_id">
                                                    <option value="-1">-----select city---------</option>
                                                    @foreach($cidata as $c)
                                                        <option value="{{$c->city_id}}" {{($c->city_id == Auth::guard('customer')->user()->city) ?'selected' : ''}}>{{$c->city_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Profile Picture</label><br>
                                                <input class="input-inline" type="file" name="profile[]" value="{{Auth::guard('customer')->user()->image}}">
                                                <img src="{{asset('customer/'.Auth::guard('customer')->user()->image)}}" width="50">
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
                                    <div role="tabpanel" class="tab-pane" id="messages">
                                       <form method="post" action="{{url('ch_password/')}}" enctype="multipart/form-data">
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
                                                <button class="button extra-small mb-20" type="submit">Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>            
            <!-- End Of Up Comming Product Area -->
        </section>
        <!-- End page content -->
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