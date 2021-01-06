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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view-kategori/{kategori_art}', 'ArtikelController@getkategori');
Route::get('/add-article', 'ArtikelController@getFormArtikel')->name('add-article');
Route::post('/add-article', 'ArtikelController@setFormArtikel')->name('add-article');
Route::get('/edit-article/{id_art}', 'ArtikelController@editFormArtikel')->name('edit-article');
Route::post('/update-article/{id_art}', 'ArtikelController@updateFormArtikel')->name('update-article');
Route::get('/delete-article/{id_art}', 'ArtikelController@deleteArtikel');