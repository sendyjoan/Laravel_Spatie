<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/superadmin', function(){
    return view('home');
})->middleware(['auth', 'role:Super Admin']);

Route::get('/admin', function(){
    return view('home');
})->middleware(['auth', 'role:Admin']);

Route::get('/user', function(){
    return view('home');
})->middleware(['auth', 'role:User']);

Route::group(['middleware' => ['auth', 'role:Super Admin']], function() {
    Route::resource('roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('admin.roles.permissions');
    Route::resource('permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roless', [PermissionController::class, 'assignRole'])->name('admin.permissions.roles');
});