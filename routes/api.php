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

Route::middleware('auth:api')->group(function(){
    Route::get('/products/all', 'ProductsController@index')->name('products.all');
    Route::get('/correo/basico', 'MailController@enviarBasico')->name('correo.basico');
    Route::get('/correo/html', 'MailController@enviarHtml')->name('correo.html');
    Route::get('/correo/template', 'MailController@enviarTemplate')->name('correo.template');
});
