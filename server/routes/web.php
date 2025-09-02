<?php

use Illuminate\Support\Facades\Route;

// controller are here
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\WriterController;

// midlewares
use App\Http\Middleware\ValidAuthMiddleware;

// all the views are here

Route::view("/login", 'login')->name("login");
Route::view("/register", "register")->name("register");
Route::view("/forget-password", "forgetPassword")->name("forget_password");


// auth routes
Route::controller(AuthenticationController::class)->group(function () {
    Route::post("/login-form", 'login_form');
    Route::post("/register-form", 'register_form');
    Route::put("/forget-password-form", "forget_password_form");
    Route::delete("/logout", "logout")->name("logout");
});

// admin routes
Route::controller(AdminController::class)->middleware([ValidAuthMiddleware::class, 'can:isAdmin'])->group(function () {
    // admin routes are here
    Route::get("/", "adminDashboard")->name("home");
});


// writer routes
Route::controller(WriterController::class)->middleware([ValidAuthMiddleware::class, 'can:isWriter'])->group(function () {

    Route::get("/writer/dashboard", 'writerDashboard')->name('writer.dashboard');

    // view and post route
    Route::view('/writer/add-blog', 'addBlog')->name('addblog');
    Route::post("/writer/add-blog-form", 'addBlogFrom')->name('addBlogForm');

    // get and post route for the update
    Route::get('/writer/{blogID}/update', 'udpateBlog')->name('update-blog');
    Route::put('/writer/{blogID}/update/{id}', 'updateBlogForm')->name('update-blog-form');
});



// employee routes are here
Route::controller(EmployeeController::class)->middleware([ValidAuthMiddleware::class, 'can:isEmployee'])->group(function () {

    // getting the info for table
    Route::get("/employee/dashboard", 'employeeDashboard')->name("employee.dashboard");

    // updating the status
    Route::put('/employee/dashboard/{id}', 'updateStatus')->name('employee.dashboard.update');
});


