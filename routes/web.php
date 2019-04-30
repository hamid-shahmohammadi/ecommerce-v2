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

Route::get('/', 'front\HomeController@index')->name('home');
Route::get('/product-details/{slug}', 'front\HomeController@productDetails')->name('product.details');
Route::get('/product-attribute/{pa}', 'front\HomeController@getPa')->name('front.getpa');
Route::post('/addtocart', 'front\CartController@addCart')->name('front.addtocart');
Route::get('/removecart/{product}', 'front\CartController@removeCart')->name('front.removecart');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function (){
    Route::get('/cart', 'front\CartController@cart')->name('front.cart');
    Route::post('/updatecart', 'front\CartController@updateCart')->name('front.updatecart');
    Route::get('/getcart', 'front\CartController@getCart')->name('front.getcart');
    Route::get('/payment', 'front\CheckoutController@payment')->name('payment');
    Route::post('/checkout/store', 'front\CheckoutController@store')->name('checkout.store');
});

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/',function (){
        return view('admin.index');
    })->name('admin.index');

    Route::resource('category','CategoryController');
    Route::get('getcategorydt','CategoryController@getCategoryDT')->name('getCategoryDT');

    Route::resource('product','ProductController');
    Route::get('getproductdt','ProductController@getProductDT')->name('getProductDT');

    Route::resource('pat','ProductAttributeTypeController');
    Route::get('getpatdt','ProductAttributeTypeController@getPATDT')->name('getPATDT');

    Route::get('pa/{product}','ProductAttributeController@index')->name('pa.index');
    Route::get('pa/{product}/create','ProductAttributeController@create')->name('pa.create');
    Route::get('pa/{pa}/edit','ProductAttributeController@edit')->name('pa.edit');
    Route::post('pa','ProductAttributeController@store')->name('pa.store');
    Route::post('pa/{pa}','ProductAttributeController@update')->name('pa.update');
    Route::post('pa/{pa}/delete','ProductAttributeController@destroy')->name('pa.destroy');

    Route::get('getpadt/{product}','ProductAttributeController@getPADT')->name('getPADT');
});
