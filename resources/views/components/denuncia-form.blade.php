<div class="m-4 p-4">
    <div class="mb-3">
      <label class="form-label">¿Usted ha hecho entrega de algún bien mueble o dinero o suma de dinero?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta" wire:model.lazy='respuesta' value="Bien mueble" id="flexCheckDefault1">
        <label class="form-check-label" for="flexCheckDefault1">
          Si, bien mueble.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta" wire:model.lazy='respuesta' value="Dinero o suma de dinero"
          id="flexCheckDefault2">
        <label class="form-check-label" for="flexCheckDefault2">
          Si, dinero o suma de dinero.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta" wire:model.lazy='respuesta' value="No" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">
          No.
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Precise la fecha en que se realizó dicha entrega:</label>
      <input type="date" class="form-control" name="fecha_entrega" wire:model.lazy='fecha_entrega'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Nombre completo de la persona y/o empresa a la que le hizo la entrega:</label>
      <input type="text" class="form-control" name="nombre_denunciado" wire:model.lazy='nombre_denunciado'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Si se trata de dinero, indicar la suma entregada:</label>
      <input type="number" class="form-control" name="suma_dinero" wire:model.lazy='suma_dinero'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Indicar el tipo de moneda:</label>
      <input type="text" class="form-control" name="moneda_dinero" wire:model.lazy='moneda_dinero'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Si se trata de un bien mueble, indicarlo:</label>
      <input type="text" class="form-control" name="bien_mueble" wire:model.lazy='bien_mueble'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Cantidad de unidades:</label>
      <input type="text" class="form-control" name="cantidad_bien_mueble" wire:model.lazy='cantidad_bien_mueble'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Valor de los bienes:</label>
      <input type="text" class="form-control" name="valor_bien_mueble" wire:model.lazy='valor_bien_mueble'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">Indicar el tipo de moneda:</label>
      <input type="text" class="form-control" name="moneda_bien_mueble" wire:model.lazy='moneda_bien_mueble'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">¿Por qué motivo hizo la entrega de ese bien mueble o dinero?</label>
      <input type="text" class="form-control" name="motivo" wire:model.lazy='motivo'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">¿Cuenta con algún recibo y/o acta de entrega del bien?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="recibo" wire:model.lazy='recibo' value="" id="flexCheckDefault1">
        <label class="form-check-label" for="flexCheckDefault1">
          Si.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="recibo" wire:model.lazy='recibo' value="" id="flexCheckDefault2">
        <label class="form-check-label" for="flexCheckDefault2">
          No.
        </label>
      </div>
      <label class="form-label mt-3">Adjuntar archivo:</label>
      <input type="file" class="form-control" name="recibo_archivo" wire:model.lazy='recibo_archivo'>
    </div>
    <div class="mb-3">
      <label class="form-label">¿Cuenta con alguna otra prueba, documental o testimonial, que permita demostrar el acto
        de entrega?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="prueba_adicional" wire:model.lazy='prueba_adicional' value="" id="flexCheckDefault1">
        <label class="form-check-label" for="flexCheckDefault1">
          Si, cuento con otra prueba que demuestre la entrega del bien.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="prueba_adicional" wire:model.lazy='prueba_adicional' value="" id="flexCheckDefault2">
        <label class="form-check-label" for="flexCheckDefault2">
          Si, cuento con otra prueba que demuestre la entrega del dinero.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="prueba_adicional" wire:model.lazy='prueba_adicional' value="" id="flexCheckDefault2">
        <label class="form-check-label" for="flexCheckDefault2">
          No.
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">De ser afirmativa, precise ¿de qué prueba se trata?</label>
      <input type="text" class="form-control" name="detalle_prueba_adicional" wire:model.lazy='detalle_prueba_adicional'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
      <label class="form-label mt-3">Adjuntar archivo:</label>
      <input type="file" class="form-control" name="archivo_prueba_adicional" wire:model.lazy='archivo_prueba_adicional'>
    </div>
    <div class="mb-3">
      <label class="form-label">¿Usted ha enviado carta notarial requiriendo la devolución del bien o dinero?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="envio_carta_notarial" wire:model.lazy='envio_carta_notarial' value="" id="flexCheckDefault1">
        <label class="form-check-label" for="flexCheckDefault1">
          Si.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="envio_carta_notarial" wire:model.lazy='envio_carta_notarial' value="" id="flexCheckDefault2">
        <label class="form-check-label" for="flexCheckDefault2">
          No. (Si no ha enviado una, podrá descargar el modelo en formato predeterminado y completar los datos. Una vez
          haya completado los datos, imprimirla y enviarla a través de una notaría. Vencido el plazo de 3 días para la
          presentación de la denuncia, se deberá volver a iniciar el proceso de llenado del escrito)
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Fecha de envio de la carta notarial:</label>
      <input type="date" class="form-control" name="fecha_envio_carta_notarial" wire:model.lazy='fecha_envio_carta_notarial'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label class="form-label">¿Ha obtenido alguna respuesta?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta_envio_carta_notarial" wire:model.lazy='respuesta_envio_carta_notarial' value=""
          id="flexCheckDefault1">
        <label class="form-check-label" for="flexCheckDefault1">
          Si.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta_envio_carta_notarial" wire:model.lazy='respuesta_envio_carta_notarial' value=""
          id="flexCheckDefault2">
        <label class="form-check-label" for="flexCheckDefault2">
          No.
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Si ha recibido una carta de respuesta, precisar la fecha:</label>
      <input type="date" class="form-control" name="fecha_respuesta_envio_carta_notarial" wire:model.lazy='fecha_respuesta_envio_carta_notarial'>
      <div  class="form-text">We'll never share your email with anyone else.</div>
      <label class="form-label mt-3">Adjuntar carta de respuesta:</label>
      <input type="file" class="form-control" name="documento_respuesta_envio_carta_notarial" wire:model.lazy='documento_respuesta_envio_carta_notarial'
    >
    </div>
  </div>