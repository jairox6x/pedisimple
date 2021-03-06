<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Exports\UsersExport;
use App\User;

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
Route::get('/storage-link', function(){
    Artisan::call('storage:link');
});

Auth::routes(['verify' => true]);
Route::get('registro/{token}', 'Auth\RegisterController@commerceRegister')->middleware('Invitation');
// Route::resource('register', 'Auth\RegisterController')->names('commerce.register')->middleware('Invitation');

Route::get('/', 'RestaurantController@index')->name('home')->middleware('auth');

Route::get('/bienvenido',function(){
    return view('auth.welcome');
})->name('welcome')->middleware(['auth','verified']);

Route::get('/comercios/solicitud', function(){
    return view('request');
})->name('register.request');

Route::get('/confirmacioncorreo', function(){
    return view('auth.verify');
});

// Route::get('/gracias', function(){
//     return view('thankyou');
// })->name('thankyou')->name('thankyou');

// Route::get('/confirmado', function(){
//     return view('confirmation');
// })->name('confirmation')->name('confirmation');

Route::post('/carrito/addTax', 'CartController@deliveryTax')->name('cart.deliveryTax');
Route::get('/carrito/vaciar', 'CartController@empty')->name('cart.empty');
Route::resource('/carrito', 'CartController')->names('cart');

// Route::resource('/checkout', 'CheckoutController')->names('checkout');

// Route::resource('/direcciones', 'AddressController')->names('address');

// Route::resource('/pedidos', 'OrderController')->names('order');

Route::resource('/datos', 'UserController')->names('user')->middleware(['auth', 'verified']);

Route::post('/administracion/invitaciones/reenviar', 'InvitationController@resend')->name('invitation.resend')->middleware(['auth','verified', 'Admin']);
Route::resource('/administracion/invitaciones', 'InvitationController')->names('invitation')->middleware(['auth','verified', 'Admin']);

Route::resource('/comercios', 'ListController')->names('list');

Route::get('/administracion/comercios', 'RestaurantController@list')->name('restaurant.admin.list')->middleware(['auth','verified', 'Admin']);
Route::post('/administracion/comercios', 'RestaurantController@updateStatus')->name('restaurant.admin.updateStatus')->middleware(['auth','verified', 'Admin']);

Route::post('/comercios/solicitud', 'RestaurantController@request')->name('restaurant.request');
Route::get('/comercio/informacion', 'RestaurantController@info')->name('restaurant.info')->middleware(['verified', 'hasRestaurant']);
Route::get('/comercio/horarios', 'RestaurantController@openingTime')->name('restaurant.times')->middleware(['verified', 'hasRestaurant']);
Route::resource('/comercio', 'RestaurantController')->names('restaurant')->middleware(['verified', 'hasRestaurant']);
Route::get('/comercio/create', 'RestaurantController@create')->name('restaurant.create')->middleware(['verified']);
Route::post('/comercio', 'RestaurantController@store')->name('restaurant.store')->middleware(['verified']);
Route::get('/comercio/{comercio}', 'RestaurantController@show')->name('restaurant.show')->middleware(['verified']);


//PRODUCTOS
Route::get('/producto/export-excel', 'ProductController@exportExcel')->name('product.export.excel')->middleware(['auth','verified', 'hasRestaurant']);
Route::post('/producto/import-excel', 'ProductController@importExcel')->name('product.import.excel')->middleware(['auth','verified', 'hasRestaurant']);
Route::post('/producto/{id}', 'ProductController@isAvailable')->name('product.available')->middleware(['auth','verified', 'hasRestaurant']);

Route::get('/productos', 'ProductController@index')->name('product.index')->middleware(['auth','verified', 'hasRestaurant']);
Route::get('/productos/create', 'ProductController@create')->name('product.create')->middleware(['auth','verified', 'hasRestaurant']);
Route::post('/productos', 'ProductController@store')->name('product.store')->middleware(['auth','verified', 'hasRestaurant']);
Route::get('/productos/{producto}', 'ProductController@edit')->name('product.edit')->middleware(['auth','verified', 'hasRestaurant']);
Route::put('/productos/{producto}', 'ProductController@update')->name('product.update')->middleware(['auth','verified', 'hasRestaurant']);
Route::delete('/productos', 'ProductController@destroy')->name('product.destroy')->middleware(['auth','verified', 'hasRestaurant']);

//CATEGORIAS
Route::get('/categoria/export-excel', 'CategoryController@exportExcel')->name('category.export.excel')->middleware(['auth','verified', 'hasRestaurant']);
Route::post('/categoria/import-excel', 'CategoryController@importExcel')->name('category.import.excel')->middleware(['auth','verified', 'hasRestaurant']);
Route::post('/categoria/{id}', 'CategoryController@isAvailable')->name('category.available')->middleware(['auth','verified', 'hasRestaurant']);

Route::get('/categorias', 'CategoryController@index')->name('category.index')->middleware(['auth','verified', 'hasRestaurant']);
Route::get('/categorias/create', 'CategoryController@create')->name('category.create')->middleware(['auth','verified', 'hasRestaurant']);
Route::post('/categorias', 'CategoryController@store')->name('category.store')->middleware(['auth','verified', 'hasRestaurant']);
Route::get('/categorias/{categoria}', 'CategoryController@edit')->name('category.edit')->middleware(['auth','verified', 'hasRestaurant']);
Route::put('/categorias/{categoria}', 'CategoryController@update')->name('category.update')->middleware(['auth','verified', 'hasRestaurant']);
Route::delete('/categorias', 'CategoryController@destroy')->name('category.destroy')->middleware(['auth','verified', 'hasRestaurant']);

// Route::resource('/categorias', 'CategoryController')->names('category')->middleware('verified');



// Route::get('/download', function(){
//     return Excel::download(new UsersExport, 'users.xlsx');
// });
