<?php

Route::get('/', function(){
	return Redirect::to('login');
});

Route::get('login', 'HomeController@getLogin');
Route::get('logout', 'HomeController@getLogout');

Route::post('login', array('uses' => 'HomeController@postSignin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {

	//Ruta para consultar todas las provincias
	Route::get('eventos/provincias', function(){
	  if(Request::ajax()){
	      return Provincia::all()->toJson();
	  }
	});

	//Ruta para consultar todas las provincias
	Route::get('eventos/{id}/provincias', function(){
	  if(Request::ajax()){
	      return Provincia::all()->toJson();
	  }
	});

	//Ruta para consultar todas las provincias
	Route::get('ventas/provincias', function(){
	  if(Request::ajax()){
	      return Provincia::all()->toJson();
	  }
	});

	//Ruta para consultar todas las provincias
	Route::get('ventas/{id}/provincias', function(){
	  if(Request::ajax()){
	      return Provincia::all()->toJson();
	  }
	});

	//Ruta en la cual retornamos los subtipos relaccionados con el id de tipo
	Route::post('eventos/localidades', function(){
	  if(Request::ajax()){
	  	  $provincia_id = e(Input::get('provincia'));
	  	  return Localidade::where('provincia_id','=', $provincia_id)->get();
	  }
	});

	//Ruta en la cual retornamos los subtipos relaccionados con el id de tipo
	Route::post('ventas/localidades', function(){
	  if(Request::ajax()){
	  	  $provincia_id = e(Input::get('provincia'));
	  	  return Localidade::where('provincia_id','=', $provincia_id)->get();
	  }
	});

	//Ruta en la cual retornamos los subtipos relaccionados con el id de tipo
	Route::post('eventos/{id}/localidades', function(){
	  if(Request::ajax()){
	  	  $provincia_id = e(Input::get('provincia'));
	  	  return Localidade::where('provincia_id','=', $provincia_id)->get();
	  }
	});

	//Ruta en la cual retornamos los subtipos relaccionados con el id de tipo
	Route::post('ventas/{id}/localidades', function(){
	  if(Request::ajax()){
	  	  $provincia_id = e(Input::get('provincia'));
	  	  return Localidade::where('provincia_id','=', $provincia_id)->get();
	  }
	});

	Route::get('search', 'RangosController@search');
	Route::get('search_user', 'VentasController@search_user');

    Route::get('dashboard', 'HomeController@getDashboard');
	Route::resource('eventos', 'EventosController');
	Route::resource('users', 'UsersController');
	Route::resource('rangos', 'RangosController');
	Route::resource('ventas', 'VentasController');

	Route::get('listados', 'ListadosController@index');
	Route::get('listados/ventas', 'ListadosController@listadoVentas');
	Route::get('listados/vendedores', 'ListadosController@listadoVendedores');
	Route::get('listados/eventos', 'ListadosController@listadoEventos');
	Route::get('listados/clientes', 'ListadosController@listadoClientes');
	Route::post('listados/ventas_csv', 'ListadosController@listadoVentasCsv');

	Route::get('admin/articlesajax', array('as' => 'articlesajax', 'uses' => 'ArticleController@articlesajax'));
});

Route::group(array('before'=>'auth|esadmin'), function(){
	
	
	
});