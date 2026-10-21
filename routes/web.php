<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
   Route::get("/logout", LogoutController::class)->name("logout");
   Route::get("/", HomepageController::class)->name("homepage");

   Route::get("/links/create", [LinkController::class, "index"])->name("links.create");

   Route::post("/links/create", [LinkController::class, "create"]);
});
