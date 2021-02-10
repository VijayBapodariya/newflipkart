@extends('layouts.main')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Add City</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Cities</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-xl-12">
			<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">View Table</div>
        <div class="ibox-title text-left"><a href="{{url('/city/create')}}"><button class="btn btn-primary btn-md">Add New City</button></a></div>
    </div>
    <div class="ibox-body">
        <form method="get" action="{{url('search_city')}}">
            @csrf
            <div class="d-flex">
                <div class="col-md-3 p-0 pb-2 d-flex">
                    <input type="text" class="form-control mr-2" placeholder="Search for State Name" name="name" value="@isset($key){{$key->name}}@endisset">
                    <button type="submit" class="btn btn-primary ml-2">search</button>
                </div>
            </div>
        </form>
        <div class="table-responsive" style="overflow: auto;">
            <table class="table">
                <thead class="thead-default">
                    <tr>
                        <th>#</th>
                        <th>State Name</th>
                        <th>City Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cdata as $d)
                    <tr>
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>{{$d->state_name}}</td>
                        <td>{{$d->city_name}}</td>
                        <td>
                            <a href="{{url('city/'.$d->city_id.'/edit')}}"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button></a>
                            <form method="post" action="{{url('city/'.$d->city_id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-default btn-xs m-r-5" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$cdata->links()}}
        </div>
    </div>
			</div>
		</div>
	</div>
</div>
@endsection