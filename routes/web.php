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


/******************************

[Tabla de contenidos]

1. Rutas de sistema
2. Rutas de CRUD
3. Carrito de compras
4. Rutas de vistas
5. Rutas postman

******************************/


/*********************************
1. Rutas de sistema
*********************************/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*********************************
2. Rutas de CRUD
*********************************/

/*********************************
2.1. Rutas de reserva
*********************************/
Route::resource('reserva','ReservaController');
Route::post('/reserva/actividad', 'ReservaController@reservaActividad')->name('reservaActividad');


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

Route::resource('rol', 'RolController');
Route::resource('seguro', 'SeguroController');
Route::resource('traslado', 'TrasladoController');
Route::resource('vehiculo', 'VehiculoController');
Route::resource('vuelo', 'VueloController');

/*********************************
3. Carrito de compras
*********************************/

//Inyección de dependecia (evita repetir funcionalidad)

Route::get('carritos/show', 'CarroController@show')->name('carritos.show');
Route::get('carritos/add/{reserva}', 'CarroController@add')->name('carritos.add');;
Route::get('carrito','CarroController@carroCompra')->name('agregarCarro');

/*********************************
4. Rutas de vistas
*********************************/

Route::get('/offers', function () {
    return view('offers');
});


/*********************************
5. Rutas postman
*********************************/

