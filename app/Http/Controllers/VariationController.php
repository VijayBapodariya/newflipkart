<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variation;
use App\Variationtype;


class VariationController extends Controller
{
    /**
     * Display a listing of the resource.

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
    $data = Variation::select('variations.*','variation_types.variation_type_name')
        ->join('variation_types','variation_types.variation_type_id','=','variations.variation_type_id')
        ->paginate(2);
        // echo "<pre>";
        // print_r($data->toArray());
        // die; 
        return view('variation.index',['cdata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Variationtype::all();
        return view('variation.create',['sdata'=>$data]);
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
            'variation_type_id' => 'required|not_in:-1',
            'variation_name' => 'required'
        ]);

        $obj = new Variation();
        $obj->variation_type_id = $request->variation_type_id;
        $obj->variation_name = $request->variation_name;
        $obj->save();
        return redirect('variation/');
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
        $data = Variation::findOrfail($id);
        $vdata = Variationtype::all();
        return view('variation.edit',['data'=>$data,'vdata'=>$vdata]);
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
        // echo $id;
        // print_r($request->toArray());
        // die;
        $data = Variation::findOrfail($id);
        $data->variation_type_id = $request->variation_type_id;
        $data->variation_name = $request->variation_name;
        $data->save();
        return redirect('variation/');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Variation::findOrfail($id);
        $data->delete();
        return redirect('variation/');
    }

    public function search_variation(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;

        $data = Variation::select('variations.*','variation_types.variation_type_name')
                ->join('variation_types','variation_types.variation_type_id','=','variations.variation_type_id')
                ->where("variation_type_name","LIKE","%$request->name%")
                ->paginate(2);

        $data->appends(['name'=>$request->name]);

        return view('variation.index',['cdata'=>$data,'key'=>$request]);
    }
}
