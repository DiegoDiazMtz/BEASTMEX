<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            /*  background-color: #333;*/
            color: white;
            padding: 10px;
        }

        header img {
            max-width: 100px; /* Ajusta el ancho según sea necesario */
            height: auto;
            margin-right: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ public_path('img/logo/logo.jpg') }}" alt="Logo BeastMex">
        <h1>BeastMex - Lista de Productos</h1>
        <hr style="border-top: 2px solid white;">
    </header>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Fecha de Registro</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultaProductos as $producto)
                <tr>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $producto->marca }}</td>
                    <td>${{ $producto->precio_venta }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->fecha_ingreso }}</td>
                    <td><img src="{{ public_path($producto->foto) }}" alt="Foto del producto" width="100"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
