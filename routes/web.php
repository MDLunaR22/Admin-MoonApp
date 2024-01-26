<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {

    $user = auth()->user();
    if ($user) {
        return view('moonApp', ['user' => $user]);
    }else {
        return view('moonApp');
    }
})->name('home');

// Route::get('/app', [UserController::class, 'show'])->name('myInfo');

Route::get('/app/add/status', fn() => view('moonApp.status.add'))->name('viewAddStatus');

Route::controller(PackageController::class)->group(function () {
    Route::get('/app/packages', 'index')->name('viewPackages');
    Route::post('/app/add/package', 'store')->name('addPackage');
    Route::get('/app/show/package/{id}', 'show')->name('showPackage');
    Route::put('/app/update/package/{id}', 'update')->name('updatePackage');
    Route::delete('/app/delete/package/{id}', 'destroy')->name('deletePackage');
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/app/customers', 'index')->name('viewCustomers');
    Route::post('/app/add/customer', 'store')->name('addCustomer');
    Route::get('/app/show/customer/{id}', 'show')->name('showCustomer');
    Route::put('/app/update/customer{id}', 'update')->name('updateCustomer');
    Route::delete('/app/delete/customer/{id}', 'destroy')->name('deleteCustomer');
});

Route::controller(StatusController::class)->group(function () {
    Route::get('/app/statuses', 'index')->name('viewStatuses');
    Route::post('/app/add/status', 'store')->name('addStatus');
    Route::get('/app/show/status{id}', 'show')->name('showStatus');
    Route::put('/app/update/{id}', 'update')->name('updateStatus');
    Route::delete('/app/delete/status/{id}', 'destroy')->name('deleteStatus');
});

