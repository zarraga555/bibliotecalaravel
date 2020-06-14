<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', function () {
//     return view('welcome');
// });
Route::view('/', 'home')->name('home');

Route::get('/bibliotecario', 'bibliotecarioController@Mostrar')->name('bibliotecario.index');
Route::get('/bibliotecario/create','bibliotecarioController@create')->name('bibliotecario.create');
Route::get('/bibliotecario/{bibliotecarioitem}/edit','bibliotecarioController@edit')->name('bibliotecario.edit');
Route::patch('/bibliotecario/{bibliotecarioitem}','bibliotecario@update')->name('bibliotecario.update');
Route::post('/bibliotecario/create', 'bibliotecarioController@store' )->name('bibliotecario.store');
Route::delete('/bibliotecario/{bibliotecarioitem}', 'bibliotecario@destroy')->name('bibliotecario.destroy');

Route::view('/autor', 'autor')->name('autor');
Route::post('/autor', 'autorValidationController@store' );

Route::view('/libro', 'libro')->name('libro');
Route::post('/libro', 'libroValidationController@store' );

Route::get('/usuario', 'personaController@Mostrar')->name('persona.index');
Route::get('/persona/create','personaController@create')->name('persona.create');
Route::get('/persona/{personaitem}/edit','personaController@edit')->name('persona.edit');
Route::patch('/persona/{personaitem}','personaController@update')->name('persona.update');
Route::post('/persona/create', 'personaController@store' )->name('persona.store');
Route::delete('/persona/{personaitem}', 'personaController@destroy')->name('persona.destroy');


Route::view('/prestamo', 'prestamo')->name('prestamo');
Route::post('/prestamo', 'prestamoValidationController@store' );

/* INSERT INTO persona (ci, nombre, direccion, telefono, correo, fechaNacimiento, paisNacimiento)
VALUES (12648902, 'Juan Alberto Zarraga Torrico', 'Av Segunda Circunvalacion #0260', 76917812, 'zarraga555@gmail.com', '1996-11-15', 'Argentina'); */
