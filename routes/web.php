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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test/{a}/{b}', 'ToDo\EditToDoController@isAcronym');


Route::group(['middleware' => ['auth', 'check.id'], 'namespace' => 'ToDo', 'prefix' => 'todo'], function () {
    Route::get('/edit/{id?}', 'EditToDoController@index')->name('showTodo');
//    Route::get('/test/{a}', 'EditToDoController@isAcronym');
    Route::post('/edit/apply/{id?}', 'EditToDoController@edit')->name('apply');
    Route::post('/trash', 'EditToDoController@trash')->name('trash');
});
