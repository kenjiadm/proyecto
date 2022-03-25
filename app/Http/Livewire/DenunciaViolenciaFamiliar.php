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
    }

    public function decrease($tag){
        if ($tag === 'agresor') {
            $this->agresor_rows > 1 ? $this->agresor_rows-- : $this->agresor_rows;
            if(count($this->agresores) > 1){array_pop($this->agresores);} 
        }
        if ($tag === 'agredido') {
            $this->agredido_rows > 1 ? $this->agredido_rows-- : $this->agredido_rows;
            if(count($this->agredidos) > 1){array_pop($this->agredidos);} 
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
            'respuesta12' => $this->respuesta12,
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


        $testigo2 = '';
        if($this->respuesta1 === 'si' || $this->respuesta5 === 'si'){
            $templateCarta->setValue('testigo1', "; al haber sido testigo de éstos.");
            $testigo2 = " he sido testigo que";
            $templateCarta->setValue('testigo3', ", es testigo de los mismos.");
        } else {
            $templateCarta->setValue('testigo1', ".");
            $templateCarta->setValue('testigo3', ".");
        }

        $respuesta3 = date('d-m-Y' ,strtotime($this->respuesta3));

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

        $respuesta10text = $this->respuesta10;

        if($respuesta10text === 'otro'){
            $respuesta10text = $this->rp10otro;
        }
        $respuesta10 = ", con quien tiene una relación de: {$respuesta10text}.";

        $check = 0;
        $violenciafisica = '';
        $respuesta4 = '';
        if ($this->respuesta1 === 'si' || $this->respuesta2 === 'si') {
            if (sizeof($this->respuesta4) !== 0) {
                $check++;
                $respuesta4Array = array_map(fn($value) => $value === 'otro' ? $this->rp4otro : $value , $this->respuesta4);
                $violenciafisica = 'Violencia fisica';
                $respuesta4 = '(';
                for ($i=0; $i < count($respuesta4Array); $i++) {
                    if ($i !== 0) {
                        $respuesta4 .= ', ';
                    } 
                    $respuesta4 .= "{$respuesta4Array[$i]}";
                }
                $respuesta4 .= ')';
            }
        } 
        $respuesta7 = '';
        $violenciapsicologica = '';
        if ($this->respuesta5 === 'si' || $this->respuesta6 === 'si') {
            if (sizeof($this->respuesta7) !== 0) {
                $check++;
                $respuesta7Array = array_map(fn($value) => $value === 'otro' ? $this->rp4otro : $value , $this->respuesta7);
                $violenciapsicologica = 'Violencia psicologica';
                $respuesta7 = '(';
                for ($i=0; $i < count($respuesta7Array); $i++) { 
                    if ($i !== 0) {
                        $respuesta7 .= ', ';
                    }
                    $respuesta7 .= "{$respuesta7Array[$i]}";
                }
                $respuesta7 .= ')';
            } 
        }
        $y = ($check === 2) ? ' y ' : '';

        if(count($this->agredidos) === 1){
            $templateCarta->setValue('parrafo', "
                El día {$respuesta3},{$testigo2} la persona {$agredidos}, ha sido víctima de {$violenciafisica} {$respuesta4}{$y}{$violenciapsicologica} {$respuesta7} de parte de {$agresores}{$respuesta10}
            ");
        } else {
            $templateCarta->setValue('parrafo', "
                El día {$respuesta3},{$testigo2} las personas {$agredidos}, han sido víctimas de {$violenciafisica} {$respuesta4}{$y}{$violenciapsicologica} {$respuesta7} de parte de {$agresores}{$respuesta10}
            ");
        }

        $lugares = '';
        foreach ($this->lugares as $key => $lugar) {
            if($key !== 0){
                $lugares .= '; ';
            }
            $lugares .= "{$lugar['direccion']}, {$lugar['distrito']}, {$lugar['provincia']}";
        }
        $templateCarta->setValue('lugares', $lugares);

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
                'respuesta1' => 'required_if:respuesta2,no',
                'respuesta1_1' => 'required_if:respuesta1,si',
                'respuesta1_1_a_cargo' => 'required_if:respuesta1_1,a',
                'respuesta1_1_a_lugar' => 'required_if:respuesta1_1,a',
                'respuesta1_1_b_cargo' => 'required_if:respuesta1_1,b',
                'respuesta1_1_b_lugar' => 'required_if:respuesta1_1,b',
                'respuesta1_1_c_relacion' => 'required_if:respuesta1_1,c',
                'respuesta1_1_d_relacion' => 'required_if:respuesta1_1,d',
                'respuesta3' => 'required|before:tomorrow',
                'respuesta5' => 'required_if:respuesta6,no',
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
        if ($this->respuesta2 === 'si') {
            $this->respuesta1 = 'no';
        }
        if ($this->respuesta6 === 'si') {
            $this->respuesta5 = 'no';
        }

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
