<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subcategory::select('sub_categories.*','categories.category_name')
                        ->join('categories','categories.category_id','=','sub_categories.category_id')
                        ->paginate(2);

        return view('subcategory.index',['cdata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('subcategory.create',['sdata'=>$data]);
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
            'category_id' => 'required|not_in:-1',
            'subcategory_name' => 'required'
        ]);

        $obj =  new Subcategory();
        $obj->category_id = $request->category_id;
        $obj->sub_category_name = $request->subcategory_name;
        $obj->save();
        return redirect('subcategory/');
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
        $data = Subcategory::findOrfail($id);
        $cdata = Category::all();
        return view('subcategory.edit',['edata'=>$data,'cdata'=>$cdata]);
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

        $obj = Subcategory::findOrfail($id);

        $obj->category_id = $request->category_id;
        $obj->sub_category_name = $request->subcategory_name;
        $obj->save();
        return redirect('subcategory/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subcategory::findOrfail($id);
        $data->delete();
        return redirect('subcategory/');
    }

    public function search_subcategory(Request $request) 
    {
        $data = Subcategory::select('sub_categories.*','categories.category_name')
                    ->join('categories','categories.category_id','=','sub_categories.category_id')
                    ->where("category_name","LIKE","%$request->name%")
                    ->paginate(1);

        $data->appends(['name'=>$request->name]);

        return view('subcategory.index',['cdata'=>$data,'key'=>$request]);
    }
}
