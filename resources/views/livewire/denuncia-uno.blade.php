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
            <div class="col-12 col-md-8 d-flex flex-column align-items-center justify-content-center py-5 px-md-5">
                <h3>Paso 2/2: Información para la denuncia</h3>
                <x-denuncia-form></x-denuncia-form>
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
