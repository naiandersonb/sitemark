<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   public function index()
   {
      return view("auth.register");
   }

   public function register(RegisterRequest $request)
   {

      if ($request->tryToRegister()) {
         return view("homepage");
      }
      return back()->with(["message" => ["Ops! Parece que não conseguimos criar sua conta! Tente novamente"]]);
   }
}
