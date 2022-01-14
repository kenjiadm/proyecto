@extends ('template.index')

@section('cuerpo')

<div class="container">

<h5 class="mx-4 px-4 mt-4 pt-4">Esta información es para contactar con el denunciante</h5>
<form class="m-4 p-4" action="{{url('denuncia')}}" method="post">
@csrf
  <div class="mb-3">
    <label class="form-label">Nombre del Denunciante</label>
    <input type="text" class="form-control" name="name_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Apellido del Denunciante</label>
    <input type="text" class="form-control" name="lastname_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3">
    <label class="form-label">DNI</label>
    <input type="text" class="form-control" name="dni_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Dirección</label>
    <input type="text" class="form-control" name="direccion_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Distrito</label>
    <input type="text" class="form-control" name="distrito_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Provincia</label>
    <input type="text" class="form-control" name="ciudad_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Celular</label>
    <input type="text" class="form-control" name="celular_denunciante" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger">Este campo no puede quedar vacio*</div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Confirmo que los datos proporcionados son reales.</label>
  </div>
  <div class="mb-3">
    <label> Qué tipo de denuncia hará?</label>
    <div class="mt-3">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo_denuncia" id="denuncia1" value="denuncia1" checked>
        <label class="form-check-label" for="denuncia1">
          Apropiación ilícita
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo_denuncia" id="denuncia2" value="denuncia2">
        <label class="form-check-label" for="denuncia2">
          Violencia familiar
        </label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Siguiente</button>
</form>

</div>
@endsection