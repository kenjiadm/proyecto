<div>
<h5 class="mx-4 px-4 mt-4 pt-4">Esta información es para contactar con el denunciante</h5>
<div class="m-4 p-4">
  <div class="mb-3">
    <label class="form-label">Nombre del Denunciante</label>
    <input type="text" class="form-control" wire:model.lazy='name_denunciante' name="name_denunciante">
    <div class="form-text text-danger">@error('name_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Apellidos del Denunciante</label>
    <input type="text" class="form-control" wire:model.lazy='lastname_denunciante' name="lastname_denunciante">
    <div class="form-text text-danger">@error('lastname_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">DNI</label>
    <input type="text" class="form-control" wire:model.lazy='dni_denunciante' name="dni_denunciante">
    <div class="form-text text-danger">@error('dni_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Dirección</label>
    <input type="text" class="form-control" wire:model.lazy='direccion_denunciante' name="direccion_denunciante">
    <div class="form-text text-danger">@error('direccion_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Distrito</label>
    <input type="text" class="form-control" wire:model.lazy='distrito_denunciante' name="distrito_denunciante">
    <div class="form-text text-danger">@error('distrito_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Provincia</label>
    <input type="text" class="form-control" wire:model.lazy='ciudad_denunciante' name="ciudad_denunciante">
    <div class="form-text text-danger">@error('ciudad_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" wire:model.lazy='email_denunciante' name="email_denunciante">
    <div class="form-text text-danger">@error('email_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Celular</label>
    <input type="text" class="form-control" wire:model.lazy='celular_denunciante' name="celular_denunciante">
    <div class="form-text text-danger">@error('celular_denunciante') {{$message}} @enderror</div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" wire:model.lazy='confirmacion' name="confirmacion">
    <label class="form-check-label">Confirmo que los datos proporcionados son reales.</label>
    <div class="form-text text-danger">@error('confirmacion') {{$message}} @enderror</div>
  </div>
</div>
</div>