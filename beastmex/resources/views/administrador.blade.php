@extends('layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/administrador.css') }}">
@endsection

@section('contenido')
    
    <h1 class="titulo">Administrador</h1>

    <div class="d-flex justify-content-between">
        <div class="col-sm-6 align-content-end">
            <canvas id="myChart"></canvas>
        </div>
    
        <div class="col-sm-6 align-content-center">
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Cantidad vendidos',
                data: @json($data),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Cantidad vendidos',
                data: @json($data),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });


    </script>
@endsection