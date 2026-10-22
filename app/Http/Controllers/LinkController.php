<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\EditLinkRequest;
use App\Models\Link;
use App\Models\User;
use App\Stream;
use Illuminate\Http\RedirectResponse;
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
      if ($request->tryToCreateLink()) {
         return to_route("homepage");
      }

      return back()->with(["message" => "falha ao criar o link"]);
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Link $link)
   {
      return view("links.edit", [
         "link" => $link,
         "streams" => Stream::cases()
      ]);
   }

   public function update(EditLinkRequest $request, Link $link)
   {
      $link->fill($request->validated())->save();
      return to_route("homepage")->with("message", "Link alterado com sucesso");
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Link $link)
   {
      $link->delete();
      return back()->with(["message" => "O link foi deletado"]);
   }

   public function up(Link $link): RedirectResponse
   {
      return $this->moveLink($link, -1);
   }

   public function down(Link $link): RedirectResponse
   {
      return $this->moveLink($link, 1);
   }

   private function moveLink(Link $link, int $offset): RedirectResponse
   {
      /**
       * @var User $user
       */
      $user = auth()->user();

      abort_unless($link->user()->is($user), 404);

      $user->moveLink($link, $offset);

      return back();
   }
}
