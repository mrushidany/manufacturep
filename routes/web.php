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
    return view('auth.login');
});

Auth::routes();

// Home Routes
Route::get('/app/dashboard', 'HomeController@index')->name('dashboard');

// Product Routes
Route::resource('/products/products_list','Products\ProductsController',['as'=>'products']);
Route::get('/products/list','Products\ProductsController@datatable')->name('products_datatable');


// Materials Routes
Route::resource('/basic_materials','Materials\Basic_materialsController');
Route::get('/basic_materials_list','Materials\Basic_materialsController@datatable')->name('materials_datatable');
Route::resource('/compound_materials','Materials\Compound_materialsController');
Route::get('/basic_compound_materials_list','Materials\Compound_materialsController@basic_compound_materials_datatable')->name('basic_compound_materials_datatable');
Route::resource('/semi_finished_compound_materials','Materials\Semi_finished_compound_materialsController');
Route::get('/semi_finished_compound_materials_list','Materials\Semi_finished_compound_materialsController@datatable')->name('semi_finished_compound_materials_datatable');

// Measurements Routes
Route::resource('/basic/basic_units_list','Measurements\Basic_unitsController',['as'=>'basic']);
Route::resource('compound/compound_units_list','Measurements\Compound_unitsController',['as'=>'compound']);
Route::get('/basic/list','Measurements\Basic_unitsController@datatable')->name('basic_units_datatable');
Route::get('/basic/units','Measurements\Compound_unitsController@findUnits')->name('basic_units_units');
Route::get('/compound/list','Measurements\Compound_unitsController@datatable')->name('compound_units_datatable');

