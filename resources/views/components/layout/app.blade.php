<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="h-full" data-theme="sunset">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

   {{-- phosphor icons --}}
   <link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
   <link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
   {{-- --- --}}

   <link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
   <link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

   <title>{{ config('app.name') }}</title>

   @vite('resources/css/app.css')
</head>

<body class="font-onest">
   <header class="w-full p-4 h-24 flex items-center justify-center">
      <img src="{{ asset('images/logo.svg') }}" alt="background">
   </header>

   <main class="max-w-5xl w-full mx-auto p-4">
      {{ $slot }}
   </main>

   <footer class="fixed bottom-2 left-0 right-0 p-4 flex items-center justify-center z-50">
      <div
         class="border border-neutral-700/50 rounded-full p-2 backdrop-blur-sm bg-neutral-900/40 shadow-lg flex gap-2">
         <a href="{{ route('homepage') }}">
            <button class="btn btn-circle btn-primary">
               <i class="ph ph-list-bullets"></i>
            </button>
         </a>

         <a href="">
            <button class="btn btn-circle btn-ghost">
               <i class="ph ph-user"></i>
            </button>
         </a>

         <a href="{{ route('logout') }}">
            <button class="btn btn-circle btn-ghost">
               <i class="ph ph-sign-out"></i>
            </button>
         </a>
      </div>
   </footer>
</body>

</html>