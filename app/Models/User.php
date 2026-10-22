<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
   /** @use HasFactory<UserFactory> */
   use HasFactory, Notifiable;

   /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
   protected function casts(): array
   {
      return [
         'email_verified_at' => 'datetime',
         'password' => 'hashed',
      ];
   }

   public function links()
   {
      return $this->hasMany(Link::class);
   }

   /**
    * Swap the link with the one $offset positions away and renumber every link sequentially,
    * so duplicated or skipped sort values left by older records are fixed along the way.
    */
   public function moveLink(Link $link, int $offset): void
   {
      $links = $this->links()->orderBy('sort')->orderBy('id')->get();

      $currentIndex = $links->search(fn (Link $item) => $item->is($link));
      $targetIndex = $currentIndex + $offset;

      if ($currentIndex === false || ! $links->has($targetIndex)) {
         return;
      }

      [$links[$currentIndex], $links[$targetIndex]] = [$links[$targetIndex], $links[$currentIndex]];

      DB::transaction(function () use ($links) {
         $links->each(fn (Link $item, int $position) => $item->update(['sort' => $position]));
      });
   }
}
