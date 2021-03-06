<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAllController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
// use App\Http\Controllers\CommitteeController;


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
//Route::resource('/admin/users', UserAllController::class)->middleware('is_admin');
Route::resource('/admin/users', UserAllController::class) -> middleware('is_admin');
Route::resource('/admin/clubs', ClubController::class)->middleware('is_admin');
//Route::get('/admin/committee/approve/{id}', [UserAllController::class, 'approved'])->name('users.committee')->middleware('is_admin');

Route::get('/committee/home', [HomeController::class, 'committeeHome'])->name('committeeweb.committeeHome')->middleware('is_admin');
Route::resource('/committee/sharing', PostController::class)->middleware('is_admin');
Route::resource('/committee/event', EventController::class)->middleware('is_admin');
Route::get('/committee/event/participant/{id}', [UserAllController::class, 'show'])->name('events.detail')->middleware('is_admin');
Route::get('/committee/event/add/participant/attach/{id}', [UserAllController::class, 'attach'])->name('event.add.attach')->middleware('is_admin');
Route::get('/committee/event/participant/{eid}/detach/{uid}', [UserAllController::class, 'detach'])->name('event.detach')->middleware('is_admin');
Route::get('/committee/profile', [ClubController::class, 'profile'])->name('clubs.profile') ->middleware('is_admin');
Route::post('/committee/profile/{id}', [ClubController::class, 'saveprofile'])->name('clubs.saveprofile')->middleware('is_admin');
// Route::resource('/committee/users', CommitteeController::class)->middleware('is_admin');
// Route::get('/committee/student/approve/{id}', [CommitteeController::class, 'approved'])->name('users.student')->middleware('is_admin');

Route::get('/student/home', [HomeController::class, 'studentHome'])->name('studentweb.studentHome')->middleware('is_admin');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('admin/home','HomeController@adminHome')->name('admin.home')->middleware('is_admin');
