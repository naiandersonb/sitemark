<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $streams = [
         "prime_video" => "Prime video",
         "hbo_max" => "HBO Max",
         "netflix" => "Netflix",
         "apple_tv" => "Apple TV",
         "paramound" => "Paramound"
      ];

      return view("links.create", compact("streams"));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      return back();
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    */
   public function show(Link $link)
   {
      //
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
      //
   }
}
