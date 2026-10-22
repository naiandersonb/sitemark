<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      /**
       * @var User $user
       */
      $user = auth()->user();

      return view("profile", compact("user"));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(EditProfileRequest $request)
   {
      /**
       * @var User $user
       */
      $user = auth()->user();

      $data = $request->validated();

      if ($file = $request->photo) {
         $data["photo"] = $file->store("images", "public");
      }

      $user->fill($data)->save();

      return back()->with(["message", "perfil atualizado com sucesso!"]);
   }
}
