<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('products', ['as' => 'Productes', 'uses' =>'ProductController@index']);
Route::get('product/add', ['as' => 'addProduct', 'uses' =>'ProductController@create']);
Route::post('product/save', ['as' => 'saveProduct', 'uses' =>'ProductController@save']);
Route::get('product/edit/{id}', ['as' => 'editProduct', 'uses' =>'ProductController@edit']);
Route::get('product/delete/{id}', ['as' => 'deleteProduct', 'uses' =>'ProductController@delete']);
