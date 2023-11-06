@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/ordenes.css') }}">

@endsection

@section('contenido')

<div class="mt-3 card mb-5" style="width: 80rem; margin-left: auto; margin-right: auto; border: none !important">
<form>
  <div class="mb-2">
    <div class="mb-5 mt-3">
    <label for="exampleInputEmail1" class="form-label mb-3 "style="margin-left: 30px; margin-right: 30px">Nombre Empresa</label>
    <input type="text" class="form-control mb-3" value="" name="">
  </div>
  <div class="mb-2">
    <div class="mb-5 mt-3">
    <label for="exampleInputEmail1" class="form-label mb-3 "style="margin-left: 20px; margin-right: 20px">Poductos Requeridos</label>
    <input type="text" class="form-control mb-3" value="" name="">
  </div>
  <div class="mb-5 mt-3">
    <label for="exampleInputEmail1" class="form-label mb-3 "style="margin-left: 20px; margin-right: 20px">Cantidad</label>
    <input type="text" class="form-control mb-3" value="" name="">
  </div>

  <button type="submit" class="btn btn-secondary me-5">Enviar</button>
  <button type="submit" class="btn btn-secondary me-5">Enviar por e-mail</button>
  <button type="submit" class="btn btn-secondary me-5">Generar PDF</button>

</form>

@endsection