<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
   /**
    * Register any application services.
    */
   public function register(): void
   {
      //
   }

   /**
    * Bootstrap any application services.
    */
   public function boot(): void
   {
      Model::unguard();

      Password::defaults(function () {
         $rule = Password::min(8);

         return $this->app->environment('production')
            ? $rule->max(256)->letters()->mixedCase()->numbers()->symbols()->uncompromised()
            : $rule;
      });

   }
}
