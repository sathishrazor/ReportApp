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
Route::resource('clients', 'ClientsController');
Route::resource('projects', 'ProjectsController');
Route::resource('owners', 'OwnersController');
Route::resource('technicians', 'TechniciansController');
/*
|--------------------------------------------------------------------------
| Datatable Routes
|--------------------------------------------------------------------------
*/
Route::get('/datatable/rtreport/index','RTReportController@loadData')->name("rtreport.get");
Route::get('/datatable/owners/index','OwnersController@loadData')->name("owners.get");
Route::get('/datatable/clients/index','ClientsController@loadData')->name("clients.get");
Route::get('/datatable/projects/index','ProjectsController@loadData')->name("projects.get");
Route::get('/datatable/technicians/index','TechniciansController@loadData')->name("technicians.get");
Route::get('/datatable/picklist/index','PickListController@loadData')->name("picklist.get");
