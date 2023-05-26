<!doctype html>

<html lang="{{ $lang ?? 'en' }}">

<head>

  @include('layouts.head')

</head>

<body>

  @yield('content')
      
  @include('layouts.footer')
  
  @yield('last-script')
  
</body>


</html>