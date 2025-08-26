<?php

use Illuminate\Support\Facades\Route;

// controller are here
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;

// midlewares
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\ValidAuthMiddleware;

// all the views are here

Route::view("/login", 'login')->name("login");
Route::view("/register", "register")->name("register");
Route::view("/forget-password", "forgetPassword")->name("forget_password");


// auth controller
Route::controller(AuthenticationController::class)->group(function () {
    Route::post("/login-form", 'login_form');
    Route::post("/register-form", 'register_form');
    Route::put("/forget-password-form", "forget_password_form");
    Route::delete("/logout", "logout")->name("logout");
});

// admin controller
Route::controller(AdminController::class)->middleware(ValidAuthMiddleware::class)->group(function () {
    Route::view("/", "index")->name("home");
});

