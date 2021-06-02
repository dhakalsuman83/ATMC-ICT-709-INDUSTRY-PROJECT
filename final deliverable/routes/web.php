<?php

use Illuminate\Support\Facades\Route;
//use Controllers\StudentController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentHomeController;
use App\Http\Controllers\BookController;


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
//Route::get('student', function () {
  //  return view('student');
//});
//Route::get('/admin_dashboard', function () {
  //  return view('admin_dashboard');
//});

  

Route::get('/', function () {
  return view('welcome');
});







  Route::get('/admin_dashboard', [ AdminController::class, 'index']);
  Route::post('/admin_dashboard', [ AdminController::class, 'create']);
  

/*
  Route::get('/login',['uses' => 'MainController@index']);
  Route::get('/studenthome', function () {
    return view('studenthome');
  });*/ 
  Route::get('/changepassword', [UserController::class, 'index']);
  Route::post('/login', [ MainController::class, 'checklogin']);
  Route::get('/student', [UserController::class, 'index']);
  Route::post('/student',[UserController::class, 'store']);
  Route::get('/student/delete/{id}',[UserController::class, 'destroy']);
  Route::get('/student/edit/{id}',[UserController::class, 'show']);
  Route::post('/student/update/{id}',[UserController::class, 'update']);
  Route::get('/student/view/{id}', [UserController::class, 'view']);
  
  Route::get('/course', [CourseController::class, 'index']);
  Route::post('/course',[CourseController::class, 'store']);
  Route::get('/course/delete/{id}',[CourseController::class, 'destroy']);
  Route::get('/course/edit/{id}',[CourseController::class, 'show']);
  Route::post('/course/update/{id}',[CourseController::class, 'update']);

  Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/")
      ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
  });

  Route::get('/room', [RoomController::class, 'index']);
  Route::post('/room',[RoomController::class, 'store']);
  Route::get('/room/delete/{id}',[RoomController::class, 'destroy']);
  Route::get('/room/edit/{id}',[RoomController::class, 'show']);
  Route::post('/room/update/{id}',[RoomController::class, 'update']);
  Route::get('/room/view/{id}', [RoomController::class, 'view']);

  Route::get('/studenthome', [ StudentHomeController::class, 'index']);
  Route::get('studenthome/roomview/{id}',[ StudentHomeController::class, 'show']);

  Route::post('studenthome/roomview/bookroom/{id}', [BookController::class, 'store']);
  Route::get('/mybooking/{id}', [BookController::class, 'show']);
  Route::get('/booking', [BookController::class, 'index']);
  Route::get('/booking/delete/{id}',[BookController::class, 'destroy']);
 // Route::get('/booking/edit/{id}',[BookController::class, 'show']);
  Route::post('/booking/update/{id}',[BookController::class, 'update']);

  
  Route::post('/change/{id}',[UserController::class, 'changepass']);
  