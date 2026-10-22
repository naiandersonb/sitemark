<?php

namespace App;

enum Stream: string
{
   case PrimeVideo = 'prime_video';
   case HboMax = 'hbo_max';
   case Netflix = 'netflix';
   case AppleTv = 'apple_tv';
   case Paramount = 'paramound';

   public function label(): string
   {
      return match ($this) {
         self::PrimeVideo => 'Prime Video',
         self::HboMax => 'HBO Max',
         self::Netflix => 'Netflix',
         self::AppleTv => 'Apple TV',
         self::Paramount => 'Paramount+',
      };
   }
}
