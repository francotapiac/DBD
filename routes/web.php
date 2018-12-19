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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
//el ejemplo era con habitacion
Route::get('/actividad','ActividadController@index');
Route::get('/actividad/show/{id}','ActividadController@show');
Route::get('/actividad/create/','ActividadController@create');

//Ruta Asiento
Route::get('/asiento','AsientoController@index');
Route::get('/asiento/show/{id}','AsientoController@show');
Route::post('/asiento/destroy/{id}','AsientoController@destroy');
Route::post('/asiento/store','AsientoController@store');

//Ruta Hotel
Route::get('/hotel','HotelController@index');
Route::get('/hotel/show/{id}','HotelController@show');
Route::post('/hotel/destroy/{id}','HotelController@destroy');
Route::post('/hotel/store','HotelController@store');

//Ruta Escala
Route::get('/escala','EscalaController@index');
Route::get('/escala/show/{id}','EscalaController@show');
Route::post('/escala/destroy/{id}','EscalaController@destroy');
Route::post('/escala/store','EscalaController@store');

//Ruta Habitacion
Route::get('/habitacion','HabitacionController@index');
Route::get('/habitacion/show/{id}','HabitacionController@show');
Route::post('/habitacion/destroy/{id}','HabitacionController@destroy');
Route::post('/habitacion/store','HabitacionController@store');

//Ruta Aeropuerto
Route::get('/aeropuerto','AeropuertoController@index');
Route::get('/aeropuerto/show/{id}','AeropuertoController@show');
Route::post('/aeropuerto/destroy/{id}','AeropuertoController@destroy');
Route::post('/aeropuerto/store','AeropuertoController@store');

//Ruta Lugar
Route::get('/lugar','LugarController@index');
Route::get('/lugar/show/{id}','LugarController@show');
Route::post('/lugar/destroy/{id}','LugarController@destroy');
Route::post('/lugar/store','LugarController@store');

//Ruta Historial
Route::get('/historial','HistorialController@index');
Route::get('/historial/show/{id}','HistorialController@show');
Route::post('/historial/destroy/{id}','HistorialController@destroy');
Route::post('/historial/store','HistorialController@store');

//Ruta Actividad
Route::get('/actividad','ActividadController@index');
Route::get('/actividad/show/{id}','ActividadController@show');
Route::post('/actividad/destroy/{id}','ActividadController@destroy');
Route::post('/historial/store','ActividadController@store');

//Vuelo
Route::get('/vuelo','VueloController@index');
Route::get('/vuelo/create','VueloController@create');

/*Route::resource('actividad', 'ActividadController');  
Route::resource('aeropuerto', 'AeropuertoController');
Route::resource('asiento', 'AsientoController');
Route::resource('escala', 'EscalaController');
Route::resource('habitacion', 'HabitacionController');
Route::resource('historial', 'HistorialController');
Route::resource('hotel', 'HotelController');
Route::resource('lugar', 'LugarController');
Route::resource('paquete', 'PaqueteController');
Route::resource('permiso', 'PermisoController');
Route::resource('reserva', 'ReservaController');
Route::resource('rol', 'RolController');
Route::resource('seguro', 'SeguroController');
Route::resource('traslado', 'TrasladoController');
Route::resource('vehiculo', 'VehiculoController');
Route::resource('vuelo', 'VueloController');*/




