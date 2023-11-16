<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Real de Plateros - @yield('title')</title>
     <meta name="description" content="@yield('meta-description', 'Default meta description')"/>
</head>
<body>
@include('partials.navigation')

@yield('content')

</body>
</html>