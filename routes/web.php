<?php


//get --> consultar info.
//post --> gardar cambios 


Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show'); // edición formulario


Route::middleware(['auth','admin'])->  group(function()
{
	Route::get('/products','ProductController@index'); //listar
	Route::get('/products/create','ProductController@create'); // crear
	Route::post('/products','ProductController@store'); //gardar datos

	Route::get('/products/{id}/edit','ProductController@edit'); // edición formulario
	Route::post('/products/{id}/edit','ProductController@update'); //actualizar formulario

	Route::delete('/products/{id}','ProductController@destroy'); //formulario eliminar

	Route::get('/products/{id}/images','ImageController@index'); //ver imagenes produto.
	Route::post('/products/{id}/images','ImageController@store'); //registrar imagen produto.
	Route::delete('/products/{id}/images','ImageController@destroy'); //formulario eliminar

	Route::get('/products/{id}/images/select/{image}','ImageController@select'); //ver imagenes produto.

});

