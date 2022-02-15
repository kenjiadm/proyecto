<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpWord\TemplateProcessor;

class DenunciaViolenciaFamiliar extends Component
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
    public $respuesta2;
    public $respuesta6;
    public $respuesta1;
    public $respuesta1_1;
    public $respuesta1_1_a_cargo;
    public $respuesta1_1_a_lugar;
    public $respuesta1_1_b_cargo;
    public $respuesta1_1_b_lugar;
    public $respuesta1_1_c_relacion;
    public $respuesta3;
    public $respuesta4 = [];
    public $respuesta5;
    public $respuesta5_1;
    public $respuesta5_1_a_cargo;
    public $respuesta5_1_a_lugar;
    public $respuesta5_1_b_cargo;
    public $respuesta5_1_b_lugar;
    public $respuesta5_1_c_relacion;
    public $respuesta7 = [];
    public $respuesta8_nombre;
    public $respuesta8_edad;
    public $respuesta9_nombre;
    public $respuesta9_edad;
    public $respuesta10;
    public $respuesta11_provincia;
    public $respuesta11_distrito;
    public $respuesta11_direccion;
    public $respuesta12;
    public $archivo_dni;
    public $confirmacion_anexos;
    public $anexo1_nombre;
    public $anexo2_nombre;

    public $names = [
        'respuesta2',
        'respuesta6',
        'respuesta1',
        'respuesta1_1',
        'respuesta1_1_a_cargo',
        'respuesta1_1_a_lugar',
        'respuesta1_1_b_cargo',
        'respuesta1_1_b_lugar',
        'respuesta1_1_c_relacion',
        'respuesta3',
        'respuesta4',
        'respuesta5',
        'respuesta5_1',
        'respuesta5_1_a_cargo',
        'respuesta5_1_a_lugar',
        'respuesta5_1_b_cargo',
        'respuesta5_1_b_lugar',
        'respuesta5_1_c_relacion',
        'respuesta7',
        'respuesta8_nombre',
        'respuesta8_edad',
        'respuesta9_nombre',
        'respuesta9_edad',
        'respuesta10',
        'respuesta11_provincia',
        'respuesta11_distrito',
        'respuesta11_direccion',
        'respuesta12',
        'archivo_dni',
        'confirmacion_anexos',
        'anexo1_nombre',
        'anexo2_nombre',
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

        // recolectar datos
        $datos2 = [];
        for ($i=0; $i < count($this->names); $i++) { 
            $datos2[$this->names[$i]] = 
            $this->{$this->names[$i]};
        }

        $datos2['anexos'] = [];       
        $fileName = uniqid() . now()->timestamp;
        
        if($this->anexo1_nombre && $this->confirmacion_anexos){
            array_push($datos2['anexos'],
            empty($this->anexo1_nombre) ? 
            'anexo1_nombre' : 
            $this->anexo1_nombre
            ); 
        }
        if($this->anexo2_nombre && $this->confirmacion_anexos){
            array_push($datos2['anexos'],
            empty($this->anexo2_nombre) ? 
            'anexo2_nombre' : 
            $this->anexo2_nombre
            );
        }
 
        // generar word carta
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $templateCarta = new TemplateProcessor('storage/denuncia_modelo.docx');
        $templateCarta->setValues([
            'respuesta11_distrito' => strtoupper($this->respuesta11_distrito),
            'respuesta11_provincia' => strtoupper($this->respuesta11_provincia),
            'name' => $this->name_denunciante,
            'lastname' => $this->lastname_denunciante,
            'dni' => $this->dni_denunciante,
            'direccion' => $this->direccion_denunciante,
            'distrito' => $this->distrito_denunciante,
            'provincia' => $this->ciudad_denunciante,
            'respuesta3' => date('d-m-Y' ,strtotime($this->respuesta3)),
            'respuesta10' => $this->respuesta10,
            'respuesta11_direccion2' => $this->respuesta11_direccion,
            'respuesta11_distrito2' => $this->respuesta11_distrito,
            'respuesta11_provincia2' => $this->respuesta11_provincia,
            'respuesta12' => $this->respuesta12,
            'email' => $this->email_denunciante,
            'direccion' => $this->direccion_denunciante,
            'distrito' => $this->distrito_denunciante,
            'provincia' => $this->ciudad_denunciante,
            'celular' => $this->celular_denunciante,
            'dia' => today()->format('d'),
            'mes' => $meses[(today()->format('n')) - 1],
            'ano' => today()->format('Y'),

        ]);

        $templateCarta->setValue('respuesta9_nombre_edad', "{$this->respuesta9_nombre} ({$this->respuesta9_edad})");

        $templateCarta->setValue('respuesta8_nombre_edad', "{$this->respuesta8_nombre} ({$this->respuesta8_edad})");

        if (isset($this->respuesta4)) {
            if (sizeof($this->respuesta4) !== 0) {
                $templateCarta->setValue( 'violenciafisica', 'Violencia fisica' );

                $rpta4items = '';
                for ($i=0; $i < count($this->respuesta4); $i++) { 
                    $rpta4items .= "{$this->respuesta4[$i]}, ";
                }
                    
                $templateCarta->setValue('respuesta4', $rpta4items);
            } else {
                $rpta4items = '';
                $templateCarta->setValue('respuesta4', $rpta4items);
                $templateCarta->setValue( 'violenciafisica', '' );
            }
        } else {
            $rpta4items = '';
            $templateCarta->setValue('respuesta4', $rpta4items);
            $templateCarta->setValue( 'violenciafisica', '' );
        }

        if (isset($this->respuesta7)) {
            if (sizeof($this->respuesta7) !== 0) {
                $templateCarta->setValue( 'violenciapsicologica', 'Violencia psicologica' );

                $rpta7items = '';
                for ($i=0; $i < count($this->respuesta7); $i++) { 
                    $rpta7items .= "{$this->respuesta7[$i]}, ";
                }
                    
                $templateCarta->setValue('respuesta7', $rpta7items);
            } else {
                $rpta7items = '';
                $templateCarta->setValue('respuesta7', $rpta7items);
                $templateCarta->setValue( 'violenciafisica', '' );
            }
        } else {
            $rpta7items = '';
            $templateCarta->setValue('respuesta7', $rpta7items);
            $templateCarta->setValue( 'violenciafisica', '' );
        }

        if($this->respuesta2 === 'si' || $this->respuesta6 === 'si'){
            $templateCarta->setValue( 'rpta2y6', 'SI' );
        } else {
            $templateCarta->setValue( 'rpta2y6', 'NO' );
        }

        if (sizeof($datos2['anexos']) !== 0) {
            $anexositems = '';
            for ($i=0; $i < count($datos2['anexos']); $i++) { 
                $number = $i + 2;
                $anexositems .= "{$number}) {$datos2['anexos'][$i]} </w:t><w:br/><w:t>";
            }
            $templateCarta->setValue('anexos', $anexositems);
        } else {
            $anexositems = '';
            $templateCarta->setValue('anexos', $anexositems);
        }
        $templateCarta->saveAs('storage/' . $fileName .'.docx');
        return response()->download($fileName .'.docx', 'violencia_familiar.docx')->deleteFileAfterSend(true);
        // // generar pdf carta

        // $pdfCarta = PDF::loadView('pdf.violencia_familiar_denuncia', compact( 'datos1' , 'datos2' ));
        // Storage::disk('local')->put( $folder . '/denuncia.pdf' ,$pdfCarta->output());

        // // unir pdfs
        // $pdfMerge = new PdfMerge();

        // $pdfMerge->add(storage_path('app/'.$folder.'/denuncia.pdf'));

        // $pdfMerge->add(storage_path('app/'.$folder.'/dni.pdf'));

        // if($request->hasFile('anexo1_archivo')){
        //     $pdfMerge->add(storage_path('app/'.$folder.'/anexo1_nombre.pdf'));
        // }
        // if($request->hasFile('anexo2_archivo')){
        //     $pdfMerge->add(storage_path('app/'.$folder.'/anexo2_nombre.pdf'));
        // }        
        // $pdfMerge->merge(storage_path('app/'.$folder.'/Denuncia Completa.pdf'));

        // return Storage::download($folder . '/Denuncia Completa.pdf');
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
                'respuesta2' => 'required',
                'respuesta6' => 'required',
                'respuesta1' => 'required',
                'respuesta1_1' => 'required_if:respuesta1,si',
                'respuesta1_1_a_cargo' => 'required_if:respuesta1_1,a',
                'respuesta1_1_a_lugar' => 'required_if:respuesta1_1,a',
                'respuesta1_1_b_cargo' => 'required_if:respuesta1_1,b',
                'respuesta1_1_b_lugar' => 'required_if:respuesta1_1,b',
                'respuesta1_1_c_relacion' => 'required_if:respuesta1_1,c',
                'respuesta3' => 'required',
                'respuesta4' => 'required',
                'respuesta5' => 'required',
                'respuesta5_1' => 'required_if:respuesta5,si',
                'respuesta5_1_a_cargo' => 'required_if:respuesta5_1,a',
                'respuesta5_1_a_lugar' => 'required_if:respuesta5_1,a',
                'respuesta5_1_b_cargo' => 'required_if:respuesta5_1,b',
                'respuesta5_1_b_lugar' => 'required_if:respuesta5_1,b',
                'respuesta5_1_c_relacion' => 'required_if:respuesta5_1,c',
                'respuesta7' => 'required',
                'respuesta8_nombre' => 'required',
                'respuesta8_edad' => 'required',
                'respuesta9_nombre' => 'required',
                'respuesta9_edad' => 'required',
                'respuesta10' => 'required',
                'respuesta11_provincia' => 'required',
                'respuesta11_distrito' => 'required',
                'respuesta11_direccion' => 'required',
                'respuesta12' => 'required',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.denuncia-violencia-familiar')
            ->extends('template.index')
            ->section('cuerpo');
    }

    public function back()
    {
        return redirect()->route('home');
    }
}
