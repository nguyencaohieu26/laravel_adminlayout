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
//Create router for admin
Route::get('admin/dashboard',function (){
   return view('admin.index');
})->name('home.index');

//Create router for manage user
Route::resource('admin/accounts',\App\Http\Controllers\AccountController::class);

//Create router for manage roles
Route::resource('admin/roles',\App\Http\Controllers\RolesController::class);

//Create router for manage functions
Route::resource('admin/functions',\App\Http\Controllers\FunctionsController::class);

//Create router for mange role user
Route::resource('user_role',\App\Http\Controllers\RoleUserController::class);
