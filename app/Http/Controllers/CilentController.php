<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Product_image;
use Session;
use Cookie;
use Auth;
use App\Cart;
class CilentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Session::forget('laravel_session');
        // if(empty(Auth::guard('customer')->user()->id))
        // {
        //      Cookie::queue(Cookie::forget('laravel_session'));     
        // }
       
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $pdata = Product::all();
        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }
        // echo "<pre>";
        // print_r($cart);
        // die;
        foreach ($pdata as $key => $value) {
            $imgdata = Product_image::where('product_id',$value->product_id)->get();
            $pdata[$key]['product_image'] = $imgdata->toArray();
        }
            // echo "<pre>";
            // print_r($pdata->toArray());
            // die;
        return view('front.home',['cdata'=>$cdata,'sdata'=>$sdata,'pdata'=>$pdata,'cart'=>$cart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
