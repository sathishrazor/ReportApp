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
/*
|----------------------------------------------------------------------------------------
| Home Routes
|----------------------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index')->name('home');

/*
|----------------------------------------------------------------------------------------
| Profile Routes
|----------------------------------------------------------------------------------------
*/
Route::resource('Profile','ProfileController');
/*
|----------------------------------------------------------------------------------------
| Modules Routes
|----------------------------------------------------------------------------------------
*/

Route::resource('rtreport', 'RTReportController');
Route::resource('mptreport', 'MPTReportsController');
Route::resource('lptreport', 'LPTReportController');
Route::resource('utareport', 'UTAReportController');
Route::resource('utbreport', 'UTBReportController');
Route::resource('utcreport', 'UTCReportController');
Route::resource('utgtreport', 'UTGTReportController');
Route::resource('picklist', 'PickListController');
Route::resource('clients', 'ClientsController');
Route::resource('projects', 'ProjectsController');
Route::resource('owners', 'OwnersController');
Route::resource('employees', 'EmployeesController');
/*
|------------------------------------------------------------------------------------------
| Datatable Routes
|------------------------------------------------------------------------------------------
*/
Route::get('datatable/rtreport/index','RTReportController@loadData')->name("rtreport.datatable");

Route::get('datatable/mptreport/index', 'MPTReportsController@loadData')->name("mptreport.datatable");
Route::get('datatable/lptreport/index', 'LPTReportController@loadData')->name("lptreport.datatable");
Route::get('datatable/utareport/index', 'UTAReportController@loadData')->name("utareport.datatable");
Route::get('datatable/utbreport/index', 'UTBReportController@loadData')->name("utbreport.datatable");
Route::get('datatable/utcreport/index', 'UTCReportController@loadData')->name("utcreport.datatable");
Route::get('datatable/utgtreport/index','UTGTReportController@loadData')->name("utgtreport.datatable");

Route::get('/datatable/owners/index','OwnersController@loadData')->name("owners.datatable");
Route::get('datatable/clients/index','ClientsController@loadData')->name("clients.datatable");
Route::get('datatable/projects/index','ProjectsController@loadData')->name("projects.datatable");
Route::get('datatable/employees/index','EmployeesController@loadData')->name("employees.datatable");
Route::get('datatable/picklist/index','PickListController@loadData')->name("picklist.datatable");
/*
|------------------------------------------------------------------------------------------
| Form Helper Routes
|------------------------------------------------------------------------------------------
*/
Route::get('picklist/get/{id}', "PickListController@get");
Route::post('picklist/search',"PickListController@search")->name("PickList.search");
Route::post('userdata/history',"PickListController@record_history")->name("PickList.record_history");
Route::post('app/search',"PickListController@search_global")->name("PickList.search_global");

Route::get('form/owners',"OwnersController@get")->name("owners.get");
Route::get('form/employees',"EmployeesController@get")->name("employees.get");
Route::get('form/clients',"ClientsController@get")->name("clients.get");
Route::get('form/projects',"ProjectsController@get")->name("projects.get");
