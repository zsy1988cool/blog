<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel='stylesheet' href="/css/bootstrap.min.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/all.css" type='text/css' media='all'/>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
<div class="container">
    <section class="content">
        <div class="pad group">
            @yield('content')
        </div>
    </section>
</div>
</body>
</html>
