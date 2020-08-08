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

Route::get('/picklist', 'PickListController@index');
Route::post('/picklist/create', 'PickListController@create');
Route::get('/picklist/create', 'PickListController@create');
Route::post('/picklist/edit/{id}', 'PickListController@edit');
Route::get('/picklist/edit/{id}', 'PickListController@edit');
Route::post('/picklist/dekete/{id}', 'PickListController@delete');
Route::get('/picklist/delete/{id}', 'PickListController@delete');


Route::resource('loadData', 'PicklistController@loadData');
Route::resource('Profile','ProfileController');
