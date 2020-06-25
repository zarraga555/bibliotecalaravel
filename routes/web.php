<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/bibliotecario', 'bibliotecarioController@Mostrar')->name('bibliotecario.index');
// Route::get('/bibliotecario/create','bibliotecarioController@create')->name('bibliotecario.create');
// Route::get('/bibliotecario/{bibliotecario}/edit','bibliotecarioController@edit')->name('bibliotecario.edit');
// Route::patch('/bibliotecario/{bibliotecario}','bibliotecarioController@update')->name('bibliotecario.update');
// Route::post('/bibliotecario/create', 'bibliotecarioController@store' )->name('bibliotecario.store');
// Route::delete('/bibliotecario/{bibliotecario}', 'bibliotecarioController@destroy')->name('bibliotecario.destroy');

// Route::get('/autor', 'autorController@index')->name('autor.index');
// Route::get('/autor/create','autorController@create')->name('autor.create');
// Route::get('/autor/{autor}/edit','autorController@edit')->name('autor.edit');
// Route::patch('/autor/{autor}','autorController@update')->name('autor.update');
// Route::post('/autor/create', 'autorController@store' )->name('autor.store');
// Route::delete('/autor/{autor}', 'autorController@destroy')->name('autor.destroy');

Route::resource('bibliotecario', 'bibliotecarioController')->names('bibliotecario');
Route::get('listBibliotecario', 'bibliotecarioController@listBibliotecario');

Route::resource('autor', 'autorController')->names('autor');
Route::get('listAutor', 'autorController@listAutor');

Route::resource('editorial', 'editorialController')->names('editorial');
Route::get('listEditorial', 'editorialController@listEditorial');

Route::resource('categoria', 'categorialibroController')->names('categoria');
Route::get('listCategoria', 'categorialibroController@listCategoria');



//Route::post('/libro', 'libroValidationController@store' );
Route::get('/libros', 'libroController@index' )->name('libros.index');
Route::get('/libros/create', 'libroController@create' )->name('libros.create');
Route::get('/libros/{libros}/edit', 'libroController@edit' )->name('libros.edit');
Route::patch('/libros/{libros}', 'libroController@update' )->name('libros.update');
Route::post('/libros', 'libroController@store' )->name('libros.store');
//Route::patch('/libros/create', 'libroController@store' )->name('libros.store');
Route::get('/libros/{libros}', 'libroController@show' )->name('libros.show');
Route::delete('/libros/{libros}', 'libroController@destroy' )->name('libros.destroy');


// Route::get('/usuario', 'personaController@index')->name('persona.index');
// Route::get('/persona/create','personaController@create')->name('persona.create');
// Route::get('/persona/{personaitem}/edit','personaController@edit')->name('persona.edit');
// Route::patch('/persona/{personaitem}','personaController@update')->name('persona.update');
// Route::post('/persona/create', 'personaController@store' )->name('persona.store');
// Route::delete('/persona/{personaitem}', 'personaController@destroy')->name('persona.destroy');

Route::resource('persona', 'personaController')->names('persona');

Route::resource('prestamo', 'prestamoController');
Route::get('listPersona', 'personaController@listPersona');

// Route::view('/prestamo', 'prestamo')->name('prestamo');
// Route::post('/prestamo', 'prestamoValidationController@store' );

/* INSERT INTO persona (ci, nombre, direccion, telefono, correo, fechaNacimiento, paisNacimiento)
VALUES (12648902, 'Juan Alberto Zarraga Torrico', 'Av Segunda Circunvalacion #0260', 76917812, 'zarraga555@gmail.com', '1996-11-15', 'Argentina'); */

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
