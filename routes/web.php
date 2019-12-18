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

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function(){
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
			->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
			->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
			->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
			->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
			->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
			->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
			->middleware('permission:roles.edit');

	//Users
	Route::post('users/store', 'UserController@store')->name('users.store')
			->middleware('permission:users.create');

	Route::get('users', 'UserController@index')->name('users.index')
			->middleware('permission:users.index');

	Route::get('users/create', 'UserController@create')->name('users.create')
			->middleware('permission:users.create');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
			->middleware('permission:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
			->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
			->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
			->middleware('permission:users.edit');

	//products
	Route::post('products/store', 'ProductController@store')->name('products.store')
			->middleware('permission:products.create');

	Route::get('products', 'ProductController@index')->name('products.index')
			->middleware('permission:products.index');

	Route::post('products', 'ProductController@index')->name('products.index')
			->middleware('permission:products.index');

	Route::get('products/create', 'ProductController@create')->name('products.create')
			->middleware('permission:products.create');

	Route::put('products/{product}', 'ProductController@update')->name('products.update')
			->middleware('permission:products.edit');

	Route::get('products/{product}', 'ProductController@show')->name('products.show')
			->middleware('permission:products.show');

	Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
			->middleware('permission:products.destroy');

	Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
			->middleware('permission:products.edit');

	//category products
	Route::post('typepts/store', 'TypeptController@store')->name('typepts.store')
			->middleware('permission:typepts.create');

	Route::get('typepts', 'TypeptController@index')->name('typepts.index')
			->middleware('permission:typepts.index');

	Route::post('typepts', 'TypeptController@index')->name('typepts.index')
			->middleware('permission:typepts.index');

	Route::get('typepts/create', 'TypeptController@create')->name('typepts.create')
			->middleware('permission:typepts.create');

	Route::get('typepts/{typept}', 'TypeptController@show')->name('typepts.show')
			->middleware('permission:typepts.show');

	Route::get('typepts/{typept}/edit', 'TypeptController@edit')->name('typepts.edit')
			->middleware('permission:typepts.edit');

	Route::put('typepts/{typept}', 'TypeptController@update')->name('typepts.update')
			->middleware('permission:typepts.edit');

	Route::delete('typepts/{typept}', 'TypeptController@destroy')->name('typepts.destroy')
			->middleware('permission:typepts.destroy');

	//orderps
	Route::post('orderps/store', 'OrderpController@store')->name('orderps.store')
			->middleware('permission:orderps.create');

	Route::get('orderps', 'OrderpController@index')->name('orderps.index')
			->middleware('permission:orderps.index');

	Route::get('orderps/create', 'OrderpController@create')->name('orderps.create')
			->middleware('permission:orderps.create');

	Route::put('orderps/{orderp}', 'OrderpController@update')->name('orderps.update')
			->middleware('permission:orderps.edit');

	Route::get('orderps/{orderp}', 'OrderpController@show')->name('orderps.show')
			->middleware('permission:orderps.show');

	Route::delete('orderps/{orderp}', 'OrderpController@destroy')->name('orderps.destroy')
			->middleware('permission:orderps.destroy');

	Route::get('orderps/{orderp}/edit', 'OrderpController@edit')->name('orderps.edit')
			->middleware('permission:orderps.edit');

	//materials
	Route::post('materials/store', 'MaterialController@store')->name('materials.store')
			->middleware('permission:materials.create');

	Route::get('materials', 'MaterialController@index')->name('materials.index')
			->middleware('permission:materials.index');

	Route::get('materials/create', 'MaterialController@create')->name('materials.create')
			->middleware('permission:materials.create');

	Route::put('materials/{material}', 'MaterialController@update')->name('materials.update')
			->middleware('permission:materials.edit');

	Route::get('materials/{material}', 'MaterialController@show')->name('materials.show')
			->middleware('permission:materials.show');

	Route::delete('materials/{material}', 'MaterialController@destroy')->name('materials.destroy')
			->middleware('permission:materials.destroy');

	Route::get('materials/{material}/edit', 'MaterialController@edit')->name('materials.edit')
			->middleware('permission:materials.edit');
});
