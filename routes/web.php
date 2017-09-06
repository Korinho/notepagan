<?php

// Rutas del website
Route::get('/','WebsiteController@index');

Route::get('/TerminosYCondiciones', 'WebsiteController@terminos');
Route::get('/faqs', 'WebsiteController@faqs');
Route::get('/publicidad', 'WebsiteController@faqs');

// Aqui se listan las empresas y 
Route::get('/empresas', 'WebsiteController@empresas');
Route::get('/empresa/{empresa}/casos','WebsiteController@casosEmpresa');

Route::get('/personas', 'WebsiteController@personas');
Route::get('/persona/{persona}/casos','WebsiteController@casosPersona');

Route::get('/casos/buscar/{keyword}','WebsiteController@search');

Route::get('/casos/ver/{id}','CasosController@show');


//log  viewer
	
Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


// Rutas para filtros de casos
Route::get('/casos/filter/{filterKey}','CasosController@apiGetFilter');
Route::get('/casos/status/{stat}','CasosController@apiGetByStatus');

// rutas de facebooks
Route::get('/auth/facebook', 'SocialAuthController@redirect');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::get('/auth/facebook/logout', 'SocialAuthController@logout');
Route::get('/login', function(){ return redirect('/'); });




Route::post('casos/nuevo','CasosController@store');



// Route::get('/mail','MailController@invita');
Route::post('/mail','MailController@invita');


Route::group(['middleware' => 'auth'], function () 
{
	// Rutas para usuarios

	Route::get('usuario/ver','UserController@ver');


	// Rutas para deudores

	Route::post('/api/deudores/nuevo', 'DeudoresController@store');

	Route::post('/api/deudores/destroy/{id}', 'DeudoresController@destroy');

	Route::post('/api/deudores/destroy/{id}', 'DeudoresController@destroy');

	Route::post('/deudor/{id}/setlogo', 'DeudoresController@setLogo');

	Route::get('/api/deudores/autocompleteNombre', 'DeudoresController@autoCompleteNombre');


	// Rutas para casos

    Route::get('/miscasos','CasosController@index');

	Route::get('casos/nuevo','CasosController@create');

	Route::get('casos/nuevo/{idEmpresa}','CasosController@createAgain');
	
	Route::get('api/miscasos','CasosController@apiMisCasos');

	Route::post('/api/status','CasosController@apiStatus');



	// Rutas para archivos
	
	Route::post('/archivos/uploadfile/{idCaso}','ArchivosController@store');

	// Rutas para comentarios

	Route::post('/comentario/nuevo','ComentariosController@store');	

	Route::get('/comentarios/{idCaso}','ComentariosController@all');	

	// Rutas para los likes

	Route::post('/like/nuevo','LikesController@store');	

	Route::post('/like/destroy/{id}','LikesController@destroy');	

	// Rutas de flash messages

	Route::post('/api/messages','MessagesController@simple');
});







