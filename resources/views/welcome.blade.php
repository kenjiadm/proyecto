@extends ('template.index')

@section('cuerpo')

<div class="container-fluid d-flex flex-column  align-items-center" style="height: 100vh">
    <div class="row w-100 h-50">
        <div class="col d-flex justify-content-center align-items-center ">
            <h1>Escoge el tipo de denuncia</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center w-100 h-50">
        <div class="col-6 col-sm-4 col-md-3 text-center">
            <a href="{{route('denuncia-apropiacion-ilicita')}}" class="btn btn-outline-primary" style="font-size: 2rem">
                Denuncia de Apropiacion Ilicita 
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-3 text-center">
            <a href="{{route('denuncia-violencia-familiar')}}" class="btn btn-outline-primary" style="font-size: 2rem">
                Denuncia Familiar
            </a>
        </div>
    </div>
</div>

@endsection