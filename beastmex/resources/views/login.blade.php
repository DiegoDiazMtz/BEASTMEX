<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    @if (session()->has('fail'))
    <script>
        const confirmacion = @json(session('fail'));
        Swal.fire({
            icon: 'error',
            title: confirmacion,
        });
    </script>
    {{ session()->forget('fail') }}
    @endif
    <div class="container">
        <div class="row"> 
            <div class="col-md-6"> 
                <div class="card"> 
                    <form method="POST" class="box" action="{{ route('login.login') }}"> 
                        @csrf
                        @method('POST')
                        <h1 titulo-login>Inicio de Sesión</h1> 
                        <p class="text-muted"> Ingrese su correo y su contraseña</p> 
                        <input type="text" name="correo" placeholder="{{ $errors->has('correo') ? $errors->first('correo') : 'Correo' }}" value="{{old('correo')}}"> 
                        <input type="password" name="contrasena" placeholder="{{ $errors->has('contrasena') ? $errors->first('contrasena') : 'Contraseña' }}"> 
                        <a class="forgot text-muted" href="{{route('login.edit')}}">¿Olvidaste la contraseña?</a> 
                        <input type="submit" value="Iniciar sesion"> 
                    </form> 
                </div> 
            </div> 
        </div>
    </div>
</body>
</html>