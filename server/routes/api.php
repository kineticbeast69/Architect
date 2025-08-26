<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::post("/authenticate", [AuthenticationController::class, "Authenticate"]);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
