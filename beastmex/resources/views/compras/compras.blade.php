@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/compras.css') }}">
@endsection

@section('contenido')


<h1 class="titulo">Compras</h1>

<!-- <div class="consultar"> 
    <h3> Consultar productos disponibles</h3>
</div>

<div class="buscar-producto">
    <div class="col-sm-8 me-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Productos disponibles" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </form>
    </div> -->

</div>
<div class="titulo-compras">
<h3> Registro compras generadas</h3>
</div>
<div class="mt-3 card mb-5" style="width: 60rem; margin-left: auto; margin-right: auto; border: none !important">
<form>
  <div class="mb-2">
    <div class="mb-5 mt-3">
    <label for="exampleInputEmail1" class="form-label mb-3 "style="margin-left: 30px; margin-right: 30px">Proveedor</label>
    <input type="text" class="form-control mb-3" value="" name="">
  </div>
  <div class="mb-2">
    <div class="mb-5 mt-3">
    <label for="exampleInputEmail1" class="form-label mb-3 "style="margin-left: 20px; margin-right: 20px">Producto</label>
    <input type="text" class="form-control mb-3" value="" name="">
  </div>
  <div class="mb-5 mt-3">
    <label for="exampleInputEmail1" class="form-label mb-3 "style="margin-left: 20px; margin-right: 20px">Cantidad</label>
    <input type="text" class="form-control mb-3" value="" name="">
  </div>
  <div class="mb-5 mt-3">
    <label for="exampleInputEmail1" class="form-label mb-3 "style="margin-left: 20px; margin-right: 20px">Número de Serie</label>
    <input type="text" class="form-control mb-3" value="" name="">
  </div>
  <button type="submit" class="btn btn-secondary me-5">Submit</button>
</form>

<!--     <footer>
    <div class="col-sm-4 d-grid gap-2 me-5" style="margin-left: 20px; margin-right: 20px;" >
        <a href="#" class="btn btn-secondary mb-5"><i class="imprimir"></i> Imprimir lista de productos almacenados</a>
    </div>
    </footer> -->

@endsection