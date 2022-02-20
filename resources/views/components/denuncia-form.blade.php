@props([
'respuesta',
'confirmacionAnexos',
'envioCarta',
'respuestaCarta'
])
<div class="m-4 p-4">
  <div class="mb-3">
    <label class="form-label">1) ¿Usted ha hecho entrega de algún bien mueble o dinero o suma de dinero?</label>
    <div class="form-text text-danger">@error('respuesta') {{$message}} @enderror</div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="respuesta" wire:model.lazy='respuesta' value="a"
        id="respuesta1">
      <label class="form-check-label" for="respuesta1">
        Bien mueble.
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="respuesta" wire:model.lazy='respuesta' value="b"
        id="respuesta2">
      <label class="form-check-label" for="respuesta2">
        Dinero o suma de dinero.
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="respuesta" wire:model.lazy='respuesta' value="c"
        id="respuesta3">
      <label class="form-check-label" for="respuesta3">
        Ambos
      </label>
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Precise la fecha en que se realizó dicha entrega o la fecha cuando empezó a hacer las
      entregas:</label>
    <input type="date" class="form-control" name="fecha_entrega" wire:model.lazy='fecha_entrega'>
    <div class="form-text text-danger">@error('fecha_entrega') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Nombre completo de la persona y/o empresa a la que le hizo la entrega:</label>
    <input type="text" class="form-control" name="nombre_denunciado" wire:model.lazy='nombre_denunciado'>
    <div class="form-text text-danger">@error('nombre_denunciado') {{$message}} @enderror</div>
  </div>
  <div class="mb-3">
    <label class="form-label">¿Por qué motivo hizo la entrega de ese bien mueble o dinero?</label>
    <input type="text" class="form-control" name="motivo" wire:model.lazy='motivo'>
    <div class="form-text text-danger">@error('motivo') {{$message}} @enderror</div>
  </div>


  <div class="mb-3">
    <label class="form-label">¿Usted ha enviado carta notarial requiriendo la devolución del bien o dinero?</label>
    <div class="form-text text-danger">@error('envio_carta_notarial') {{$message}} @enderror</div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="envio_carta_notarial" wire:model.lazy='envio_carta_notarial'
        value="si" id="envio_carta_notarial1">
      <label class="form-check-label" for="envio_carta_notarial1">
        Si.
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="envio_carta_notarial" wire:model.lazy='envio_carta_notarial'
        value="no" id="envio_carta_notarial2">
      <label class="form-check-label" for="envio_carta_notarial2">
        No. (Si no ha enviado una, podrá descargar el modelo en formato predeterminado y completar los datos. Una vez
        haya completado los datos, imprimirla y enviarla a través de una notaría. Vencido el plazo de 3 días para la
        presentación de la denuncia, se deberá volver a iniciar el proceso de llenado del escrito)
      </label>
    </div>
  </div>

  @if ($envioCarta === 'si')
  <div class="mb-3">
    <label class="form-label">Fecha de envio de la carta notarial:</label>
    <input type="date" class="form-control" name="fecha_envio_carta_notarial"
      wire:model.lazy='fecha_envio_carta_notarial'>
    <div class="form-text text-danger">@error('fecha_envio_carta_notarial') {{$message}} @enderror</div>
  </div>

  <div class="mb-3">
    <label class="form-label">¿Ha obtenido alguna respuesta?</label>
    <div class="form-text text-danger">@error('respuesta_envio_carta_notarial') {{$message}} @enderror</div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="respuesta_envio_carta_notarial"
        wire:model.lazy='respuesta_envio_carta_notarial' value="si" id="respuesta_envio_carta_notarial1">
      <label class="form-check-label" for="respuesta_envio_carta_notarial1">
        Si.
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="respuesta_envio_carta_notarial"
        wire:model.lazy='respuesta_envio_carta_notarial' value="no" id="respuesta_envio_carta_notarial2">
      <label class="form-check-label" for="respuesta_envio_carta_notarial2">
        No.
      </label>
    </div>
  </div>

  @if ($respuestaCarta === 'si')
  <div class="mb-3">
    <label class="form-label">Si ha recibido una carta de respuesta, precisar la fecha:</label>
    <input type="date" class="form-control" name="fecha_respuesta_envio_carta_notarial"
      wire:model.lazy='fecha_respuesta_envio_carta_notarial'>
    <div class="form-text text-danger">@error('fecha_respuesta_envio_carta_notarial') {{$message}} @enderror</div>
  </div>
  @endif
  @if ($respuesta === 'a' || $respuesta === 'c' )
  <div class="p-2 mb-3 border border-2">
    <h5 class="mb-2">Bien mueble</h5>
    <div class="mb-3">
      <label class="form-label">Indicar el tipo de bien:</label>
      <input type="text" class="form-control" name="bien_mueble" wire:model.lazy='bien_mueble'>
      <div class="form-text text-danger">@error('bien_mueble') {{$message}} @enderror</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Cantidad de unidades:</label>
      <input type="text" class="form-control" name="cantidad_bien_mueble" wire:model.lazy='cantidad_bien_mueble'>
      <div class="form-text text-danger">@error('cantidad_bien_mueble') {{$message}} @enderror</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Valor de los bienes:</label>
      <input type="text" class="form-control" name="valor_bien_mueble" wire:model.lazy='valor_bien_mueble'>
      <div class="form-text text-danger">@error('valor_bien_mueble') {{$message}} @enderror</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Indicar el tipo de moneda:</label>
      <input type="text" class="form-control" name="moneda_bien_mueble" wire:model.lazy='moneda_bien_mueble'>
      <div class="form-text text-danger">@error('moneda_bien_mueble') {{$message}} @enderror</div>
    </div>
  </div>
  @endif
  @if ($respuesta === 'b' || $respuesta === 'c' )
  <div class="p-2 mb-3 border border-2">
    <h5 class="mb-2">Dinero o suma de dinero.</h5>
    <div class="mb-3">
      <label class="form-label">Indicar la suma entregada:</label>
      <input type="number" class="form-control" name="suma_dinero" wire:model.lazy='suma_dinero'>
      <div class="form-text text-danger">@error('suma_dinero') {{$message}} @enderror</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Indicar el tipo de moneda:</label>
      <input type="text" class="form-control" name="moneda_dinero" wire:model.lazy='moneda_dinero'>
      <div class="form-text text-danger">@error('moneda_dinero') {{$message}} @enderror</div>
    </div>
  </div>
  @endif
  <div class="mb-3">
    <b class="form-label">Anexos:</b>
  </div>
  <div class="mb-3">
    <label class="form-label">¿Cuenta con algún recibo y/o acta de entrega del bien o monto de dinero?</label>
    <div class="col-10 ">
      <div class="form-text">De contar con alguno, indicar el nombre de dicho recibo o acta. Caso que no lo posea
        ignorar lo siguiente.</div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" wire:model.lazy='confirmacion_anexos'
          name="confirmacion_anexos">
        <label class="form-check-label">Me comprometo a llevar los documentos que sustentan la presente de forma
          fisica
          al despacho</label>
      </div>
      <div class="form-group row my-2 pb-3 align-items-center">
        <label for="anexo1_nombre" class="col-5 col-form-label">Documento que adjunta:</label>
        <div class="col-7">
          <input name="anexo1_nombre" wire:model.lazy="anexo1_nombre" type="text" class="form-control"
            id="anexo1_nombre" @if (!$confirmacionAnexos) disabled @endif>
        </div>
      </div>
      <div class="form-group row my-2 pb-3 align-items-center">
        <label for="anexo2_nombre" class="col-5 col-form-label">Documento que adjunta:</label>
        <div class="col-7">
          <input name="anexo2_nombre" wire:model.lazy="anexo2_nombre" type="text" class="form-control"
            id="anexo2_nombre" @if (!$confirmacionAnexos) disabled @endif>
        </div>
      </div>
    </div>
  </div>
  @endif

</div>