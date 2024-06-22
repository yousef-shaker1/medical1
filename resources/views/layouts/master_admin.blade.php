<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.main-css')
    <title>@yield('title')</title>
</head>
<body>
  @include('admin.nav')
  @yield('content')
  @include('layouts.main-script')
  </body>
</html> 