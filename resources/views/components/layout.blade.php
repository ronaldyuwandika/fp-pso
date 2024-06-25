<!doctype html>
<html>
<head>
  @include('includes.head')
</head>
<body class="leading-normal tracking-normal text-white" style="font-family: 'Source Sans Pro', sans-serif;">
  <div class="">
    <header class="">
      {{-- @include('includes.header') --}}
    </header>
    <div id="main" class="row">
      <!-- main content -->
      @yield('content')
    </div>
    <footer class="row">
      {{-- @include('includes.footer') --}}
    </footer>
  </div>
</body>
</html>