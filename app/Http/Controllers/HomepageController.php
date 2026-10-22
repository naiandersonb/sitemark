<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
   /**
    * Handle the incoming request.
    */
   public function __invoke(Request $request)
   {
      /** @var User */
      $user = auth()->user();

      return view("homepage", [
         "links" => $user->links()->orderBy("sort")->get() ?? []
      ]);
   }
}
