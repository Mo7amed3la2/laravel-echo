<?php

use App\Events\OrderStatusChange;
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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home/{id}', 'HomeController@index')->name('home');

Route::post('test/{id}',function(Request $request,$id){
	// return $request->all();
	event (new OrderStatusChange($request->data,$id) );
	return [];
});