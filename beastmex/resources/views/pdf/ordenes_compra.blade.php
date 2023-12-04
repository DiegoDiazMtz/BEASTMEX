<!DOCTYPE html>
<html>
<head>
    <title>Orden de Compra #{{ $ordenCompra->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .header img {
            width: 200px;
        }
        .header h1 {
            color: #333;
        }
        .orden {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }
        .orden h2 {
            color: #444;
            margin-bottom: 20px;
        }
        .orden p {
            color: #666;
        }
        .orden table {
            width: 100%;
            border-collapse: collapse;
        }
        .orden table, .orden th, .orden td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .orden th {
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/logo/logo.jpg') }}" alt="Logo BeastMex">
        <h1>Orden de Compra #{{ $ordenCompra->id }}</h1>
    </div>

    @foreach ($ordenCompra->productos as $producto)
        <div class="orden">
            <p>
                <strong>Producto:</strong> {{ $producto->nombre_producto }},
                <strong>Cantidad:</strong> {{ $producto->cantidad_producto }}
            </p>
        </div>
    @endforeach
</body>
</html>
