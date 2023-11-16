<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Real de Plateros')</title>


</head>
    <style>

    </style>
<body class="antialiased bg-zinc-900">

@include('layouts.navigation')
@yield('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

</body>
</html>