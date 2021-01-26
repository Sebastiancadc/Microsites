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

Route::get('cambiarpasss', function () {

    return view('auth.passwords.reset');
});

Route::get('Cambiarcontraseña/{id}', 'CambiarpassController@edit')->name('Cambiarcontraseña');
Route::put('updateContraseña/{id}', 'CambiarpassController@update')->name('updateContraseña');

Route::get('loginAdmin', function () {

    return view('admin.loginAdmin');
});

// recuperar cotraseña
Route::get('admin/pasword', function () {

    return view('admin.pasword');
});

Route::get('Presentacion', function () {
    return view('admin.presentaciones.index');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('categoria', 'CategoryController');
    Route::resource('noticia', 'NoticiasController');
});

//Solicitud de usuario
Route::resource('Solitudcrear', 'SolicitudControlller');


// <<<<<<<<<<<<<<-----------------------------ADMINISTRADOR------------------->>>>>>>>>>
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    //Usuarios
    Route::resource('usuario', 'HomeController');
    Route::post('Crearcampaña', 'HomeController@store');
    Route::get('editarusuario/{id}', 'HomeController@edit')->name('editarusuario');
    Route::put('updateusuario/{id}', 'HomeController@update')->name('updateusuario');
    Route::delete('deleteusuario/{id}', 'HomeController@destroy')->name('eliminarusuario');

    Route::get('permisoslista', 'HomeController@permisoslista');
    Route::post('crearRol', 'HomeController@CrearRol');
    Route::get('editarpermisos/{id}', 'HomeController@editarpermisos')->name('permisoedit');
    Route::put('updatepermisos/{id}', 'HomeController@updatepermisos')->name('updatepermisos');
    Route::delete('deletepermiso/{id}', 'HomeController@destroypermisos')->name('eliminarpermiso');
    //DASBOARD ADMIN
    Route::get('HomeAdmin', 'InicioController@indexAdmin');

    //Solicitud
    Route::resource('Solitudcrear', 'SolicitudControlller');
    Route::get('ListaSolicitud', 'SolicitudControlller@index');
    Route::get('editarsolicitud/{id}', 'SolicitudControlller@edit')->name('editarsolicitud');
    Route::put('updatesolicitud/{id}', 'SolicitudControlller@update')->name('updatesolicitud');
    Route::delete('deletesolicitud/{id}', 'SolicitudControlller@destroy')->name('eliminarsolicitud');


    //Noticias
    Route::resource('noticia', 'NoticiasController');
    Route::get('editarnoticia/{id}', 'NoticiasController@edit')->name('editarnoticia');
    Route::get('editarnoticiaad/{id}', 'NoticiasController@editAd')->name('editarnoticiaad');
    Route::put('updatenoticia/{id}', 'NoticiasController@update')->name('update');
    Route::put('updatenoticiaus/{id}', 'NoticiasController@updateUs');
    Route::delete('deletenoticia/{id}', 'NoticiasController@destroy')->name('eliminarnoticia');
     
     //Acrhivos
     Route::resource('archivos', 'ArchivosController');
     Route::get('archivos', 'ArchivosController@index2');
     Route::post('/store', 'ArchivosController@store')->name('store');
     Route::get('/editar/{id}', 'ArchivosController@editadmin')->name('editaradmin');
     Route::put('/update/{id}', 'ArchivosController@updateadmin')->name('updateadmin');
     Route::delete('/eliminar/{id}', 'ArchivosController@destroy')->name('eliminar');
     route::get('/download', 'NotasController@download');
     
    //PRESENTACION
    Route::resource('presentacion', 'PresentacionesController');
    Route::get('editarpresentacionad/{id}', 'PresentacionesController@editAd')->name('editarpresentacionad');
    Route::put('updatepresentacionad/{id}', 'PresentacionesController@update')->name('update');
    Route::delete('deletepresentacion/{id}', 'PresentacionesController@destroyUs')->name('eliminarpresentacion');
    Route::delete('deletepresentacionad/{id}', 'PresentacionesController@destroy')->name('eliminarpresentacionad');
    
});

Route::get('repositoriocola', function () {
    return view('admin.repositorio.repositoriocola');
});

// <<<<<<<<<<<-------------------------------COLABORADOR------------------->>>>>>>
Route::group(['auth', 'prefix' => ''], function () {

    //Noticias
    Route::get('noticiausu', 'NoticiasController@index2')->name('index2');
    Route::post('crearnoticias', 'NoticiasController@store')->name('crearnoticias');
    Route::get('crearnoticia', 'NoticiasController@crearnoticia')->name('crearnoticia');
    Route::get('post/{slug}', 'NoticiasController@post')->name('post');
    Route::get('editarnoticia/{id}', 'NoticiasController@edit')->name('editarnoticia');
    Route::get('editarnoticiaad/{id}', 'NoticiasController@editAd')->name('editarnoticiaad');
    Route::put('updatenoticia/{id}', 'NoticiasController@update')->name('update');
    Route::put('updatenoticiaus/{id}', 'NoticiasController@updateUs');
    Route::delete('deletenoticia/{id}', 'NoticiasController@destroy')->name('eliminarnoticia');

    //Presentaciones 
    Route::get('noticiausu', 'PresentacionesController@index2')->name('index2');
    Route::get('crearpresentacion', 'PresentacionesController@crearpresentacion')->name('crearpresentacion');
    Route::post('crearpresentaciones', 'PresentacionesController@store')->name('crearpresentaciones');
    Route::get('presentacion/{title}', 'PresentacionesController@post')->name('presentacion');
    Route::get('presentacionFull/{id}', 'PresentacionesController@full')->name('presentacionf');

    Route::get('editarpresentacion/{id}', 'PresentacionesController@edit')->name('editarpresentacion');
    Route::get('editarpresentacionad/{id}', 'PresentacionesController@editAd')->name('editarpresentacionad');
    Route::put('updatepresentacion/{id}', 'PresentacionesController@update')->name('update');
    Route::put('updatepresentacionus/{id}', 'PresentacionesController@updateUs');
    Route::delete('deletepresentacion/{id}', 'PresentacionesController@destroyUs')->name('eliminarpresentacion');

    //ARCHIVOS
    Route::resource('archivos', 'ArchivosController');
    Route::get('archivos', 'ArchivosController@index')->name('archivos');
    Route::post('/store', 'ArchivosController@store')->name('store');
    Route::get('/editar/{id}', 'ArchivosController@edit')->name('editar');
    Route::put('/update/{id}', 'ArchivosController@update')->name('update');
    Route::delete('/eliminar/{id}', 'ArchivosController@destroy')->name('eliminar');
    route::get('/download', 'NotasController@download');
});
