<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
}); 
Route::group(['middleware' => ['cors', 'json.response']], function () {
    
    Route::post('/login', [App\Http\Controllers\Auth\ApiAuthController::class,'login'])->name('login.api');
    Route::post('/register',[App\Http\Controllers\Auth\ApiAuthController::class,'register'])->name('register.api');

   
});



Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Auth\ApiAuthController::class,'logout'])->name('logout.api');
   
   
});