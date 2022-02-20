<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Validation\Rule;


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
    public $motivo;

    public $envio_carta_notarial;
    public $fecha_envio_carta_notarial;
    public $respuesta_envio_carta_notarial;
    public $fecha_respuesta_envio_carta_notarial;

    public $suma_dinero;
    public $moneda_dinero;

    public $bien_mueble;
    public $cantidad_bien_mueble;
    public $valor_bien_mueble;
    public $moneda_bien_mueble;

    public $confirmacion_anexos;
    public $anexo1_nombre;
    public $anexo2_nombre;

    private $respuestaValues = [
        'a' => 'Bien mueble', 
        'b' => 'Dinero o suma de dinero',
        'c' => 'Bien mueble y Dinero o suma de dinero',
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

        // generar word carta
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $templateCarta = new TemplateProcessor('storage/denuncia_modelo1.docx');

        $templateCarta->setValues([
            'datos1name' => $this->name_denunciante,
            'datos1lastname' => $this->lastname_denunciante,
            'datos1dni' => $this->dni_denunciante,
            'datos1direccion' => $this->direccion_denunciante,
            'datos1distrito' => $this->distrito_denunciante,
            'datos1provincia' => $this->ciudad_denunciante,
            'datos2fecha_entrega' => $this->fecha_entrega,
            'datos2nombre_denunciado' => $this->nombre_denunciado,
            'datos2motivo' => $this->motivo,
            'datos2fecha_envio_carta_notarial' => $this->fecha_envio_carta_notarial,
            'dia' => today()->format('d'),
            'mes' => $meses[(today()->format('n')) - 1],
            'ano' => today()->format('Y'),
        ]);
        if($this->respuesta_envio_carta_notarial === 'si'){
            $respuestaCarta = "He recibido una carta de respuesta (16) de fecha __{$this->fecha_respuesta_envio_carta_notarial}__. Se adjunta carta_(17)___.";
            $templateCarta->setValue('datos2fecha_respuesta_envio_carta_notarial', $respuestaCarta);
        }

        $templateCarta->setValue('datos2respuesta', $this->respuestaValues[$this->respuesta]);
        $bienes_respuesta = '';
        switch ($this->respuesta) {
            case 'a':
                $bienes_respuesta = "_{$this->cantidad_bien_mueble}__{$this->bien_mueble}_ con un valor de {$this->valor_bien_mueble}_ {$this->moneda_bien_mueble} _(8)" ;
                break;

            case 'b':
                $bienes_respuesta = "_{$this->suma_dinero} {$this->moneda_dinero}__(7),";
                break;

            case 'c':
                $bienes_respuesta = "_{$this->cantidad_bien_mueble}__{$this->bien_mueble}_ con un valor de {$this->valor_bien_mueble}_ {$this->moneda_bien_mueble} _(8) y/o _{$this->suma_dinero} {$this->moneda_dinero}__(7)," ;
                break;
            
            default:
                # code...
                break;
        }
        $templateCarta->setValue('bienes_respuesta', $bienes_respuesta);



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
                'respuesta' => ['required', Rule::in(['a','b','c'])],
                'fecha_entrega' => 'required',
                'nombre_denunciado' => 'required',
                'motivo' => 'required',
                'envio_carta_notarial' => ['required', Rule::in(['si'])],
                'fecha_envio_carta_notarial' => 'nullable',
                'respuesta_envio_carta_notarial' => 'nullable',
                'fecha_respuesta_envio_carta_notarial' => 'nullable',
                'suma_dinero' => 'required_unless:respuesta,a',
                'moneda_dinero' => 'required_unless:respuesta,a',
                'bien_mueble' => 'required_unless:respuesta,b',
                'cantidad_bien_mueble' => 'required_unless:respuesta,b',
                'valor_bien_mueble' => 'required_unless:respuesta,b',
                'moneda_bien_mueble' => 'required_unless:respuesta,b',
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
