<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $cdata = City::where('state_id',8)->orderby('city_name','asc')->take(2)->get()->count();

        // echo "<pre>";
        // print_r($cdata);
        // die;

        $data = City::select('cities.*','states.state_name')
                    ->join('states','states.state_id','=','cities.state_id')
                    ->paginate(2);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('city.index',['cdata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sdata = State::all();
        // echo "<pre>";
        // print_r($sdata->toArray());
        // die;
        return view('city.create',['sdata'=>$sdata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;

        $validatedData = $request->validate([
            'state_id' => 'required|not_in:-1',
            'city_name' => 'required'
        ]);

        $obj = new City();
        $obj->state_id = $request->state_id;
        $obj->city_name = $request->city_name;
        $obj->save();
        return redirect('city/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        // die;
        $data = City::findOrfail($id);
        $sdata = State::all();
        // echo "<pre>";
        // print_r($data->toArray());
        // print_r($sdata->toArray());
        // die;
        return view('city.edit',['edata'=>$data,'sdata'=>$sdata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = City::findOrfail($id);   
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $data->state_id = $request->state_id;
        $data->city_name = $request->city_name;
        $data->save();
        return redirect('/city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo $id;
        // die;
        $data = City::findOrfail($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die; 
        $data->delete();
        return redirect('/city');   
    }

    public function search_city(Request $request)
    {
        $name = $request->name;
        // echo $name;
        // die;
        $data = City::select('cities.*','states.state_name')
                    ->join('states','states.state_id','=','cities.state_id')
                    ->where("state_name","LIKE","%".$name."%")
                    ->paginate(2);
        $data->appends(['name'=>$name]);
        return view('city.index',['cdata'=>$data,'key'=>$request]);
    }
}
