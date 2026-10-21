<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function index()
   {
      return view("auth.login");
   }

   public function login(LoginRequest $request)
   {
      if ($request->attempt()) {
         return view("homepage");
      }
      ;

      return back()->with(["message" => "Crendenciais inválidas"]);
   }
}
