<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ request()->routeIs('administrador*')?'Administracion':'' }}
        {{ request()->routeIs('almacen*')?'Almacen':'' }}
        {{ request()->routeIs('compras*')?'Compras':'' }}
        {{ request()->routeIs('ventas*')?'Ventas':'' }}
        {{ request()->routeIs('usuarios*')?'Usuarios':'' }}
        {{ request()->routeIs('login*')?'Login':'' }}
    </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('estilos')
    
</head>
<body>
    <header>@include('partials/navbar')</header>
    <body>@yield('contenido')</body>
</body>
</html>