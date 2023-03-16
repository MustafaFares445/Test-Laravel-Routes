<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/user/{name}', [\App\Http\Controllers\UserController::class, 'show']);

Route::view('/about', 'pages.about')->name('about');

Route::redirect('log-in', 'login');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'app'] , function (){
        Route::get('dashboard', [\App\Http\Controllers\DashboardController::class])->name('dashboard');


        Route::resource('/tasks', "TaskController");

    });

Route::group(['prefix' => 'admin' , 'middleware' => ' its_admin'] , function (){

Route::get('/dashboard' , [\App\Http\Controllers\DashboardController::class]);


Route::get('/stats' , [\App\Http\Controllers\Admin\StatsController::class]);

    });

});
require __DIR__ . '/auth.php';
