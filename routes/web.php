<?php

use App\PickList;
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
/*
|--------------------------------------------------------------------------
| PickList Routes
|--------------------------------------------------------------------------
*/
Route::get('/picklist', 'PickListController@index');
Route::get('/picklist/index', 'PickListController@index');
Route::post('/picklist/create', 'PickListController@create_confirm')->name("create_confirm");
Route::get('/picklist/create', 'PickListController@create');
Route::post('/picklist/edit/{id}', 'PickListController@edit');
Route::get('/picklist/edit/{id}', 'PickListController@edit');
Route::post('/picklist/delete/{id}', 'PickListController@delete');
Route::get('/picklist/delete/{id}', 'PickListController@delete');
Route::get('loaddata','PickListController@loadData')->name("loaddata.get");
Route::get('/picklist/get/{id}', function ($id) {
    return PickList::findOrFail($id)->options;
});
Route::post('/picklist/search',"PickListController@search")->name("PickList.search");
/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::resource('Profile','ProfileController');
/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::resource('rtreport', 'RTReportController');
