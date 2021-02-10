<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

	Route::resources([
		'das' => 'DashboardController',
		'dash' => 'UserController',
		'states' => 'StatesController',
		'city' => 'CityController',
		'category' => 'CategoryController',
		'subcategory' => 'SubcategoryController',
		'variationtype' => 'VariationtypeController',
		'variation' => 'VariationController',
		'product' => 'ProductController'	
	]);

	Route::get("/search_data","UserController@search_data");
	Route::get("/search_state","StatesController@search_state");
	Route::get("/search_city","CityController@search_city");
	Route::get("/search_category","CategoryController@search_category");
	Route::get("/search_subcategory","SubcategoryController@search_subcategory");
	Route::get("/search_variationtype","VariationtypeController@search_variationtype");
	Route::get("/search_variation","VariationController@search_variation");
	Route::get("/search_product","ProductController@search_product");
	Route::get("/profile","UserController@profile");
	Route::post("/profileUp/{id}","UserController@profile_update");
	Route::post("/ch_profile","UserController@change_profile");

	Route::post("/get_city","UserController@getcity_data");
	Route::post("/get_category","ProductController@getcategory_data");

});

Route::get("forgot/","UserController@forgot");
Route::post("e_veri/","UserController@e_veri");
Route::get("otp_v/","UserController@otp_v");
Route::post("otp/","UserController@otp");
Route::get("ch_pass/","UserController@ch_pass");
Route::post("cn_pass/","UserController@cn_pass");

Route::post("/ch_password","CustomerController@change_password");

Route::post("/get_city","UserController@getcity_data");
Route::resource('cilent','CilentController');
Route::resource('cust','CustomerController');
Route::get('log','CustomerController@login');
Route::post('cust_login','CustomerController@cust_login');
Route::get('logout','CustomerController@logout');
Route::get('cust_profile','CustomerController@cust_profile');
Route::get('single_product/{id}','CustomerController@single_product');
Route::post('add_cart','CustomerController@add_cart');
Route::get('shop','CustomerController@shop');
Route::get('cart','CustomerController@cart');
Route::get('c_de/{id}','CustomerController@cart_delete');
Route::post('search_product','CustomerController@search_product');
Route::post('upd_qty','CustomerController@upd_qty');
Route::post('checkout','CustomerController@checkout');
Route::get('cate/{id}','CustomerController@cate');
Route::get('subcate/{id}','CustomerController@subcate');

Route::post('/stripepay','CustomerController@stripepay');
Route::get('/bill','CustomerController@bill');
Route::post('/pdf_dwn','CustomerController@pdf_dwn');
Route::get('/mail_demo','CustomerController@mail_demo');
Route::post('/send_demo','CustomerController@send_demo');