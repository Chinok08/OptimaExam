<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ModeloController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('add-user', [FormController::class, 'index']);
Route::post('user-form', [FormController::class, 'information']);

Route::get('edit-user/{id}', [FormController::class, 'update']);
Route::get('delete-user/{id}', [FormController::class, 'delete']);

Route::get('list-users', [TableController::class, 'index']);
Route::delete('user-form', [TableController::class, 'tableUsers']);

Route::get('list-models/{id}', [ModeloController::class, 'index']);
Route::get('auto/{id}', [ModeloController::class, 'auto']);
