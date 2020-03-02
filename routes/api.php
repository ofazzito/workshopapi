<?php


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

##prefijo http://miruta.com/api/{metodo}

#http://workshopapi.test/api/user?api_token=XXXXXXXXXXXX

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function() {
    Route::get('/products/all', 'ProductsController@index')->name('products.all');
});

Route::get('welcome', function(){
    return response()->json(['data'=>'Bienvenidos al Workshop de Laravel', 'code' =>200]);
});
