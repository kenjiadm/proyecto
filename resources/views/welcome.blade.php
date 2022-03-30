@extends ('template.index')

@section('cuerpo')

<div class="container-fluid d-flex flex-column  align-items-center" style="height: 100vh">
    <div class="row w-100">
        <div class="col d-flex justify-content-center align-items-center ">
            <div class="col-8">
                <img class="img-fluid rounded" src="{{ asset('storage/img/Ilustración_pasos.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center w-100">
        {{-- <div class="col-6 col-sm-4 col-md-3 text-center">
            <a href="{{route('denuncia-apropiacion-ilicita')}}" class="btn btn-outline-primary" style="font-size: 2rem">
                Denuncia de Apropiacion Ilicita 
            </a>
        </div> --}}
        <div class="col-10 col-sm-8 col-md-6 text-center">
            <a href="{{route('denuncia-violencia-familiar')}}" role="button" class="btn btn-outline-primary" style="font-size: 1.5rem">
                DENUNCIA POR DELITO DE VIOLENCIA FAMILIAR
            </a>
        </div>
    </div>
</div>

@endsection