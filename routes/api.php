<?php

use App\Http\Controllers\LoginController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return new UserResource($request->user());

    // Or, equivalently:
    //
    // return new UserResource(Auth::user());
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'authenticate']);
