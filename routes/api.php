<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CarController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function(){

    Route::post('register', 'register');
    Route::post('login', 'login');

});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('car', CarController::class);

    Route::post('/addCar', [UserController::class, 'addCar'])->name('car.addCar');
    Route::get('/listCar', [UserController::class, 'listCar'])->name('car.listCar');
    Route::get('/listCarBrand', [UserController::class, 'listCarBrand'])->name('car.listCarBrand');
    Route::get('/listFuelType', [UserController::class, 'listFuelType'])->name('car.listFuelType');

    Route::post('/addEarning', [UserController::class, 'addEarning'])->name('car.addEarning');


});
