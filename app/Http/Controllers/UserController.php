<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\User;
use App\State;
use App\City;
use Hash;
use Auth;
use App\Http\Controllers\Crypt;
use Session;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

// use App\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        // print_r(demo_data());
        // die;
        // demo_data();
        // test_demo(10,20);
        // die;
        $data = User::select('users.*','states.state_name','cities.city_name')
                    ->join('states','states.state_id','=','users.state')
                    ->join('cities','cities.city_id','=','users.city')
                    ->paginate(2);
        //$data->withpath('/ss');   
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('admin.index',['da'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sdata =  State::all();  
        return view('admin.create',['sdata'=>$sdata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|max:5',
            'gender' => 'required',
            'hobby' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'state'   => 'required|not_in:-1',
            'city'   => 'required|not_in:-1',
            'profile' => 'required'
        ]);

        $obj = new User();
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
            $obj->image = basename($request->profile->store('public'));
        }
        // echo "<pre>";
        // print_r($obj->toArray());
        // die;
        $obj->save();
        return redirect('/dash');
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
        $data = User::findOrfail($id);
        $sdata =  State::all();
        $cdata = City::all();
        // echo "<pre>";
        // print_r($data['image']);
        // die;
        return view('admin.edit',['edata'=>$data,'sdata'=>$sdata,'cdata'=>$cdata]);
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
        $data = User::findOrfail($id);
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->gender = $request->gender;
        $data->hobby = implode(',',$request->hobby);
        $data->dob = $request->dob;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->city = $request->city;
        if ($request->hasfile('profile')) {
            Storage::disk('public')->delete($data->image);
            $data->image = basename($request->profile->store('public'));
        }
        $data->save();
        return redirect('/dash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrfail($id);
        // echo "<pre>";
        // print_r($data['profile']);
        // die;
        $img = $data['profile'];
        Storage::disk('public')->delete($img);
        // unlink(public_path('storage/'.$img));
        $data->delete();
        return redirect('/dash');
    }

    function search_data(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $name = $request->name;
        // echo $name;
        // die();
        $data = User::
                where("name","LIKE","%".$name."%")
                ->where("email","LIKE","$request->email%")
                ->where("state","LIKE","%$request->state%")
                ->where("city","LIKE","%$request->city%")
                ->paginate(2);

        $data->appends(['name' => $name,'email'=>$request->email]);

        return view('admin.index',['da'=>$data,'key'=>$request]);
        //         echo "<pre>";
        // print_r($data->toArray());
        // die;

    }


    function getcity_data(Request $request)
    {
            // print_r($request->cat);
            // die;
            $state_id = $request->cat;

            $all = City::where('state_id',$state_id)->get();
            // print_r($all->toArray());
            // die;
            echo "<option>---------select city---------</option>";

            foreach ($all as $key => $value) {
               echo "<option value='".$value['city_id']."'>".$value['city_name']."</option>";
            }
    }

    public function profile()
    {
        $sdata =  State::all();
        $cdata = City::all();
        // $id = Auth::user()->id;
        // $data = User::findOrfail($id);
        return view('admin.profile',['sdata'=>$sdata,'cdata'=>$cdata]);
    }

    public function profile_update(Request $request, $id)
    {
        $data = User::findOrfail($id);
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
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
            Storage::disk('public')->delete($data->image);
            $data->image = basename($request->profile->store('public'));
        }
        $data->save();
        return redirect('/profile');
    }

    public function change_profile(Request $request)
    {
            
        $id = Auth::user()->id;
        $data = User::find($id);
     
        if(Hash::check($request->opass,$data->password))
        {
           if($request->npass == $request->cpass)  
           {
                $data->password = Hash::make($request->cpass);
                $data->save();
                Session::flush();
                Auth::logout();
                return redirect('/');
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

    public function forgot()
    {
        return view('admin.forgot');
    }

    public function e_veri(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $check = User::all();
        $objDemo = new \stdClass();
        foreach ($check as $value) {
            $otp = rand(50000,99999);
            if($value->email==$request->email){
                $objDemo->sender = $request->email;
                $objDemo->receiver = $otp;
                Mail::to($request->email)->send(new SendMail($objDemo));
                // echo "<pre>";
                // print_r($objDemo);
                // print_r($otp);
                // die;
                break;
            }
        }
        return redirect('otp_v/')->with(['otp'=>$otp,'email'=>$request->email]);
    }

    public function otp_v()
    {
        return view('admin.otp_v');
    }


    public function otp(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        if($request->otp==$request->o_otp){
            return view('admin.ch_pass',['email'=>$request->email]);
        }
        else{
            return back()->with('msg','otp is not valid....or Expire');
        }
    }

    public function ch_pass()
    {
        return view('admin.ch_pass');
    }

    public function cn_pass(Request $request)
    {
        $data = User::where('email',$request->email)->first();
        // echo "<pre>";
        // print_r($data->toArray());
        // die;

        if($request->n_pass == $request->c_pass)  
        {
            $data->password = Hash::make($request->c_pass);
            $data->save();
            Session::flush();
            Auth::logout();
            return redirect('/login');
        }  
        else 
        {
            return redirect('ch_pass')->with('msg','new pass not match....');
        }
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
}
