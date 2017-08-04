<?php
// We need to show login/register forms
Auth::routes();
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

Route::get('/', 'IndexController@index');

Route::middleware(['auth', 'ismember'])->group(function() {
    // This route is used to add new vehicle
    Route::resource('/vehicles', 'VehicleController');

    // Route used to update Audi category
    Route::get('/audi', 'VehicleController@fetchAudi');

    /**
     * Admin routes
     */
    Route::middleware(['isadmin'])->group(function() {
        // Route used to access admin panel
        Route::get('/admin', 'AdminController@index');
        // Route used to add new category
        Route::post('/admin/add-category', 'AdminController@addCategory');
        // Route used to delete vehicle
        Route::get('/admin/delete', 'AdminController@deleteVehicle');
        // Route used to approve vehicle
        Route::get('/admin/approve', 'AdminController@approveVehicle');
    });
});

