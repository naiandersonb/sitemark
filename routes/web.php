<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware("guest")->group(function () {
   Route::get("/login", [LoginController::class, "index"])->name("login");
   Route::post("/login", [LoginController::class, "login"]);

   Route::get("/register", [RegisterController::class, "index"])->name("register");
   Route::post("/register", [RegisterController::class, "register"]);
});

Route::middleware("auth")->group(function () {
   Route::get("/logout", LogoutController::class)->name("logout");
   Route::get("/", HomepageController::class)->name("homepage");

   Route::get("/links/create", [LinkController::class, "create"])->name("links.create");
   Route::post("/links/create", [LinkController::class, "store"]);
   Route::delete("/links/{link}", [LinkController::class, "destroy"])->name("links.destroy");
});
