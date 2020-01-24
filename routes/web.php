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
	if(Auth::check()){
		return view('dashboard');
	}else{
		$products = App\Product::where('status','1')->paginate(8);
		return view('home', compact('products'));
	}
});
Route::post('buscar-producto', 'PageController@search')->name('search');
Route::get('categoria/{cat}', 'PageController@categories')->name('category');
Route::get('acerca-de-nosotros', 'PageController@about')->name('about');
Route::get('contacto', 'PageController@contact')->name('contact');
Route::post('contacto-envio', 'PageController@sendcontact')->name('sendcontact');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'HomeController@index')->name('home');
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

	Route::get('users/{user}/change', 'UserController@changePassword')->name('users.password')
			->middleware('permission:users.edit');

	Route::put('users/{user}/password', 'UserController@passwordupdate')->name('users.passwordupdate')
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

	//materials
	Route::post('materials/store', 'MaterialController@store')->name('materials.store')
			->middleware('permission:materials.create');

	Route::get('materials', 'MaterialController@index')->name('materials.index')
			->middleware('permission:materials.index');

	Route::post('materials', 'MaterialController@index')->name('materials.index')
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

	Route::get('materialst', 'MaterialController@materialST')->name('materials.materialst')
			->middleware('permission:materials.materialst');

	//category materials
	Route::post('typemats/store', 'TypematController@store')->name('typemats.store')
			->middleware('permission:typemats.create');

	Route::get('typemats', 'TypematController@index')->name('typemats.index')
			->middleware('permission:typemats.index');

	Route::post('typemats', 'TypematController@index')->name('typemats.index')
			->middleware('permission:typemats.index');

	Route::get('typemats/create', 'TypematController@create')->name('typemats.create')
			->middleware('permission:typemats.create');

	Route::get('typemats/{typemat}', 'TypematController@show')->name('typemats.show')
			->middleware('permission:typemats.show');

	Route::get('typemats/{typemat}/edit', 'TypematController@edit')->name('typemats.edit')
			->middleware('permission:typemats.edit');

	Route::put('typemats/{typemat}', 'TypematController@update')->name('typemats.update')
			->middleware('permission:typemats.edit');

	Route::delete('typemats/{typemat}', 'TypematController@destroy')->name('typemats.destroy')
			->middleware('permission:typemats.destroy');

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

	//standards
	Route::get('standards', 'OrderpController@indexStandard')->name('standards.index')
			->middleware('permission:standards.index');

	Route::get('standards/{orderp}/create', 'OrderpController@createStandard')->name('standards.create')
			->middleware('permission:standards.create');

	Route::put('standards/{orderp}/store', 'OrderpController@storeStandard')->name('standards.store')
			->middleware('permission:standards.create');

	Route::get('standards/{orderp}/edit', 'OrderpController@editStandard')->name('standards.edit')
			->middleware('permission:standards.edit');

	Route::put('standards/{orderp}', 'OrderpController@updateStandard')->name('standards.update')
			->middleware('permission:standards.edit');

	Route::get('standards/{orderp}', 'OrderpController@showStandard')->name('standards.show')
			->middleware('permission:standards.show');

	//Route::delete('standards/{orderp}', 'OrderpController@destroy')->name('standards.destroy')
			//->middleware('permission:standards.destroy');
	

	//buyorder_material
	Route::get('buyorder_material/{buyorder}/create', 'BuyorderController@createBuyorder_material')->name('buyorder_material.create')
			->middleware('permission:buyorder_material.create');

	Route::post('buyorder_material/{buyorder}/store', 'BuyorderController@storeBuyorder_material')->name('buyorder_material.store')
			->middleware('permission:buyorder_material.create');

	Route::get('buyorder_material', 'BuyorderController@indexBuyorder_material')->name('buyorder_material.index')
			->middleware('permission:buyorder_material.index');

	Route::get('buyorder_material/{buyorder}/edit', 'BuyorderController@editBuyorder_material')->name('buyorder_material.edit')
			->middleware('permission:buyorder_material.edit');

	Route::put('buyorder_material/{buyorder}', 'BuyorderController@updateBuyorder_material')->name('buyorder_material.update')
			->middleware('permission:buyorder_material.edit');

	Route::get('buyorder_material/{buyorder}', 'BuyorderController@showBuyorder_material')->name('buyorder_material.show')
			->middleware('permission:buyorder_material.show');

	Route::get('buyorder-export-pdf/{buyorder}', 'BuyorderController@exportPDF')->name('buyorder_material.exportpdf')
			->middleware('permission:buyorder_material.exportpdf');


	//Entrymp
	Route::get('entrymps', 'EntrympController@index')->name('entrymps.index')
			->middleware('permission:entrymps.index');

	Route::post('entrymps', 'EntrympController@index')->name('entrymps.index')
			->middleware('permission:entrymps.index');

	Route::get('entrymps/create', 'EntrympController@create')->name('entrymps.create')
			->middleware('permission:entrymps.create');

	Route::post('entrymps/store', 'EntrympController@store')->name('entrymps.store')
			->middleware('permission:entrymps.create');

	Route::get('entrymps/{entrymp}/edit', 'EntrympController@edit')->name('entrymps.edit')
			->middleware('permission:entrymps.edit');

	Route::put('entrymps/{entrymp}', 'EntrympController@update')->name('entrymps.update')
			->middleware('permission:entrymps.edit');

	Route::get('entrymps/{entrymp}', 'EntrympController@show')->name('entrymps.show')
			->middleware('permission:entrymps.show');

	Route::delete('entrymps/{entrymp}', 'EntrympController@destroy')->name('entrymps.destroy')
			->middleware('permission:entrymps.destroy');

	Route::get('entrymp-export-pdf/{entrymp}', 'EntrympController@exportPDF')->name('entrymps.exportpdf')
			->middleware('permission:entrymps.exportpdf');


	//Outputmp
	Route::get('outputmps', 'OutputmpController@index')->name('outputmps.index')
			->middleware('permission:outputmps.index');

	Route::post('outputmps', 'OutputmpController@index')->name('outputmps.index')
			->middleware('permission:outputmps.index');

	Route::get('outputmps/create', 'OutputmpController@create')->name('outputmps.create')
			->middleware('permission:outputmps.create');

	Route::post('outputmps/store', 'OutputmpController@store')->name('outputmps.store')
			->middleware('permission:outputmps.create');

	Route::get('outputmps/{outputmp}/edit', 'OutputmpController@edit')->name('outputmps.edit')
			->middleware('permission:outputmps.edit');

	Route::put('outputmps/{outputmp}', 'OutputmpController@update')->name('outputmps.update')
			->middleware('permission:outputmps.edit');

	Route::get('outputmps/{outputmp}', 'OutputmpController@show')->name('outputmps.show')
			->middleware('permission:outputmps.show');

	Route::delete('outputmps/{outputmp}', 'OutputmpController@destroy')->name('outputmps.destroy')
			->middleware('permission:outputmps.destroy');

	Route::get('outputmp-export-pdf/{outputmp}', 'OutputmpController@exportPDF')->name('outputmps.exportpdf')
			->middleware('permission:outputmps.exportpdf');


	//Devolutionmp
	Route::get('devolutionmps', 'DevolutionmpController@index')->name('devolutionmps.index')
			->middleware('permission:devolutionmps.index');

	Route::post('devolutionmps', 'DevolutionmpController@index')->name('devolutionmps.index')
			->middleware('permission:devolutionmps.index');

	Route::get('devolutionmps/create', 'DevolutionmpController@create')->name('devolutionmps.create')
			->middleware('permission:devolutionmps.create');

	Route::post('devolutionmps/store', 'DevolutionmpController@store')->name('devolutionmps.store')
			->middleware('permission:devolutionmps.create');

	Route::get('devolutionmps/{devolutionmp}/edit', 'DevolutionmpController@edit')->name('devolutionmps.edit')
			->middleware('permission:devolutionmps.edit');

	Route::put('devolutionmps/{devolutionmp}', 'DevolutionmpController@update')->name('devolutionmps.update')
			->middleware('permission:devolutionmps.edit');

	Route::get('devolutionmps/{devolutionmp}', 'DevolutionmpController@show')->name('devolutionmps.show')
			->middleware('permission:devolutionmps.show');

	Route::delete('devolutionmps/{devolutionmp}', 'DevolutionmpController@destroy')->name('devolutionmps.destroy')
			->middleware('permission:devolutionmps.destroy');

	Route::get('devolutionmp-export-pdf/{devolutionmp}', 'DevolutionmpController@exportPDF')->name('devolutionmps.exportpdf')
			->middleware('permission:devolutionmps.exportpdf');

});
