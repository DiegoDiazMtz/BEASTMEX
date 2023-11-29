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
        type: 'doughnut',
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