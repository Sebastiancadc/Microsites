x<?php

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

Route::get('loginAdmin', function () {

    return view('admin.loginAdmin');
});

// recuperar cotraseña
Route::get('admin/pasword', function () {

    return view('admin.pasword');
});

Route::get('Solicitud', function () {
    return view('admin.solicitud');
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
Route::group(['auth', 'prefix' => ''], function () {

    //Noticias
    Route::get('noticiausu', 'NoticiasController@index2')->name('index2');
    Route::post('crearnoticias', 'NoticiasController@store')->name('crearnoticias');
    Route::get('crearnoticia', 'NoticiasController@crearnoticia')->name('crearnoticia');
    Route::get('post/{slug}', 'NoticiasController@post')->name('post');

    //NOTICIA
    Route::get('editarnoticia/{id}', 'NoticiasController@edit')->name('editarnoticia');
    Route::put('updatenoticia/{id}', 'NoticiasController@update')->name('update');

    //Manual
    Route::get('ayuda', 'ManualController@index');
});
