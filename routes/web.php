<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersApiController;

Route::get('/monitorrobot', [UsersApiController::class, 'index']);
Route::get('/monitorrobot/create', [UsersApiController::class, 'create']);
Route::post('/monitorrobot/store', [UsersApiController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
