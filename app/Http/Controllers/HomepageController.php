<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
   /**
    * Handle the incoming request.
    */
   public function __invoke(Request $request)
   {
      //   /** @var User */
      //   $user = auth()->user();

      //   return view("dashboard", [
      //       "links" => $user->links()->orderBy("sort")->get()
      //   ]);
      return view("homepage");
   }
}
