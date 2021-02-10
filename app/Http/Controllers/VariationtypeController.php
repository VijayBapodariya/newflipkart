<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variationtype;

class VariationtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Variationtype::paginate(2);
        return view('variationtype.index',['da'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('variationtype.create');
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
            'variation_type_name' => 'required'
        ]);

        $obj = new Variationtype();
        $obj->variation_type_name = $request->variation_type_name;
        $obj->save();
        return redirect('variationtype/');
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
        $data = Variationtype::findOrfail($id);
        return view('variationtype.edit',['edata'=>$data]);
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
        // echo "<pre>";
        // echo $id;
        // print_r($request->toArray());
        // die;
        $data = Variationtype::findOrfail($id);

        $data->variation_type_name = $request->variation_type_name;
        $data->save();
        return redirect('variationtype/');
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
        $data = Variationtype::findOrfail($id);
        $data->delete();
        return redirect('variationtype/');
    }

    public function search_variationtype(Request $request)
    {
        $name = $request->name;
        // die;

        $data = Variationtype::where("variation_type_name","LIKE","%".$name."%")
                            ->paginate(1);

        $data->appends(['name'=>$name]);

        return view('variationtype.index',['da'=>$data,'key'=>$request]);
    }
}
