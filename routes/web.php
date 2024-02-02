<?php

use App\Actions\Fortify\CreateNewUser;
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
    } else {
        return view('moonApp');
    }
})->name('home');

// Route::get('/app', [UserController::class, 'show'])->name('myInfo');

Route::get('/app/add/status', fn() => view('moonApp.status.add'))->middleware('auth')->name('viewAddStatus');
Route::get('/app/add/customer', fn() => view('moonApp.customer.add'))->middleware('auth')->name('viewAddCustomer');
Route::get('/app/add/users', fn() => view('moonApp.users.add'))->middleware('auth')->name('viewAddUsers');

Route::controller(PackageController::class)->middleware('auth')->group(function () {
    Route::get('/app/packages', 'index')->name('viewPackages');
    Route::get('/app/view/package', 'create')->name('viewAddPackage');
    Route::get('/app/show/package/{id}', 'show')->name('showPackage');
    Route::post('/app/add/package', 'store')->name('addPackage');
    Route::put('/app/update/package/{id}', 'update')->name('updatePackage');
    Route::delete('/app/delete/package/{id}', 'destroy')->name('deletePackage');
});

Route::controller(CustomerController::class)->middleware('auth')->group(function () {
    Route::get('/app/customers', 'index')->name('viewCustomers');
    Route::get('/app/show/customer/{id}', 'show')->name('showCustomer');
    Route::post('/app/add/customer', 'store')->name('addCustomer');
    Route::put('/app/update/customer/{id}', 'update')->name('updateCustomer');
    Route::delete('/app/delete/customer/{id}', 'destroy')->name('deleteCustomer');
});

Route::controller(StatusController::class)->middleware('auth')->group(function () {
    Route::get('/app/statuses', 'index')->name('viewStatuses');
    Route::get('/app/show/status/{id}', 'show')->name('showStatus');
    Route::post('/app/add/status', 'store')->name('addStatus');
    Route::put('/app/update/status/{id}', 'update')->name('updateStatus');
    Route::delete('/app/delete/status/{id}', 'destroy')->name('deleteStatus');
});

Route::controller(UserController::class)->middleware('auth')->group(function (){
    Route::get('/app/users', 'index')->name('viewUsers');
    Route::get('/app/show/user/{id}', 'show')->name('showUser');
    Route::post('/app/add/user', 'store')->name('addUser');
    Route::put('/app/update/user/{id}', 'update')->name('updateUsers');
    Route::delete('/app/delete/user/{id}', 'destroy')->name('deleteUser');
});

Route::fallback(function () {
    return redirect('/');
});

