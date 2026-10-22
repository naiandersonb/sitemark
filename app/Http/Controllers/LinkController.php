<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Models\Link;
use App\Models\User;
use App\Stream;
use Illuminate\Http\Request;

class LinkController extends Controller
{
   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      return view("links.create", [
         "streams" => Stream::cases(),
      ]);
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(CreateLinkRequest $request)
   {
      /**
       * @var User $user
       */
      $user = auth()->user();

      $data = $request->validated();

      if ($file = $request->image) {
         $data["image"] = $file->store("images", "public");
      }

      $user->links()->create($data);

      return to_route("homepage");
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Link $link)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Link $link)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Link $link)
   {
      $link->delete();
      return back()->with(["message" => "O link foi deletado"]);
   }
}
