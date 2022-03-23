<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;

class DenunciaViolenciaFamiliar extends Component
{
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
    public $respuesta1_1_d_relacion;
    public $respuesta3;
    public $respuesta4 = [];
    public $rp4otro;
    public $respuesta5;
    public $respuesta5_1;
    public $respuesta5_1_a_cargo;
    public $respuesta5_1_a_lugar;
    public $respuesta5_1_b_cargo;
    public $respuesta5_1_b_lugar;
    public $respuesta5_1_c_relacion;
    public $respuesta5_1_d_relacion;
    public $respuesta7 = [];
    public $rp7otro;
    public $respuesta9;
    public $respuesta10;
    public $rp10otro;
    public $respuesta12;
    public $advertensia;
    public $confirmacion_anexos;

    public $agresores = [];
    public $agredidos = [];
    public $lugares = [];

    public $headers_agredido = [
        'nombre',
        'apellidos',
        'edad'
    ];

    public $headers_agresor = [
        'nombre',
        'apellidos'
    ];

    public $headers_lugares = [
        'direccion',
        'distrito',
        'provincia',
    ];
    public $agresor_rows;
    public $agredido_rows;
    public $lugar_rows;

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
        'respuesta1_1_d_relacion',
        'respuesta3',
        'respuesta4',
        'respuesta5',
        'respuesta5_1',
        'respuesta5_1_a_cargo',
        'respuesta5_1_a_lugar',
        'respuesta5_1_b_cargo',
        'respuesta5_1_b_lugar',
        'respuesta5_1_c_relacion',
        'respuesta5_1_d_relacion',
        'respuesta7',
        'respuesta9',
        'respuesta10',
        'respuesta12',
        'advertensia'
    ];

    public $respuestas = [];

    //step count

    public $totalCount = 2;
    public $currentCount;

    public function mount()
    {
        $this->currentCount = 1;
        $this->agresor_rows = 1;
        $this->agredido_rows = 1;
        $this->lugar_rows = 1;

    }

    public function increase($tag){
        if ($tag === 'agresor') {
            $this->agresor_rows < 4 ? $this->agresor_rows++ : $this->agresor_rows;
        }
        if ($tag === 'agredido') {
            $this->agredido_rows < 4 ? $this->agredido_rows++ : $this->agredido_rows;
        }
        if ($tag === 'lugar') {
            $this->lugar_rows < 4 ? $this->lugar_rows++ : $this->lugar_rows;
        }
    }

    public function decrease($tag){
        if ($tag === 'agresor') {
            $this->agresor_rows > 1 ? $this->agresor_rows-- : $this->agresor_rows;
        }
        if ($tag === 'agredido') {
            $this->agredido_rows > 1 ? $this->agredido_rows-- : $this->agredido_rows;
        }
        if ($tag === 'lugar') {
            $this->lugar_rows > 1 ? $this->lugar_rows-- : $this->lugar_rows;
        }
    }

    public function increaseCount(){
        $this->resetErrorBag();
        $this->advertensia = '';
        $this->validateData();
        if($this->currentCount === $this->totalCount) return;
        $this->currentCount++;
        $this->emit('foo');
    }

    public function decreaseCount(){
        $this->resetErrorBag();
        $this->advertensia = '';
        if($this->currentCount === 0) return;
        $this->currentCount--;
        $this->emit('foo');
    }

    public function test(){
        $agresores = '';
        foreach ($this->agresores as $key => $agresor) {
            if($key !== 0){
                $agresores .= ',';
            }
            $agresores .= "{$agresor['nombre']} {$agresor['apellidos']} ({$agresor['edad']})";
        }
        dd($agresores);
    }

    public function generarDenuncia()
    {
        $this->resetErrorBag();
        $this->advertensia = '';
        $this->validateData();
     
        $fileName = uniqid() . now()->timestamp;
        
 
        // generar word carta

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $templateCarta = new TemplateProcessor('storage/denuncia_modelo.docx');
        $templateCarta->setValues([
            'lugar0_distrito' => strtoupper($this->lugares[0]['distrito']),
            'lugar0_provincia' => strtoupper($this->lugares[0]['provincia']),
            'name' => $this->name_denunciante,
            'lastname' => $this->lastname_denunciante,
            'dni' => $this->dni_denunciante,
            'direccion' => $this->direccion_denunciante,
            'distrito' => $this->distrito_denunciante,
            'provincia' => $this->ciudad_denunciante,
            'respuesta3' => date('d-m-Y' ,strtotime($this->respuesta3)),
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
        $agresores = '';
        if($this->respuesta9 === 'si'){
            foreach ($this->agresores as $key => $agresor) {
                if($key !== 0){
                    if(count($this->agresores) === ($key + 1)){
                        $agresores .= ' y ';
                    } else {
                        $agresores .= ', ';
                    }     
                }
                $agresores .= "{$agresor['nombre']} {$agresor['apellidos']}";
                if (!empty($agresor['edad'])) {
                    $agresores .= "({$agresor['edad']})";
                }
            }
        }
        if($this->respuesta9 === 'no'){
            $agresores = 'los que resulten responsables';
        }
        $templateCarta->setValue('agresores', $agresores);

        $respuesta10 = $this->respuesta10;
            if($respuesta10 === 'otro'){
                $respuesta10 = $this->rp10otro;
            }
        $templateCarta->setValue('respuesta10', ", con quien tiene una relación de {$respuesta10}");

        $agredidos = '';
        foreach ($this->agredidos as $key => $agredido) {
            if($key !== 0){
                if(count($this->agredidos) === ($key + 1)){
                    $agredidos .= ' y ';
                } else {
                    $agredidos .= ', ';
                }  
            }
            $agredidos .= "{$agredido['nombre']} {$agredido['apellidos']}";
            if (!empty($agredido['edad'])) {
                $agredidos .= "({$agredido['edad']})";
            }
        }
        $templateCarta->setValue('agredidos', $agredidos);

        $lugares = '';
        foreach ($this->lugares as $key => $lugar) {
            if($key !== 0){
                $lugares .= '; ';
            }
            $lugares .= "{$lugar['direccion']}, {$lugar['distrito']}, {$lugar['provincia']}";
        }
        $templateCarta->setValue('lugares', $lugares);

        $check = 0;
        if ($this->respuesta1 === 'si' || $this->respuesta2 === 'si') {
            if (sizeof($this->respuesta4) !== 0) {
                $check++;
                $respuesta4 = array_map(fn($value) => $value === 'otro' ? $this->rp4otro : $value , $this->respuesta4);
                $templateCarta->setValue( 'violenciafisica', 'Violencia fisica' );
                $rpta4items = '(';
                for ($i=0; $i < count($respuesta4); $i++) {
                    if ($i !== 0) {
                        $rpta4items .= ', ';
                    } 
                    $rpta4items .= "{$respuesta4[$i]}";
                }
                $rpta4items .= ')';
                $templateCarta->setValue('respuesta4', $rpta4items);
            } else {
                $templateCarta->setValue( 'violenciafisica', '' );
                $templateCarta->setValue('respuesta4', '');
            }
        } else {
            $templateCarta->setValue( 'violenciafisica', '' );
            $templateCarta->setValue('respuesta4', '');
        }

        if ($this->respuesta5 === 'si' || $this->respuesta6 === 'si') {
            if (sizeof($this->respuesta7) !== 0) {
                $check++;
                $respuesta7 = array_map(fn($value) => $value === 'otro' ? $this->rp4otro : $value , $this->respuesta7);
                $templateCarta->setValue( 'violenciapsicologica', 'Violencia psicologica' );
                $rpta7items = '(';
                for ($i=0; $i < count($respuesta7); $i++) { 
                    if ($i !== 0) {
                        $rpta7items .= ', ';
                    }
                    $rpta7items .= "{$respuesta7[$i]}";
                }
                $rpta7items .= ')';
                $templateCarta->setValue('respuesta7', $rpta7items);
            } else {
                $templateCarta->setValue( 'violenciapsicologica', '' );
                $templateCarta->setValue('respuesta7', '');
            }
        } else {
            $templateCarta->setValue( 'violenciapsicologica', '' );
            $templateCarta->setValue('respuesta7', '');
        }

        if($check === 2){
            $templateCarta->setValue( 'y', 'y' );
        } else {
            $templateCarta->setValue( 'y', '' );
        }

        if($this->respuesta2 === 'si' || $this->respuesta6 === 'si'){
            $templateCarta->setValue( 'rpta2y6', 'SI' );
        } else {
            $templateCarta->setValue( 'rpta2y6', 'NO' );
        }

        $templateCarta->saveAs('storage/' . $fileName .'.docx');
        return response()->download('storage/' . $fileName .'.docx', 'violencia_familiar.docx')->deleteFileAfterSend(true);
    }

    public function validateData()
    {
        if ($this->currentCount === 1) {
            $this->validate([
                'name_denunciante' => 'required|max:100',
                'lastname_denunciante' => 'required|max:100',
                'dni_denunciante' => 'required|digits:8',
                'direccion_denunciante' => 'required|max:300',
                'distrito_denunciante' => 'required|max:100',
                'ciudad_denunciante' => 'required|max:100',
                'email_denunciante' => 'required|email|max:100',
                'celular_denunciante' => 'required|digits_between:9,12',
                'confirmacion' => 'required|accepted',
            ],[
                'required' => 'Este campo es obligatorio',
                'accepted' => 'Es obligatorio que marque este campo',
                'email' => 'Ingrese un email válido',
                'digits' => 'Este campo debe tener :digits digitos',
                'digits_between' => 'Este campo debe tener entre :min y :max digitos',
                'max' => 'Este campo no debe tener más de :max caracteres'
            ]);
        }
        if ($this->currentCount === 2) {
            $array = [
                $this->respuesta5,
                $this->respuesta6,
                $this->respuesta2,
                $this->respuesta1,
            ];
            if (!in_array('si',$array, true)) {
                $this->advertensia = 'Tiene que existir una victima.';
            }
            $valiArray = [
                'respuesta2' => 'required',
                'respuesta6' => 'required',
                'respuesta1' => 'required',
                'respuesta1_1' => 'required_if:respuesta1,si',
                'respuesta1_1_a_cargo' => 'required_if:respuesta1_1,a',
                'respuesta1_1_a_lugar' => 'required_if:respuesta1_1,a',
                'respuesta1_1_b_cargo' => 'required_if:respuesta1_1,b',
                'respuesta1_1_b_lugar' => 'required_if:respuesta1_1,b',
                'respuesta1_1_c_relacion' => 'required_if:respuesta1_1,c',
                'respuesta1_1_d_relacion' => 'required_if:respuesta1_1,d',
                'respuesta3' => 'required|before:tomorrow',
                'respuesta5' => 'required',
                'respuesta5_1' => 'required_if:respuesta5,si',
                'respuesta5_1_a_cargo' => 'required_if:respuesta5_1,a',
                'respuesta5_1_a_lugar' => 'required_if:respuesta5_1,a',
                'respuesta5_1_b_cargo' => 'required_if:respuesta5_1,b',
                'respuesta5_1_b_lugar' => 'required_if:respuesta5_1,b',
                'respuesta5_1_c_relacion' => 'required_if:respuesta5_1,c',
                'respuesta5_1_d_relacion' => 'required_if:respuesta5_1,d',
                'respuesta9' => 'required',
                'respuesta10' => 'required',
                'agresores.*.nombre' => 'string|max:300|filled|distinct:strict',
                'agresores.*.apellidos' => 'string|max:300|filled|distinct:strict',
                'agresores.0.nombre' => 'string|max:300|required_if:respuesta9,si',
                'agresores.0.apellidos' => 'string|max:300|required_if:respuesta9,si',
                'agredidos.*.nombre' => 'string|max:300|filled|distinct:strict',
                'agredidos.*.apellidos' => 'string|max:300|filled|distinct:strict',
                'agredidos.0.nombre' => 'string|max:300|required',
                'agredidos.0.apellidos' => 'string|max:300|required',
                // 'lugares.*.direccion' => 'string|max:500|filled|distinct:strict',
                // 'lugares.*.distrito' => 'string|max:300|filled|distinct:strict',
                // 'lugares.*.provincia' => 'string|max:300|filled|distinct:strict',
                'lugares.0.direccion' => 'string|max:500|required',
                'lugares.0.distrito' => 'string|max:300|required',
                'lugares.0.provincia' => 'string|max:300|required',
                'respuesta12' => 'required',
            ];
            
            if($this->respuesta5 === 'si' || $this->respuesta6 === 'si'){
                $valiArray['respuesta7'] = 'required|array';
                if(in_array('otro',$this->respuesta7)){
                    $valiArray['rp7otro'] = 'required';
                }
            }
            if($this->respuesta1 === 'si' || $this->respuesta2 === 'si'){
                $valiArray['respuesta4'] = 'required|array';
                if(in_array('otro',$this->respuesta4)){
                    $valiArray['rp4otro'] = 'required';
                }
            }
            if($this->respuesta10 === 'otro'){
                $valiArray['rp10otro'] = 'required';
            }

            $this->validate($valiArray,[
                'required' => 'Este campo es obligatorio',
                'required_if' => 'Este campo es obligatorio',
                'accepted' => 'Es obligatorio que marque este campo',
                'email' => 'Ingrese un email válido',
                'digits' => 'Este campo debe tener :digits digitos',
                'digits_between' => 'Este campo debe tener entre :min y :max digitos',
                'max' => 'Este campo no debe tener más de :max caracteres',
                'distinct' => 'No pueden haber nombres duplicados',
                'filled' => 'No deje campos vacios',
                'before' => 'La fecha no puede ser en el futuro'
            ]);
        }
    }

    public function render()
    {
        foreach ($this->names as $value) {
            $this->respuestas[$value] = $this->{$value};
        }

        return view('livewire.denuncia-violencia-familiar')
            ->extends('template.index')
            ->section('cuerpo');
    }

    public function back()
    {
        return redirect()->route('home');
    }
}
