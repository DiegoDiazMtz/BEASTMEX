@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/ordenes.css') }}">

@endsection

@section('contenido')


<h3 class="titulo">Editar Orden de Compra</h3>
<div class="mt-1 card mb-5 form-group">
  <form>
      
    <div class="mb-4 ">
      <label for="exampleInputEmail1" class="form-label mt-4" >Nombre Empresa</label>
      <input type="text" class="form-control mt-1" value="" name="">
    </div>

    <div class="mb-4 mt-4">
      <label for="exampleInputEmail1" class="form-label mt-4">Poductos Requeridos</label>
      <input type="text" class="form-control mt-1" value="" name="">
    </div>

    <div class="mb-4 mt-4">
      <label for="exampleInputEmail1" class="form-label mt-4">Cantidad</label>
      <input type="text" class="form-control mt-1" value="" name="">
    </div>

    <div class="mb-5 mt-4">
      <label for="exampleInputEmail1" class="form-label mt-4">Numero de Serie</label>
      <input type="text" class="form-control mt-1" value="" name="">
    </div>

    <div class="botones gap-3 me-4 mt-3">
      <input type="submit" class="btn btn-primary col-sm-4" value="Guardar">
      <input type="submit" class="btn btn-primary col-sm-4" value="Enviar por e-mail">
      <input type="submit" class="btn btn-primary col-sm-4" value="Generar PDF">
    </div>

  </form>
</div>

@endsection