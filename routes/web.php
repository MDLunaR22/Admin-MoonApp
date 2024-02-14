<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'es'])) {
        abort(400);
    }

    App::setLocale($locale);

    session()->put('locale', $locale);

    return redirect()->back();
})->name('lang');

Route::get('/app/add/status', fn() => view('moonApp.status.add'))->middleware(['auth', 'check.rol:user'])->name('viewAddStatus');
Route::get('/app/add/customer', fn() => view('moonApp.customer.add'))->middleware(['auth', 'check.rol:user'])->name('viewAddCustomer');
Route::get('/app/add/users', fn() => view('moonApp.users.add', ['roles' => Role::all()]))->middleware(['auth', 'check.rol:user'])->name('viewAddUsers');

Route::controller(PackageController::class)->middleware('auth')->group(function () {
    Route::get('/app/packages', 'index')->name('viewPackages');
    Route::get('/app/add/package', 'create')->name('viewAddPackage');
    Route::get('/app/show/package/{id}', 'show')->name('showPackage');
    Route::post('/app/add/package', 'store')->name('addPackage');
    Route::put('/app/update/package/{id}', 'update')->name('updatePackage');
    Route::delete('/app/delete/package/{id}', 'destroy')->name('deletePackage');
});

Route::controller(CustomerController::class)->middleware(['auth'])->group(function () {
    Route::get('/app/customers', 'index')->name('viewCustomers');
    Route::get('/app/show/customer/{id}', 'show')->name('showCustomer');
    Route::post('/app/add/customer', 'store')->name('addCustomer');
    Route::put('/app/update/customer/{id}', 'update')->name('updateCustomer');
    Route::delete('/app/delete/customer/{id}', 'destroy')->name('deleteCustomer');
});

Route::controller(StatusController::class)->middleware(['auth', 'check.rol:user'])->group(function () {
    Route::get('/app/statuses', 'index')->name('viewStatuses');
    Route::get('/app/show/status/{id}', 'show')->name('showStatus');
    Route::post('/app/add/status', 'store')->name('addStatus');
    Route::put('/app/update/status/{id}', 'update')->name('updateStatus');
    Route::delete('/app/delete/status/{id}', 'destroy')->name('deleteStatus');
});

Route::controller(UserController::class)->middleware(['auth', 'check.rol:user'])->group(function () {
    Route::get('/app/users', 'index')->name('viewUsers');
    Route::get('/app/show/user/{id}', 'show')->name('showUser');
    Route::get('/app/assign/user', 'assignView')->name('assignUser');
    Route::post('/app/add/user', 'store')->name('addUser');
    Route::put('/app/update/user/{id}', 'update')->name('updateUsers');
    Route::delete('/app/delete/user/{id}', 'destroy')->name('deleteUser');
    Route::post('/app/assign/user', 'assign')->name('assignUser');

});

Route::controller(RoleController::class)->middleware(['auth', 'check.rol:user'])->group(function () {
    Route::get('/app/roles', 'index')->name('viewRoles');
    Route::get('app/add/role', 'create')->name('viewAddRole');
    Route::get('/app/show/role/{id}', 'show')->name('showRole');
    Route::post('/app/add/role', 'store')->name('addRole');
    Route::put('/app/update/role/{id}', 'update')->name('updateRole');
    Route::delete('/app/delete/role/{id}', 'destroy')->name('deleteRole');
});

Route::fallback(function () {
    return redirect('/');
});

