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
                <x-denuncia-violencia-familiar-form></x-denuncia-violencia-familiar-form>
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
    document.addEventListener('alpine:init', () => {
        let inputValue1 = document.querySelector('input[name="respuesta1"]:checked')?.value;
        let inputValue1option = document.querySelector('input[name="respuesta1_1"]:checked')?.value;
        let inputValue2 = document.querySelector('input[name="respuesta5"]:checked')?.value;
        let inputValue2option = document.querySelector('input[name="respuesta5_1"]:checked')?.value;

        Alpine.data('form', () => ({
            active1: false,
            active1a:false,
            active1b:false,
            active1c:false,
            active2: false,
            active2a:false,
            active2b:false,
            active2c:false,
            respuesta1_1: @entangle('respuesta1_1').defer,
            respuesta1_1_a_cargo: @entangle('respuesta1_1_a_cargo').defer,
            respuesta1_1_a_lugar: @entangle('respuesta1_1_a_lugar').defer,
            respuesta1_1_b_cargo: @entangle('respuesta1_1_b_cargo').defer,
            respuesta1_1_b_lugar: @entangle('respuesta1_1_b_lugar').defer,
            respuesta1_1_c_relacion: @entangle('respuesta1_1_c_relacion').defer,
            respuesta5_1: @entangle('respuesta5_1').defer,
            respuesta5_1_a_cargo: @entangle('respuesta5_1_a_cargo').defer,
            respuesta5_1_a_lugar: @entangle('respuesta5_1_a_lugar').defer,
            respuesta5_1_b_cargo: @entangle('respuesta5_1_b_cargo').defer,
            respuesta5_1_b_lugar: @entangle('respuesta5_1_b_lugar').defer,
            respuesta5_1_c_relacion: @entangle('respuesta5_1_c_relacion').defer,

            init(){
              this.active1 = inputValue1 === 'si' ? true : false;
              if (this.active1 === false) {
                this.active1a = false;
                this.active1b = false;
                this.active1c = false;
              } else {
                this.active1a = inputValue1option === 'a' ? true : false;
                this.active1b = inputValue1option === 'b' ? true : false;
                this.active1c = inputValue1option === 'c' ? true : false;
              }
              this.active2 = inputValue2 === 'si' ? true : false;
              if (this.active2 === false) {
                this.active2a = false;
                this.active2b = false;
                this.active2c = false;
              } else {
                this.active2a = inputValue2option === 'a' ? true : false;
                this.active2b = inputValue2option === 'b' ? true : false;
                this.active2c = inputValue2option === 'c' ? true : false;
              }
            },

            toggleActive() {
              let inputValue = document.querySelector('input[name="respuesta1"]:checked')?.value;
              this.active1 = inputValue === 'si' ? true : false;
              this.toggleActive1();
            },

            toggleActive1() {
              let inputValue = document.querySelector('input[name="respuesta1_1"]:checked')?.value;
              if (this.active1 === false) {
                this.active1a = false;
                this.active1b = false;
                this.active1c = false;
              } else {
                this.active1a = inputValue === 'a' ? true : false;
                this.active1b = inputValue === 'b' ? true : false;
                this.active1c = inputValue === 'c' ? true : false;
              }
            },

            toggleActive2() {
              let inputValue = document.querySelector('input[name="respuesta5"]:checked')?.value;
              this.active2 = inputValue === 'si' ? true : false;
              this.toggleActive3();
            },

            toggleActive3() {
              let inputValue = document.querySelector('input[name="respuesta5_1"]:checked')?.value;
              if (this.active2 === false) {
                this.active2a = false;
                this.active2b = false;
                this.active2c = false;
              } else {
                this.active2a = inputValue === 'a' ? true : false;
                this.active2b = inputValue === 'b' ? true : false;
                this.active2c = inputValue === 'c' ? true : false;
              }
            }
        }))
    })

    window.onload = function(){
        Livewire.on('foo', () => {
            window.scrollTo(0,0)
        })
    }
    
</script>
@endsection