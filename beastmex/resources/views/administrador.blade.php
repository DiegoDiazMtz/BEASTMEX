@extends('layouts/plantilla')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/administrador.css') }}">
@endsection

@section('titulo', 'Administracion')

@section('contenido')

    <h1 class="titulo">Administrador</h1>

    <div class="row graficas">
        @for ($i = 1; $i <= 2; $i++)
            <div class="col-md-6 grafica">
                <canvas id="myChart{{ $i }}"></canvas>
            </div>
        @endfor
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
            var ctx1 = document.getElementById('myChart1').getContext('2d');
            var myChart1 = new Chart(ctx1, {
                type: 'bar',  // Cambia el tipo de gráfico según tus necesidades
                data: {
                    labels: @json($data->pluck('nombre_producto')),
                    datasets: [
                        {
                        label: 'Cantidad en stock',
                        data: @json($data->pluck('cantidad')),
                        
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 255, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)',
                            'rgba(255, 165, 0, 1)',
                            'rgba(0, 128, 128, 1)'
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
                        },
                        {
                        label: 'Cantidad en stock',
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
                        },
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        
            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'bar',  // Cambia el tipo de gráfico según tus necesidades
                data: {
                    labels: @json($data->pluck('nombre_producto')),
                    datasets: [
                        {
                        label: 'Cantidad en stock',
                        data: @json($data->pluck('cantidad')),
                        
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 255, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)',
                            'rgba(128, 128, 128, 1)',
                            'rgba(255, 165, 0, 1)',
                            'rgba(0, 128, 128, 1)'
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
                        },
                        {
                        type: 'line',
                        label: 'Cantidad en stock',
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
                        },
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    /* indexAxis: 'y', */
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
    </script>

@endsection
