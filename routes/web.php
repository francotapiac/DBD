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
Route::post('/actividad/destroy/{id}','ActividadController@destroy');
Route::post('/actividad/store/','ActividadController@store');
Route::post('/actividad/update/{id}','ActividadController@update');

//Ruta Asiento
Route::get('/asiento','AsientoController@index');
Route::get('/asiento/show/{id}','AsientoController@show');
Route::post('/asiento/destroy/{id}','AsientoController@destroy');
Route::post('/asiento/store','AsientoController@store');

Route::get('/traslado','TrasladoController@index');
Route::get('/traslado/show/{id}','TrasladoController@show');
Route::post('/traslado/destroy/{id}','TrasladoController@destroy');
Route::post('/traslado/store','TrasladoController@store');
Route::post('/traslado/update/{id}','TrasladoController@update');

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
Route::post('/escala/update/{id}','EscalaController@update');

//Ruta Habitacion
Route::get('/habitacion','HabitacionController@index');
Route::get('/habitacion/show/{id}','HabitacionController@show');
Route::post('/habitacion/destroy/{id}','HabitacionController@destroy');
Route::post('/habitacion/store','HabitacionController@store');
Route::post('/habitacion/update/{id}','HabitacionController@update');

//Ruta Aeropuerto
Route::get('/aeropuerto','AeropuertoController@index');
Route::get('/aeropuerto/show/{id}','AeropuertoController@show');
Route::post('/aeropuerto/destroy/{id}','AeropuertoController@destroy');
Route::post('/aeropuerto/store','AeropuertoController@store');
Route::post('/aeropuerto/update/{id}','AeropuertoController@update');

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
Route::post('/actividad/store','ActividadController@store');

//Vuelo
Route::get('/vuelo','VueloController@index');
Route::get('/vuelo/show/{id}','VueloController@show');
Route::post('/vuelo/destroy/{id}','VueloController@destroy');
Route::post('/vuelo/store','vueloController@store');
Route::post('/vuelo/update/{id}','VueloController@update');

Route::get('/vehiculo','VehiculoController@index');
Route::get('/vehiculo/show/{id}','VehiculoController@show');
Route::post('/vehiculo/destroy/{id}','VehiculoController@destroy');
Route::post('/vehiculo/store','VehiculoController@store');

Route::get('/escala','EscalaController@index');
Route::get('/escala/show/{id}','EscalaController@show');
Route::post('/escala/destroy/{id}','EscalaController@destroy');
Route::post('/escala/store','EscalaController@store');

Route::get('/usuario','UsuarioController@index');
Route::get('/usuario/show/{id}','UsuarioController@show');
Route::post('/usuario/destroy/{id}','UsuarioController@destroy');
Route::post('/usuario/store','UsuarioController@store');

Route::get('/seguro','SeguroController@index');
Route::get('/seguro/show/{id}','SeguroController@show');
Route::post('/seguro/destroy/{id}','SeguroController@destroy');
Route::post('/seguro/store','SeguroController@store');
Route::post('/seguro/update/{id}','SeguroController@update');

Route::get('/rol','RolController@index');
Route::get('/rol/show/{id}','RolController@show');
Route::post('/rol/destroy/{id}','RolController@destroy');
Route::post('/rol/store','RolController@store');
Route::post('/rol/update/{id}','RolController@update');

Route::get('/reserva','ReservaController@index');
Route::get('/reserva/show/{id}','ReservaController@show');
Route::post('/reserva/destroy/{id}','ReservaController@destroy');
Route::post('/reserva/store','ReservaController@store');

Route::get('/permiso','PermisoController@index');
Route::get('/permiso/show/{id}','PermisoController@show');
Route::post('/permiso/destroy/{id}','PermisoController@destroy');
Route::post('/permiso/store','PermisoController@store');

Route::get('/paquete','PaqueteController@index');
Route::get('/paquete/show/{id}','PaqueteController@show');
Route::post('/paquete/destroy/{id}','PaqueteController@destroy');
Route::post('/paquete/store','PaqueteController@store');





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




