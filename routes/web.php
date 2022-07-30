<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActivitController;
use App\Http\Controllers\MainController;

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

Route::group(['middleware'=>'auth'],function(){
  Route::get('panel',[Maincontroller::class,'dashboard'])->name('dashboard');
  Route::resource('myactivities',MainController::class);


});

Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'], function(){
  Route::get('activities/{id}',[ActivitController::class,'destroy'])->whereNumber('id')->name('activities.destroy');
  Route::resource('activities',ActivitController::class);
});
