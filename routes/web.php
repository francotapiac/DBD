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
Route::get('/actividad/show/{id}','ActividadController@show');
Route::resource('actividad', 'ActividadController');  
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
Route::resource('vuelo', 'VueloController');




