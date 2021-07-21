<html>
  <head>
      <title>App name - @yield('title')</title>
  </head>

  <body>
    @section('sidebar')
      This is the master sidebar
    @show

    <div class="container">
        @yield('content', View::make('bladelearn.backup'))
    </div>
  </body>
</html>