//Ruta Actividad
/*Route::get('/actividad','ActividadController@index');
Route::get('/actividad/show/{id}','ActividadController@show');
Route::post('/actividad/destroy/{id}','ActividadController@destroy');
Route::post('/actividad/store/','ActividadController@store');
Route::post('/actividad/update/{id}','ActividadController@update');
Route::get('/actividad/create','ActividadController@create');

//Ruta Asiento
Route::get('/asiento','AsientoController@index');
Route::get('/asiento/show/{id}','AsientoController@show');
Route::post('/asiento/destroy/{id}','AsientoController@destroy');
Route::post('/asiento/store','AsientoController@store');
Route::post('/asiento/update/{id}','AsientoController@update');
Route::get('/asiento/create','AsientoController@create');

//Ruta Traslado
Route::get('/traslado','TrasladoController@index');
Route::get('/traslado/show/{id}','TrasladoController@show');
Route::post('/traslado/destroy/{id}','TrasladoController@destroy');
Route::post('/traslado/store','TrasladoController@store');
Route::post('/traslado/update/{id}','TrasladoController@update');
Route::get('/traslado/create','TrasladoController@create');

//Ruta Hotel
Route::get('/hotel','HotelController@index');
Route::get('/hotel/show/{id}','HotelController@show');
Route::post('/hotel/destroy/{id}','HotelController@destroy');
Route::post('/hotel/store','HotelController@store');
Route::post('/hotel/update/{id}','HotelController@update');
Route::get('/hotel/create','HotelController@create');

//Ruta Escala
Route::get('/escala','EscalaController@index');
Route::get('/escala/show/{id}','EscalaController@show');
Route::post('/escala/destroy/{id}','EscalaController@destroy');
Route::post('/escala/store','EscalaController@store');
Route::post('/escala/update/{id}','EscalaController@update');
Route::get('/escala/create','EscalaController@create');

//Ruta Habitacion
Route::get('/habitacion','HabitacionController@index');
Route::get('/habitacion/show/{id}','HabitacionController@show');
Route::post('/habitacion/destroy/{id}','HabitacionController@destroy');
Route::post('/habitacion/store','HabitacionController@store');
Route::post('/habitacion/update/{id}','HabitacionController@update');
Route::get('/habitacion/create','HabitacionController@create');

//Ruta Aeropuerto
Route::get('/aeropuerto','AeropuertoController@index');
Route::get('/aeropuerto/show/{id}','AeropuertoController@show');
Route::post('/aeropuerto/destroy/{id}','AeropuertoController@destroy');
Route::post('/aeropuerto/store','AeropuertoController@store');
Route::post('/aeropuerto/update/{id}','AeropuertoController@update');
Route::get('/aeropuerto/create','AeropuertoController@create');

//Ruta Lugar
Route::get('/lugar','LugarController@index');
Route::get('/lugar/show/{id}','LugarController@show');
Route::post('/lugar/destroy/{id}','LugarController@destroy');
Route::post('/lugar/store','LugarController@store');
Route::post('/lugar/update/{id}','LugarController@update');
Route::get('/lugar/create','LugarController@create');

//Ruta Historial
Route::get('/historial','HistorialController@index');
Route::get('/historial/show/{id}','HistorialController@show');
Route::post('/historial/destroy/{id}','HistorialController@destroy');
Route::post('/historial/store','HistorialController@store');
Route::post('/historial/update/{id}','HistorialController@update');
Route::get('/historial/create','HistorialController@create');

//Ruta Vuelo
Route::get('/vuelo','VueloController@index');
Route::get('/vuelo/show/{id}','VueloController@show');
Route::post('/vuelo/destroy/{id}','VueloController@destroy');
Route::post('/vuelo/store','vueloController@store');
Route::post('/vuelo/update/{id}','VueloController@update');
Route::get('/vuelo/create','VueloController@create');

//Ruta Vehiculo
Route::get('/vehiculo','VehiculoController@index');
Route::get('/vehiculo/show/{id}','VehiculoController@show');
Route::post('/vehiculo/destroy/{id}','VehiculoController@destroy');
Route::post('/vehiculo/store','VehiculoController@store');
Route::post('/vehiculo/update/{id}','VehiculoController@update');
Route::get('/vehiculo/create','VehiculoController@create');

//Ruta Usuario
Route::get('/usuario','UsuarioController@index');
Route::get('/usuario/show/{id}','UsuarioController@show');
Route::post('/usuario/destroy/{id}','UsuarioController@destroy');
Route::post('/usuario/store','UsuarioController@store');
Route::post('/usuario/update/{id}','UsuarioController@update');
Route::get('/usuario/create','UsuarioController@create');

//Ruta Usuario
Route::get('/seguro','SeguroController@index');
Route::get('/seguro/show/{id}','SeguroController@show');
Route::post('/seguro/destroy/{id}','SeguroController@destroy');
Route::post('/seguro/store','SeguroController@store');
Route::post('/seguro/update/{id}','SeguroController@update');
Route::get('/seguro/create','SeguroController@create');

//Ruta Rol
Route::get('/rol','RolController@index');
Route::get('/rol/show/{id}','RolController@show');
Route::post('/rol/destroy/{id}','RolController@destroy');
Route::post('/rol/store','RolController@store');
Route::post('/rol/update/{id}','RolController@update');
Route::get('/rol/create','RolController@create');

//Ruta Reserva
Route::get('/reserva','ReservaController@index');
Route::get('/reserva/show/{id}','ReservaController@show');
Route::post('/reserva/destroy/{id}','ReservaController@destroy');
Route::post('/reserva/store','ReservaController@store');
Route::post('/reserva/update/{id}','ReservaController@update');
Route::get('/reserva/create','ReservaController@create');

//Ruta Permiso
Route::get('/permiso','PermisoController@index');
Route::get('/permiso/show/{id}','PermisoController@show');
Route::post('/permiso/destroy/{id}','PermisoController@destroy');
Route::post('/permiso/store','PermisoController@store');
Route::post('permiso/update/{id}','PermisoController@update');
Route::get('permiso/create','PermisoController@create');

//Ruta Paquete
Route::get('/paquete','PaqueteController@index');
Route::get('/paquete/show/{id}','PaqueteController@show');
Route::post('/paquete/destroy/{id}','PaqueteController@destroy');
Route::post('/paquete/store','PaqueteController@store');
Route::post('/paquete/update/{id}','PaqueteController@update');
Route::get('/paquete/create','PaqueteController@create');
*/





