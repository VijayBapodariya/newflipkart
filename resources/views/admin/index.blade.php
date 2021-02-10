@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Admin Tables</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Admin Tables</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-xl-12">
			<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">View Table</div>
        <div class="ibox-title text-left"><a href="{{url('/dash/create')}}"><button class="btn btn-primary btn-md">Add New Admin</button></a></div>
    </div>
    <div class="ibox-body">
        <div class="ibox-title">Search...</div>
        <form method="get" action="{{url('search_data')}}">
            @csrf
            <div class="d-flex">
                <div class="col-md-8 p-0 pb-2 d-flex">
                    <input type="text" class="form-control mr-2" placeholder="Search for Name" name="name" value="@isset($key){{$key->name}}@endisset">
                    <input type="text" class="form-control mr-2" name="email" placeholder="Search for Email" value="@isset($key){{$key->email}}@endisset">
                    <select class="form-control mr-2" name="state">
                        <option value="">---Select State Wise---</option>
                        <option value="Gujarat" @isset($key) {{($key->state == "Gujarat") ? 'selected' : ''}}@endisset>Gujarat</option>
                        <option value="Maharashtra" @isset($key) {{($key->state == "Maharashtra") ? 'selected' : ''}}@endisset>Maharashtra</option>
                        <option value="Madhaypradesh" @isset($key) {{($key->state == "Madhaypradesh") ? 'selected' : ''}}@endisset>Madhaypradesh</option>
                    </select>
                    <select class="form-control" name="city">
                        <option value="">--Select City Wise</option>
                        <option value="Surat" @isset($key) {{($key->city == "Surat") ? 'selected' : ''}}@endisset>Surat</option>
                        <option value="Ahemadabad" @isset($key) {{($key->city == "Ahemadabad") ? 'selected' : ''}}@endisset>Ahemadabad</option>
                        <option value="Gandhinagar" @isset($key) {{($key->city == "Gandhinagar") ? 'selected' : ''}}@endisset>Gandhinagar</option>
                    </select>
                    <button type="submit" class="btn btn-primary ml-2">search</button>
                </div>
            </div>
        </form>
        <div class="table-responsive" style="overflow: auto;">
            <table class="table">
                <thead class="thead-default">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>Hobby</th>
                        <th>Dob</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Status</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($da as $d)
                    <tr>
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->password}}</td>
                        <td>{{$d->gender}}</td>
                        <td>{{$d->hobby}}</td>
                        <td>{{$d->dob}}</td>
                        <td>{{$d->address}}</td>
                        <td>{{$d->state_name}}</td>
                        <td>{{$d->city_name}}</td>
                        <td>{{$d->status}}</td>
                        <td><img src="{{'storage/'.$d->image}}" width="50px"></td>
                        <td>
                            <a href="{{url('dash/'.$d->id.'/edit')}}"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button></a>
                            <form method="post" action="{{url('dash/'.$d->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-default btn-xs m-r-5" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>

            </table>
        </div>
            <tr>
                {{$da->links()}}
            </tr>
    </div>
			</div>
		</div>
	</div>
</div>
@endsection