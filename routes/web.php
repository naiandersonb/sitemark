<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware("guest")->group(function () {
   Route::get("/login", [LoginController::class, "index"])->name("login");
   Route::post("/login", [LoginController::class, "login"]);

   Route::get("/register", fn() => "registrar")->name("register");
   Route::post("/register", fn() => "registrar");
});

Route::middleware("auth")->group(function () {
   Route::get("/", HomepageController::class)->name("homepage");
});
