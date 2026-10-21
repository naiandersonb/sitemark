<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="h-full" data-theme="sunset">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

   <link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
   <link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

   <title>{{ config('app.name') }}</title>

   @vite('resources/css/app.css')
</head>

<body class="font-onest">
   {{ $slot }}
</body>

</html>