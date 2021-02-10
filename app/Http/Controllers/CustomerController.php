<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Auth;
use App\Category;
use App\Subcategory;
use App\City; 
use App\Customer;
use App\State;
use App\Variation;
use App\Cart;
use App\Product;
use Hash;
use Session;
use App\Product_image;
use Stripe;
use DB;
use PDF;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Order_details;
use Cookie;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsess
     */
    public function index()
    {
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $ci = City::all();
        $sa = State::all();
        // echo "<pre>";
        // print_r($s->toArray());
        // die;
        return view('front.register',['cdata'=>$cdata,'sdata'=>$sdata,'ci'=>$ci,'sa'=>$sa]);
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
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $obj = new Customer();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->gender = $request->gender;
        $obj->hobby = implode(',',$request->hobby);
        $obj->dob = $request->dob;
        $obj->address = $request->address;
        $obj->state = $request->state;
        $obj->city = $request->city;
        if ($request->hasfile('profile')) {
            foreach ($request->profile as $key => $value) {
                $img = time()."_".$value->getClientOriginalName();
                $value->move(public_path('customer'),$img);                  
            }
            $obj->image = $img;
        }
        $obj->save();
        return redirect('log/');
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
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $data = Customer::findOrfail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->gender = $request->gender;
        $data->hobby = implode(',',$request->hobby);
        $data->dob = $request->dob;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->city = $request->city;
        if ($request->hasfile('profile')) {
            Storage::delete('public/customer/'.$data->image);
            // unlink(public_path('customer/').$data->image);
            foreach ($request->profile as $key => $value) {
                $img = time()."_".$value->getClientOriginalName();
                $value->move(public_path('customer'),$img);                  
            }
            $data->image = $img;
        }
        $data->save();
        return redirect('/cilent');
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

    public function login()
    {
        return view('front.login');
    }

    public function cust_login(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {

            // if(isset($request->remember))
            // {
            //         Cookie::queue(Cookie::make('laravel_session','12345',5));
            // }
            // else
            // {
            //     Cookie::queue(Cookie::forget('laravel_session'));
            // }
            // echo "done";
            // die;
            return redirect()->intended('/cilent');
        }
        return back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
       // Session::forget('laravel_session');
        Cookie::queue(Cookie::forget('demo'));
        Cookie::queue(Cookie::forget('laravel_session'));
        Cookie::queue(Cookie::forget('remember_customer_59ba36addc2b2f9401580f014c7f58ea4e30989d'));

        Session::flush();
        Auth::logout();
        return redirect('/cilent');
    }

    public function cust_profile()  
    {
        $cdata = Category::all();
        $sdata = Subcategory::all();    
        $cidata = City::all();
        $sidata = State::all();
        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }
        return view('front.profile',['sdata' => $sdata,'cdata'=>$cdata,'sidata'=>$sidata,'cidata'=>$cidata,'cart'=>$cart]);
    }

    public function change_password(Request $request)
    {
            
        $id = Auth::guard('customer')->user()->id;
        $data = Customer::find($id);
     
        if(Hash::check($request->opass,$data->password))
        {
           if($request->npass == $request->cpass)  
           {
                $data->password = Hash::make($request->cpass);
                $data->save();
                Session::flush();
                Auth::logout();
                return redirect('/log');
           }  
           else 
           {
           return back()->with('msg','new pass not match....');
           }
        }
        else
        {
           return back()->with('msg','old pass not match....');
        }
    }

    public function single_product($id)
    {
        // echo $id;
        // die;
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $cadata = Cart::all();
        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }
        $pdata = Product::find($id);
          
        $pdata['product_image'] = Product_image::where('product_id',$id)->get()->toArray();
        //  echo "<pre>";
        // print_r($pdata->toArray());
        // die;

        return view('front.single_product',['cdata'=>$cdata,'sdata'=>$sdata,'sidata'=>$pdata,'cart'=>$cart,'cadata'=>$cadata]);
    }

    public function add_cart(Request $request)
    {
        // echo "<pre>";
        // print_r($cdata->toArray());
        // die;
        if($request->cart_customer_id){
            $cart = new Cart();
            $cart->cart_product_id = $request->cart_product_id;
            $cart->cart_customer_id = $request->cart_customer_id;
            $cart->cart_product_name = $request->cart_product_name;
            $cart->cart_product_qty = $request->cart_product_qty;
            $cart->cart_product_price = $request->cart_product_price;
            $cart->cart_product_images = $request->image;
            $cart->save();
        }else {
            return redirect('log/'); 
        }
        return redirect('cart/');
    }

    public function shop()
    {
        $cdata = Category::all();
        $sdata = Subcategory::all();
        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }

        $cadata = Cart::all();
        $vdata= Variation::select('variations.*','variation_types.variation_type_name')
                            ->join('variation_types','variation_types.variation_type_id','=','variations.variation_type_id')
                            ->get();
        $variationDetails = array();
        foreach ($vdata as $key => $value) {
            $variationDetails[$value->variation_type_name][] = $value->toArray();
        }
        // echo "<pre>";
        // print_r($variationDetails);
        // die;
        $pdata = Product::all();
        foreach ($pdata as $key => $value) {
            $imgdata = Product_image::where('product_id',$value->product_id)->get();
            $pdata[$key]['product_image'] = $imgdata->toArray();
        }
        // echo "<pre>";
        // print_r($pdata->toArray());
        // die; 
        return view('front.shop',['cdata'=>$cdata,'sdata'=>$sdata,'ve'=>$variationDetails,'pdata'=>$pdata,'cart'=>$cart,'cadata'=>$cadata]);
    }

    public function cart(Request $request)
    {
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $cadata = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->get();

        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }
        // echo "<pre>";
        // print_r($cadata->toArray());
        // die;
        return view('front.cart',['cdata'=>$cdata,'sdata'=>$sdata,'cadata'=>$cadata,'cart'=>$cart]);
    }

    public function cart_delete($id)
    {
        $data = Cart::findOrfail($id);
        $data->delete();
        return redirect('cart/');
    }

    function search_product(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;


        if(isset($request->color))
        {
            $colors = $request->color;
            if(isset($productQuery))
            {
                $productQuery->where(function($query) use ($colors){
                        foreach ($colors as $key => $value) {
                            $query->orWhereRaw('FIND_IN_SET('.$value.',product_variation_id)');
                        }
                });
            }
            else
            {
                   $productQuery =  Product::where(function($query) use ($colors){

                            foreach ($colors as $key => $value) {

                                    $query->orWhereRaw('FIND_IN_SET('.$value.',product_variation_id)');
                            }
                    });     
            }
        }
        
        if(isset($request->brands))
        {
            $ba = $request->brands;
            if(isset($productQuery))
            {
                $productQuery->where(function($query) use ($ba){

                        foreach ($ba as $key => $value) {

                                $query->orWhereRaw('FIND_IN_SET('.$value.',product_variation_id)');
                        }
                });
            }
            else
            {
                $productQuery =  Product::where(function($query) use ($ba){

                        foreach ($ba as $key => $value) {

                                $query->orWhereRaw('FIND_IN_SET('.$value.',product_variation_id)');
                        }
                });
            }
        }

        if(isset($request->size))
        {
            $sa = $request->size;
            if(isset($productQuery))
            {
                     $productQuery->where(function($query) use ($sa){

                            foreach ($sa as $key => $value) {

                                    $query->orWhereRaw('FIND_IN_SET('.$value.',product_variation_id)');
                            }
                    });
            }
            else
            {
                   $productQuery =  Product::where(function($query) use ($sa){

                            foreach ($sa as $key => $value) {

                                    $query->orWhereRaw('FIND_IN_SET('.$value.',product_variation_id)');
                            }
                    });
            }
        }

        if(isset($request->color) || isset($request->brands) || isset($request->size))
        {
            $alldata = $productQuery->get();
        }
        else
        {
            $alldata = Product::all();
        }
       

        foreach ($alldata as $key => $value) {
            $alldata[$key]['product_image'] = Product_image::where('product_id',$value->product_id)->get()->toArray();
        }

        //  echo "<pre>";
        // print_r($alldata->toArray());
        // die;

        return view('front.product_view',['pdata'=>$alldata]);
    }


    function upd_qty(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;

        $data = Cart::find($request->q_id);
        $data->cart_product_qty = $request->q_qty;
        $data->save();
    }

    public function checkout(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $cdata = Category::all();   
        $sdata = Subcategory::all();
        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }
        $ci = City::all();
        $sa = State::all();

        return view('front.checkout',['sdata'=> $sdata,'cdata' => $cdata,'pdata'=>$request,'ci'=>$ci,'sa'=>$sa,'cart'=>$cart]);
    }
     public function stripepay(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
 

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
        if($data)
        {
            $o_id =  DB::table('orders')->insertGetId([
                'customer_id'=>Auth::guard('customer')->user()->id,
                'total_price'=>$request->t_total,
                'total_qty'=>$request->t_qty
            ]);
            // echo $o_id;
            // die;

            $cdata = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->get();
            // echo "<pre>";o
            // print_r($cdata->toArray());
            // die;
            foreach($cdata as $c)
            {
                $o_de = DB::table('order_details')->insert([
                    'order_id'=>$o_id,
                    'product_id'=>$c->cart_product_id,
                    'product_qty'=>$c->cart_product_qty,
                    'product_price'=>$c->cart_product_price,
                    'product_total_price'=>$request->t_total
                ]);
            }

            $pay = DB::table('payments')->insertGetId([
                'payment_customer_id'=>Auth::guard('customer')->user()->id,
                'card_name'=>$request->card_name,
                'card_number'=>$request->card_number,
                'cvc'=>$request->cvc,
                'exp_month'=>$request->ex_m,
                'exp_year'=>$request->ex_y,
                'payment_order_id'=>$o_id,
                'amount'=>$request->t_total,
                'tokan_id'=>$request->stripeToken
            ]);

            $cdata = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->delete();

            $ship = DB::table('shippings')->insert([
                'name' => $request->s_name,
                'email' => $request->s_email,
                'contact' => $request->s_contact,
                'address' => $request->s_address,
                'state' => $request->s_state,
                'city' => $request->s_city,   
                'customer_id' => Auth::guard('customer')->user()->id,
                'order_id' => $o_id,
                'payment_id' => $pay,  
            ]);
        }
        // Session::flash('success', 'Payment successful!');


        $pro = Order_details::where('order_id',$o_id)->get();
            // $pro[]->name = $cdata->cart_product_name;
            // echo "<pre>";
            // print_r($pro->toArray());
            // die;
        foreach ($pro as $key => $value) {
             $pro[$key]['alldata'] = Product::where('product_id',$value->product_id)->get()->first()->toArray();
            //$pro[$key]['alldata'] = $all_d; 
        }
        // $pro['bil_no']=rand(10000,50000);
        // echo "<pre>";
        // print_r($pro->toArray());
        // die;
        return view('front.invoice',['ship'=>$request,'pro'=>$pro]);
    }   

    // public function bill()
    // {
    //     return view('front.invoice');
    // }

    function pdf_dwn(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;

        $pro = Order_details::where('order_id',$request->order_id)->get();
            // $pro[]->name = $cdata->cart_product_name;
            // echo "<pre>";
            // print_r($pro->toArray());
            // die;
        foreach ($pro as $key => $value) {
             $pro[$key]['alldata'] = Product::where('product_id',$value->product_id)->get()->first()->toArray();
            //$pro[$key]['alldata'] = $all_d; 
        }

        // $pro['bil_no']=rand(10000,50000);
        // echo "<pre>";
        // print_r($pro->toArray());
        // die;

        if($request->has('download')){
            $pdf = PDF::loadView('front.invoice1',['ship'=>$request,'pro'=>$pro]);
            return $pdf->download('demo.pdf');
        }

        return back();
    }

    public function mail_demo()
    {
        return view('mail_form');
    }

    public function send_demo(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;

        if($request){
            $sub = DB::table('subscribers')->insert([
                'customer_id' => Auth::guard('customer')->user()->id,
                's_mail' => $request->email,
            ]);
        }

        $objDemo = new \stdClass();
        $objDemo->sender = $request->email;
        $objDemo->receiver = 'www.freak.com';
 
        Mail::to($request->email)->send(new SendMail($objDemo));
        return back()->with('success','Mail send...');
    }

    public function cate($id)
    {
        // echo "<pre>";
        // print_r($id);
        // die;
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $vdata= Variation::select('variations.*','variation_types.variation_type_name')
                            ->join('variation_types','variation_types.variation_type_id','=','variations.variation_type_id')
                            ->get();
        $variationDetails = array();
        foreach ($vdata as $key => $value) {
            $variationDetails[$value->variation_type_name][] = $value->toArray();
        }

        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }
        // echo "<pre>";
        // print_r($variationDetails);
        // die;
        $pdata = Product::where('product_category_id',$id)->get();

        foreach ($pdata as $key => $value) {
            $imgdata = Product_image::where('product_id',$value->product_id)->get();
            $pdata[$key]['product_image'] = $imgdata->toArray();
        }
        // echo "<pre>";
        // print_r($pdata->toArray());
        // die; 
        return view('front.cate',['cdata'=>$cdata,'sdata'=>$sdata,'ve'=>$variationDetails,'pdata'=>$pdata,'cart'=>$cart,'id'=>$id]);
    }

    public function subcate($id)
    {
        // echo "<pre>";
        // print_r($id);
        // die;
        $cdata = Category::all();
        $sdata = Subcategory::all();
        $vdata= Variation::select('variations.*','variation_types.variation_type_name')
                            ->join('variation_types','variation_types.variation_type_id','=','variations.variation_type_id')
                            ->get();
        $variationDetails = array();
        foreach ($vdata as $key => $value) {
            $variationDetails[$value->variation_type_name][] = $value->toArray();
        }

        if(!empty(Auth::guard('customer')->user()->id)){
            $cart = Cart::where('cart_customer_id',Auth::guard('customer')->user()->id)->count();
        }else{
            $cart = 0;
        }
        // echo "<pre>";
        // print_r($variationDetails);
        // die;
        $pdata = Product::where('product_sub_category_id',$id)->get();

        foreach ($pdata as $key => $value) {
            $imgdata = Product_image::where('product_id',$value->product_id)->get();
            $pdata[$key]['product_image'] = $imgdata->toArray();
        }
        // echo "<pre>";
        // print_r($pdata->toArray());
        // die; 
        return view('front.cate',['cdata'=>$cdata,'sdata'=>$sdata,'ve'=>$variationDetails,'pdata'=>$pdata,'cart'=>$cart,'sid'=>$id]);
    }
}
