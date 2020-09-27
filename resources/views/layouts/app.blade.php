<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <section class="px-8">
       <header class="container mx-auto">
         tweety logo
       </header>
     </section>
     <section class="px-8">
        <main class="mx-auto">
          dashboard
          <div class="lg:flex">
          <div  class="w-1/6">
            @auth
         @include('sidebar-links')
         @endauth
          </div>

          <div class="lg:flex-1 lg:mx-10">

@yield('content')



          </div>
          <div class="lg:w-1/6">
            @include('friends-list')
          </div>
          </div>
        </main>
      </section>
    </div>

    <script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
