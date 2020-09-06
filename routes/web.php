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
    return view('site');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:servidor');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function() {
    
    Route::resource('cursos', 'CursosController')->middleware('can:administrador')->middleware('can:servidor');
    Route::resource('usuarios', 'UsuariosController')->middleware('can:administrador');
    Route::resource('alunos', 'AlunosController')->middleware('can:administrador')->middleware('can:servidor');
    Route::resource('servidores', 'ServidorController')->middleware('can:administrador');
    Route::resource('adm', 'AdminController')->middleware('can:administrador');

});


