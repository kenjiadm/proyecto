<div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            @if ($currentCount === 1)
            <div class="col-12 col-md-8 d-flex flex-column align-items-center justify-content-center py-5 px-md-5">
                <h3>Paso 1/2: Información de contacto</h3>
                <x-denunciante-contact-form></x-denunciante-contact-form>
                <div class="w-100 d-flex justify-content-around">
                    <button wire:click="back" type="button" class="btn btn-secondary">
                        Atrás
                    </button>
                    <button wire:click='increaseCount' type="button" class="btn btn-primary">
                        Siguiente
                    </button>
                </div>
            </div>
            @endif
            @if ($currentCount === 2)
            <div class="col-12 col-md-10 col-lg-8 d-flex flex-column align-items-center justify-content-center py-5 px-md-5">
                <h3>Paso 2/2: Información para la denuncia</h3>
                <x-denuncia-violencia-familiar-form :respuestas="$respuestas">
                  <x-slot name="agredidos">
                    <x-multiple-inputs-table
                      tag="agredidos"
                      :headers="$headers"
                      :inputRows="$agredido_rows"
                    >
                    </x-multiple-inputs-table>
                    <div class="d-flex justify-content-end">
                      <div class="d-flex flex-column">
                      <div>
                        Si es más de una persona haz click en "Añadir"
                      </div>
                      <div class="d-flex justify-content-end">
                      <button type="button" class="btn btn-success" wire:click="increase('agredido')">Añadir</button>
                      <button type="button" class="btn btn-danger" wire:click="decrease('agredido')">Quitar</button>
                      </div>
                      </div>
                    </div>
                  </x-slot>
                  <x-slot name="agresores">
                    <x-multiple-inputs-table
                      tag="agresores"
                      :headers="$headers"
                      :inputRows="$agresor_rows"
                    >
                    </x-multiple-inputs-table>
                    <div class="d-flex justify-content-end">
                      <button type="button" class="btn btn-success" wire:click="increase('agresor')">Añadir</button>
                      <button type="button" class="btn btn-danger" wire:click="decrease('agresor')">Quitar</button>
                    </div>
                  </x-slot>
                  <x-slot name="lugares">
                    <x-multiple-inputs-table
                      tag="lugares"
                      :headers="$headers_lugares"
                      :inputRows="$lugar_rows"
                    >
                    </x-multiple-inputs-table>
                    <div class="d-flex justify-content-end">
                      <button type="button" class="btn btn-success" wire:click="increase('lugar')">Añadir</button>
                      <button type="button" class="btn btn-danger" wire:click="decrease('lugar')">Quitar</button>
                    </div>
                  </x-slot>
                </x-denuncia-violencia-familiar-form>
                <div class="w-100 d-flex justify-content-around">
                    <button wire:click='decreaseCount' type="button" class="btn btn-secondary">
                        Atrás
                    </button>
                    <button type="button" wire:click='generarDenuncia' class="btn btn-primary">
                        Enviar Denuncia
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@section('js')
<script>
    window.onload = function(){
        Livewire.on('foo', () => {
            window.scrollTo(0,0)
        })
    }
    
</script>
@endsection