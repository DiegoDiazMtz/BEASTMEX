@extends('layouts/plantilla')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/administrador.css') }}">
@endsection

@section('contenido')

    <h1 class="titulo">Administrador</h1>

    <div class="row graficas">
        @for ($i = 1; $i <= 8; $i++)
            <div class="col-md-6 grafica">
                <canvas id="myChart{{ $i }}"></canvas>
            </div>
        @endfor
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var backgroundColors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 255, 0, 0.2)',
            'rgba(0, 255, 0, 0.2)',
            'rgba(0, 0, 255, 0.2)',
            'rgba(255, 0, 255, 0.2)',
            'rgba(128, 128, 128, 0.2)',
            'rgba(255, 165, 0, 0.2)',
            'rgba(0, 128, 128, 0.2)'
            // Agrega más colores según sea necesario
        ];
        @for ($i = 1; $i <= 8; $i++)
            var ctx{{ $i }} = document.getElementById('myChart{{ $i }}').getContext('2d');
            var myChart{{ $i }} = new Chart(ctx{{ $i }}, {
                type: 'bar',  // Cambia el tipo de gráfico según tus necesidades
                data: {
                    labels: @json($data->pluck('nombre_producto')),
                    datasets: [{
                        label: 'Cantidad vendidos',
                        data: @json($data->pluck('cantidad')),
                        
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(255, 255, 0, 0.4)',
                            'rgba(0, 255, 0, 0.4)',
                            'rgba(0, 0, 255, 0.4)',
                            'rgba(255, 0, 255, 0.4)',
                            'rgba(128, 128, 128, 0.4)',
                            'rgba(255, 165, 0, 0.4)',
                            'rgba(0, 128, 128, 0.4)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 255, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)',
                            'rgba(255, 165, 0, 1)',
                            'rgba(0, 128, 128, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y'
                }
            });
        @endfor
    </script>
@endsection
