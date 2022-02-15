<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpWord\TemplateProcessor;

class DenunciaUno extends Component
{
    use WithFileUploads;

    //step 1
    public $name_denunciante;
    public $lastname_denunciante;
    public $dni_denunciante;
    public $direccion_denunciante;
    public $distrito_denunciante;
    public $ciudad_denunciante;
    public $email_denunciante;
    public $celular_denunciante;
    public $confirmacion;

    //step 2

    public $respuesta;
    public $fecha_entrega;
    public $nombre_denunciado;
    public $suma_dinero;
    public $moneda_dinero;
    public $bien_mueble;
    public $cantidad_bien_mueble;
    public $valor_bien_mueble;
    public $moneda_bien_mueble;
    public $motivo;
    public $recibo;
    public $recibo_archivo;
    public $prueba_adicional;
    public $detalle_prueba_adicional;
    public $archivo_prueba_adicional;
    public $envio_carta_notarial;
    public $fecha_envio_carta_notarial;
    public $respuesta_envio_carta_notarial;
    public $fecha_respuesta_envio_carta_notarial;
    public $documento_respuesta_envio_carta_notarial;

    public $names = [
        'respuesta',
        'fecha_entrega',
        'nombre_denunciado',
        'suma_dinero',
        'moneda_dinero',
        'bien_mueble',
        'cantidad_bien_mueble',
        'valor_bien_mueble',
        'moneda_bien_mueble',
        'motivo',
        'recibo',
        'prueba_adicional',
        'detalle_prueba_adicional',
        'envio_carta_notarial',
        'fecha_envio_carta_notarial',
        'respuesta_envio_carta_notarial',
        'fecha_respuesta_envio_carta_notarial',
    ];

    //step count

    public $totalCount = 2;
    public $currentCount;

    public function mount()
    {
        $this->currentCount = 1;
    }

    public function increaseCount(){
        $this->resetErrorBag();
        $this->validateData();
        if($this->currentCount === $this->totalCount) return;
        $this->currentCount++;
        $this->emit('foo');
    }

    public function decreaseCount(){
        $this->resetErrorBag();
        if($this->currentCount === 0) return;
        $this->currentCount--;
        $this->emit('foo');
    }

    public function generarDenuncia()
    {
        $this->resetErrorBag();
        $this->validateData();

        $fileName = uniqid() . now()->timestamp;

        $datos2 = [];
        for ($i=0; $i < count($this->names); $i++) { 
            $datos2[$this->names[$i]] = 
            $this->{$this->names[$i]};
        }   

        // generar word carta
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $templateCarta = new TemplateProcessor('storage/denuncia_modelo1.docx');
        for ($i=0; $i < count($this->names); $i++) { 
            if(is_string($datos2[$this->names[$i]])){
                $templateCarta->setValue('datos2'. $this->names[$i] , $datos2[$this->names[$i]]);
            }
        }
        $templateCarta->setValues([
            'datos1name' => $this->name_denunciante,
            'datos1lastname' => $this->lastname_denunciante,
            'datos1dni' => $this->dni_denunciante,
            'datos1direccion' => $this->direccion_denunciante,
            'datos1distrito' => $this->distrito_denunciante,
            'datos1provincia' => $this->ciudad_denunciante,
            'dia' => today()->format('d'),
            'mes' => $meses[(today()->format('n')) - 1],
            'ano' => today()->format('Y'),
        ]);

        $templateCarta->saveAs('storage/' . $fileName .'.docx');
        return response()->download('storage/' .$fileName .'.docx', 'apropiacion_ilicita.docx')->deleteFileAfterSend(true);

    }
    
    public function validateData()
    {
        if ($this->currentCount === 1) {
            $this->validate([
                'name_denunciante' => 'required',
                'lastname_denunciante' => 'required',
                'dni_denunciante' => 'required|digits:8',
                'direccion_denunciante' => 'required',
                'distrito_denunciante' => 'required',
                'ciudad_denunciante' => 'required',
                'email_denunciante' => 'required|email',
                'celular_denunciante' => 'required|digits_between:9,12',
                'confirmacion' => 'required',
            ]);
        }
        if ($this->currentCount === 2) {
            $this->validate([
                'respuesta' => 'nullable',
                'fecha_entrega' => 'nullable',
                'nombre_denunciado' => 'nullable',
                'suma_dinero' => 'nullable',
                'moneda_dinero' => 'nullable',
                'bien_mueble' => 'nullable',
                'cantidad_bien_mueble' => 'nullable',
                'valor_bien_mueble' => 'nullable',
                'moneda_bien_mueble' => 'nullable',
                'motivo' => 'nullable',
                'recibo' => 'nullable',
                'recibo_archivo' => 'nullable',
                'prueba_adicional' => 'nullable',
                'detalle_prueba_adicional' => 'nullable',
                'archivo_prueba_adicional' => 'nullable',
                'envio_carta_notarial' => 'nullable',
                'fecha_envio_carta_notarial' => 'nullable',
                'respuesta_envio_carta_notarial' => 'nullable',
                'fecha_respuesta_envio_carta_notarial' => 'nullable',
                'documento_respuesta_envio_carta_notarial' => 'nullable',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.denuncia-uno')
            ->extends('template.index')
            ->section('cuerpo');
    }

    public function back()
    {
        return redirect()->route('home');
    }
}
