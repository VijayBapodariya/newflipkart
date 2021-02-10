<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = State::paginate(4);
        return view('states.index',['da'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('states.create');
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
            'state_name' => 'required'
        ]);

        $obj = new State();
        $obj->state_name = $request->state_name;
        $obj->save();
        return redirect('states/');        
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
        $data = State::findOrfail($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('states.edit',['edata'=>$data]);
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
        $data = State::findOrfail($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        $data->state_name = $request->state_name;
        $data->save();
        return redirect('states/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = State::findOrfail($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        $data->delete();
        return redirect('states/');
    }

    public function search_state(Request $request)
    {
        $name = $request->name;
        // echo $name;
        // die;
        $data = State::where("state_name","LIKE","%".$name."%")
                    ->paginate(2);

        $data->appends(['state_name'=>$request->state_name]);

        return view('states.index',['da'=>$data,'key'=>$request]);
    }
}
