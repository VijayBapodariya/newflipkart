<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;
use App\Subcategory;   
use App\Variation;   
use App\Product_image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::select('products.*','users.name','categories.category_name','sub_categories.sub_category_name','variations.variation_name')
                        ->join('users','users.id','=','products.product_user_id')
                        ->join('categories','categories.category_id','=','products.product_category_id')
                        ->join('sub_categories','sub_categories.sub_id','=','products.product_sub_category_id')
                        ->join('variations','variations.variation_id','=','products.product_variation_id')
                        ->paginate(2);

        foreach ($data as $key => $value) {
            $imgdata = Product_image::where('product_id',$value->product_id)->get();
            // echo "<pre>";
            // print_r($imgdata->toArray());
            // die;
            $data[$key]['product_image'] = $imgdata->toArray();    
        }

        // echo "<pre>";
        // print_r($data->toArray());
        // die;

        return view('product.index',['cdata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $udata = User::all();
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $vdata = Variation::select('variations.*','variation_types.variation_type_name')
                            ->join('variation_types','variation_types.variation_type_id','=','variations.variation_type_id')
                            ->get();
        // echo "<pre>";
        // print_r($vdata->toArray());
        // die;
        $variationDetails = array();

        foreach ($vdata as $key => $value) {
            $variationDetails[$value->variation_type_name][] = $value->toArray();
        }
        //  echo "<pre>";
        // print_r($variationDetails);
        // die;
        return view('product.create',['udata'=>$udata,'cdata'=>$cdata,'sdata'=>$sdata,'vdata'=>$variationDetails]);
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
            'product_user_id' => 'required|not_in:-1',
            'product_category_id' => 'required|not_in:-1',
            'product_sub_category_id' => 'required|not_in:-1',
            'v_id' => 'required|not_in:-1',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_qty' => 'required',
            'product_description' => 'required'
        ]);

        $data = new Product();
        $data->product_user_id = $request->product_user_id;
        $data->product_category_id = $request->product_category_id;
        $data->product_sub_category_id = $request->product_sub_category_id;
        $data->product_variation_id = implode(',', $request->v_id);
        $data->product_name = $request->product_name;
        $data->product_price = $request->product_price;
        $data->product_qty = $request->product_qty;
        $data->product_description = $request->product_description;
        $data->save();

        if($request->hasFile('profile'))
        {
            foreach ($request->profile as $key => $value) {
                    $img = time()."_".$value->getClientOriginalName();
                    $value->move(public_path('product_image'),$img);
                    $pobj = new  Product_image();
                    $pobj->product_id = $data->product_id;
                    $pobj->product_image_name = $img;
                    $pobj->save();
            }
        }
        return redirect('product/');
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
        $data = Product::findOrFail($id);
        $udata = User::all();
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $vdata = Variation::select('variations.*','variation_types.variation_type_name')
                            ->join('variation_types','variation_types.variation_type_id','=','variations.variation_type_id')
                            ->get();

        $variationDetails = array();

        foreach ($vdata as $key => $value) {
            $variationDetails[$value->variation_type_name][] = $value->toArray();
        }

        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        $imgdata = Product_image::where('product_id',$id)->get();
        // echo "<pre>";
        // print_r($imgdata->toArray());
        // die;
        $data['product_image'] = $imgdata->toArray();  
        //  echo "<pre>";
        // print_r($data->toArray());
        // die;  

        return view('product.edit',['pdata'=>$data,'udata'=>$udata,'cdata'=>$cdata,'sdata'=>$sdata,'vdata'=>$variationDetails]);
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
        // print_r($request->toArray());
        

        $pdata = Product::find($id);
          $pdata->product_user_id = $request->product_user_id;
        $pdata->product_category_id = $request->product_category_id;
        $pdata->product_sub_category_id = $request->product_sub_category_id;
        $pdata->product_variation_id = implode(',', $request->v_id);
        $pdata->product_name = $request->product_name;
        $pdata->product_price = $request->product_price;
        $pdata->product_qty = $request->product_qty;
        $pdata->product_description = $request->product_description;
        $pdata->save();

        if($request->hasFile('profile'))
        {
            foreach ($request->profile as $key => $value) {
                    $img = time()."_".$value->getClientOriginalName();
                    $value->move(public_path('product_image'),$img);
                    $pobj = new  Product_image();
                    $pobj->product_id = $pdata->product_id;
                    $pobj->product_image_name = $img;
                    $pobj->save();
            }
        }
        // print_r($pdata->toArray());
        // die;

        if(!empty($request->img_all))
        {
                foreach ($request->img_all as $key => $value) {
                    $odata = Product_image::find($value);
                    unlink(public_path('product_image/'.$odata->product_image_name));
                    $odata->delete();
                }
        }

        return redirect('/product');


    }

    /*
     *                                  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo $id;
        // die;
        $data = Product::findOrFail($id);
        // $pdata =
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        $img = Product_image::where('product_id',$id)->get();
        foreach($img as $value) {
            unlink(public_path('product_image/'.$value->product_image_name));
        }
        $data->delete();
        return redirect('product/');
    }

    public function search_product(Request $request)
    {
        $name = $request->name;
        // echo $name;
        // die();

        $data = Product::select('products.*','users.name','categories.category_name','sub_categories.sub_category_name','variations.variation_name')
                        ->join('users','users.id','=','products.product_user_id')
                        ->join('categories','categories.category_id','=','products.product_category_id')
                        ->join('sub_categories','sub_categories.sub_id','=','products.product_sub_category_id')
                        ->join('variations','variations.variation_id','=','products.product_variation_id')
                        ->where("product_name","LIKE","%".$name."%")
                        ->paginate(2);

        foreach ($data as $key => $value) {
            $imgdata = Product_image::where('product_id',$value->product_id)->get();
            // echo "<pre>";
            // print_r($imgdata->toArray());
            // die;
            $data[$key]['product_image'] = $imgdata->toArray();    
        }

        $data->appends(['name' => $name,'email'=>$request->email]);

        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('product.index',['cdata'=>$data,'key'=>$request]);
    }

    public function getcategory_data(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $category_id = $request->cate;

        $all = Subcategory::where('category_id',$category_id)->get();
        // print_r($all->toArray());
        // die;
        echo "<option>---------select sub category---------</option>";

        foreach ($all as $key => $value) {
           echo "<option value='".$value['sub_id']."'>".$value['sub_category_name']."</option>";
        }
    }
}
