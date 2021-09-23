<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\AdminController;
//use App\Http\Controllers\UserAllController;

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

Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminweb.adminHome')->middleware('is_admin');
Route::get('/committee/home', [HomeController::class, 'committeeHome'])->name('committeeweb.committeeHome')->middleware('is_admin');
Route::get('/student/home', [HomeController::class, 'studentHome'])->name('studentweb.studentHome')->middleware('is_admin');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('admin/home','HomeController@adminHome')->name('admin.home')->middleware('is_admin');
