<?php

use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('/', function () {

    return view('admin.login');
});

Route::get('/home', 'InicioController@index');


Auth::routes();
//pagina de espera
Route::get('logout', function () {

    return view('logout');
});

// login
Route::get('admin', function () {

    return view('admin.login');
});
// recuperar cotraseña
Route::get('admin/pasword', function () {

    return view('admin.pasword');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('categoria', 'CategoryController');
    Route::resource('noticia', 'NoticiasController');
});


// <<<<<<<<<<<<<<-------------------------------ADMINISTRADOR------------------->>>>>>>>>>
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    //Usuarios
    Route::resource('usuario', 'HomeController');
    Route::post('createcolaborador', 'HomeController@storeCola')->name('crearColaborador');
    Route::get('crearUserAdmin', 'HomeController@crearAdmin');
    Route::get('editarusuario/{id}', 'HomeController@edit')->name('editarusuario');
    Route::put('updateusuario/{id}', 'HomeController@update')->name('updateusuario');
    Route::delete('deleteusuario/{id}', 'HomeController@destroy')->name('eliminarusuario');

    Route::get('permisoslista', 'HomeController@permisoslista');
    Route::post('crearRol', 'HomeController@CrearRol');
    Route::get('editarpermisos/{id}', 'HomeController@editarpermisos')->name('permisoedit');
    Route::put('updatepermisos/{id}', 'HomeController@updatepermisos')->name('updatepermisos');

    //DASBOARD ADMIN
    Route::get('HomeAdmin', 'InicioController@indexAdmin');

    //ANUNCIOS
    Route::get('AnunciosAdmin', 'AnunciosController@index');
    Route::post('crearAnuncio', 'AnunciosController@Crear');
    Route::delete('elimidarAnuncio/{id}', 'AnunciosController@destroy')->name('eliminaranuncio');
   
    //Noticias
    Route::resource('noticia', 'NoticiasController');
    Route::get('editarnoticia/{id}', 'NoticiasController@edit')->name('editarnoticia');
    Route::get('editarnoticiaad/{id}', 'NoticiasController@editAd')->name('editarnoticiaad');
    Route::put('updatenoticia/{id}', 'NoticiasController@update')->name('update');
    Route::put('updatenoticiaus/{id}', 'NoticiasController@updateUs');
    Route::delete('deletenoticia/{id}', 'NoticiasController@destroy')->name('eliminarnoticia');

    //Categorias
    Route::resource('categoria', 'CategoryController');
    Route::get('crearcategoria', 'CategoryController@crearbuzon')->name('crearcategoria');
    Route::post('crearcategorias', 'CategoryController@crearsugerencias')->name('crearcategorias');
    Route::get('editarcategoria/{id}', 'CategoryController@edit')->name('editar');
    Route::delete('deletecategoria/{id}', 'CategoryController@destroy')->name('eliminarcategoria');

});

Route::get('repositoriocola', function () {
    return view('admin.repositorio.repositoriocola');
});

// <<<<<<<<<<<-------------------------------COLABORADOR------------------->>>>>>>
Route::group(['auth','prefix' => ''], function () {

    //Noticias
    Route::get('noticiausu', 'NoticiasController@index2')->name('index2');
    Route::post('crearnoticias', 'NoticiasController@store')->name('crearnoticias');
    Route::get('crearnoticia', 'NoticiasController@crearnoticia')->name('crearnoticia');
    Route::get('post/{slug}', 'NoticiasController@post')->name('post');

    //Canlendario
    // Route::get('calendar', 'CalendarioController@index')->name('calendar');
    // Route::post('Calendario/crearEvento', 'CalendarioController@crearevento')->name('crearEvento');
    // Route::post('Calendario/creareventoad', 'CalendarioController@crearevento')->name('creareventoad');
    // Route::get('cumpleaños', 'CalendarioController@cumpleAños')->name('cumpleaños');
    // Route::get('Calendario/verEventos/{id}', 'CalendarioController@verEventos')->name('verEventos');
    // Route::get('Calendario/verEvento/{id}', 'CalendarioController@verevento')->name('verEvento');
    // Route::get('Calendario/verEventoad/{id}', 'CalendarioController@vereventoad')->name('verEventoad');
    // Route::delete('Calendario/eliminarEvento/{id}', 'CalendarioController@destroy')->name('eliminarEventos');
    // Route::delete('Calendario/eliminarEventoAd/{id}', 'CalendarioController@destroyad')->name('eliminarEventosad');
    // Route::put('Calendario/editarEvento/{id}', 'CalendarioController@editarEvento')->name('editarEvento');
    // Route::put('Calendario/editarEventoAd/{id}', 'CalendarioController@editarEventoAd')->name('editarEventoAd');
 
    //NOTICIA
    Route::get('editarnoticia/{id}', 'NoticiasController@edit')->name('editarnoticia');
    Route::put('updatenoticia/{id}', 'NoticiasController@update')->name('update');

    //Notificaciones
    Route::get('Notificaciones', 'AnunciosController@Listanotificaciones');
    Route::get('Leidas', function(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('leertodas');
    Route::get('marcarleidas', 'AnunciosController@markNotification')->name('marcarleidas');

    //Manual
    Route::get('ayuda', 'ManualController@index');
});