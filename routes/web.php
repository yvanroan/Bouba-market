<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontProductListController@index');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/product/{id}', 'FrontProductListController@show')->name('product.show');

Route::get('/category/{name}', 'FrontProductListController@allProducts')->name('product.list');
Route::get('/addToCart/{product}', 'CartController@addToCart')->name('add.cart');
Route::get('/cart', 'CartController@showCart')->name('cart.show');
Route::post('/items/{product}', 'CartController@updateCart')->name('cart.update');
Route::post('/item/{product}', 'CartController@removeCart')->name('cart.remove');
Route::get('/checkout/{amount}', 'CartController@checkout')->name('cart.checkout')->middleware('auth');


Route::get('/index/test', function () {
    return view('test');
});
Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],
	function(){
	Route::resource('categories','CategoryController');

	Route::resource('subcategories','SubcategoryController');
	Route::resource('products','ProductController');

	Route::get('/dashbord', function () {
	    return view('admin.dashbord');
	});
});

Auth::routes();
Route::get('subcategories/{id}', 'ProductController@loadSubcategories');
Route::get('/home', 'HomeController@index')->name('home');

