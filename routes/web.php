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
Route::resource('employee','EmployeeController',['names'=>'employee'])->middleware('auth');
Route::resource('companie','CompanieController',['names'=>'companie'])->middleware('auth');;

Route::get('employee/export/pdf/{companie}', 'CompanieController@print')->name('employee.print')->middleware('auth');;
Route::post('employee/import/excel/', 'EmployeeController@import')->name('employee.import')->middleware('auth');;
Route::get('dataforselect2', 'CompanieController@select2')->name('dataforselect2')->middleware('auth');;