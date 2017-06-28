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
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/update', 'ProfileController@update');

Route::get('/personagens', 'CharacterController@index');
Route::get('/personagem/{external_id}', 'CharacterController@visualize');
Route::get('/personagem/create', 'CharacterController@create');

Route::get('/events', 'EventsController@index');
Route::get('/events/new', 'EventsController@addNew');
Route::get('/events/edit/{external_id}', 'EventsController@edit');
Route::get('/events/update/{external_id}', 'EventsController@update');
Route::get('/events/delete/{external_id}', 'EventsController@delete');
Route::post('/events/save', 'EventsController@save');

Route::get('/characteristics', 'CharacteristicsController@index');
Route::get('/characteristics/new', 'CharacteristicsController@addNew');
Route::get('/characteristics/edit/{external_id}', 'CharacteristicsController@edit');
Route::get('/characteristics/update/{external_id}', 'CharacteristicsController@update');
Route::get('/characteristics/delete/{external_id}', 'CharacteristicsController@delete');
Route::post('/characteristics/save', 'CharacteristicsController@save');

Route::get('/characters', 'CharactersController@index');
Route::get('/characters/new', 'CharactersController@addNew');
Route::get('/characters/edit/{external_id}', 'CharactersController@edit');
Route::post('/characters/update', 'CharactersController@update');
Route::get('/characters/delete/{external_id}', 'CharactersController@delete');
Route::post('/characters/save', 'CharactersController@save');
Route::get('/characters/ficha/{external_id}', 'CharactersController@sheet');

Route::post('/comment/add','CommentsController@save');