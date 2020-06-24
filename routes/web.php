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

Route::get('/HolaMundo',function (){
    return view('holamundo');;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    
    //**********Rutas para productos
    // Route::get('/products', 'Catalogs\ProductsController@index');
    // Route::get('/products/add', 'Catalogs\ProductsController@add');
    // Route::get('/products/edit', 'Catalogs\ProductsController@edit');
    // Route::delete('/products/delete', 'Catalogs\ProductsController@delete');

    Route::resources([
        'products' => 'Catalogs\ProductsController'
    ]);
    
    Route::resources([
        'clients' => 'Catalogs\ClientsController'
    ]);
    
    Route::resources([
        'roles' => 'Catalogs\RolesController'
    ]);
    
    Route::resources([
        'permissions' => 'Catalogs\PermissionsController'
    ]);
    
    Route::resources([
        'rolepermissions' => 'Catalogs\RolePermissionsController'
    ]);

    Route::resources([
        'users' => 'Catalogs\UsersController'
    ]);

    Route::get('/users/{userId}/editPermissions','Catalogs\UsersController@editPermissions')->name('user.permission.edit');

    Route::put('/users/{userId}/updatePermissions','Catalogs\UsersController@savePermissions')->name('user.permission.update');

    Route::resources([
        'inventoryEntry' => 'InventoryEntryController'
    ]);

    Route::get('inventoryEntry/{id}', 'InventoryEntryController@show');

    
    
});

