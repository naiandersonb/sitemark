<?php

namespace App\Models;

use App\Stream;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'stream', 'url', 'image'])]
class Link extends Model
{


   /** @use HasFactory<\Database\Factories\LinkFactory> */
   use HasFactory;

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   protected function casts(): array
   {
      return ['stream' => Stream::class];
   }
}
