<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denunciante;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Karriere\PdfMerge\PdfMerge;

class DenunciaController extends Controller
{
   
    public function index()
    {
        //
    }

    public function crear(Request $request)
    {
        //
        $validated = $request->validate([
            'name_denunciante' => 'required' ,
            'lastname_denunciante' => 'required' ,
            'dni_denunciante' => 'required' ,
            'direccion_denunciante' => 'required' ,
            'distrito_denunciante' => 'required' ,
            'ciudad_denunciante' => 'required' ,
            'email_denunciante' => 'required' ,
            'celular_denunciante' => 'required' ,
            'tipo_denuncia' => 'required' ,
            'confirmacion' => 'accepted' ,
        ]);
        
        $name = $validated['name_denunciante'];
        $lastname = $validated['lastname_denunciante'];
        $dni = $validated['dni_denunciante'];
        $direccion = $validated['direccion_denunciante'];
        $distrito = $validated['distrito_denunciante'];
        $provincia = $validated['ciudad_denunciante'];
        $email = $validated['email_denunciante'];
        $celular = $validated['celular_denunciante'];
        $tipoDenuncia = $validated['tipo_denuncia'];
        
        $denunciante = Denunciante::create([
            'name' => $name, 
            'lastname' => $lastname,
            'email' => $email,
            'dni' => $dni,
            'direccion' => $direccion,
            'distrito' => $distrito,
            'provincia' => $provincia,
            'celular' => $celular,
        ]);

        if ($tipoDenuncia === 'denuncia1') {
           return view('denuncia.denuncia', compact('denunciante'));
        }
        if ($tipoDenuncia === 'denuncia2') {
            return view('denuncia.violencia_familiar_denuncia', ['id' => $denunciante->id]);
         }
        

    }

    public function crear2(Request $request, $denuncianteId)
    {
        //
        $datos1 = Denunciante::find($denuncianteId);
        $nombre = $datos1['name'];
        $datos2 = $request->all();


        /* $recibo_archivo = $datos2['recibo_archivo']; */

        $pdf = PDF::loadView('pdf.denuncia', compact( 'datos1' , 'datos2' ));
        return $pdf->download('denuncia.pdf');

        /* if($request->hasFile('recibo_archivo')){
            $file=$request->file('recibo_archivo');
            $nombre = "pdf_".time().".".$file->guessExtension();
            $file->store('public');
            
        } */

    }

    public function crear3(Request $request, $denuncianteId)
    {
        $validated = $request->validate([
            "respuesta2" => 'required',
            "respuesta6" => 'required',
            "respuesta1" => 'required',
            "respuesta3" => 'required',
            "respuesta4" => 'required',
            "respuesta5" => 'required',
            "respuesta7" => 'required',
            "respuesta8_nombre" => 'required',
            "respuesta8_edad" => 'required',
            "respuesta9_nombre" => 'required',
            "respuesta9_edad" => 'required',
            "respuesta10" => 'required',
            "respuesta11_provincia" => 'required',
            "respuesta11_distrito" => 'required',
            "respuesta11_direccion" => 'required',
            "respuesta12" => 'required',
            "archivo_dni" => 'required|mimes:jpg,jpeg,png,pdf|max:600',
            "anexo1_archivo" => 'mimes:jpg,jpeg,png,pdf|max:600',
            "anexo2_archivo" => 'mimes:jpg,jpeg,png,pdf|max:600',
        ]);

        // recolectar datos
        $datos1 = Denunciante::find($denuncianteId);
        $nombre = $datos1['name'];
        $datos2 = $request->all();
        $datos2['anexos'] = [];       
        $folder = uniqid() . now()->timestamp . $nombre;

        // Transformar imagen a pdf
        $this->saveAsPDF($request->archivo_dni, $folder, 'dni');
        
        if($request->hasFile('anexo1_archivo')){
            array_push($datos2['anexos'],
            empty($request->anexo1_nombre) ? 
            'anexo1_nombre' : 
            $request->anexo1_nombre
            );
            $this->saveAsPDF($request->anexo1_archivo, $folder, 'anexo1_nombre' );    
        }
        if($request->hasFile('anexo2_archivo')){
            array_push($datos2['anexos'],
            empty($request->anexo2_nombre) ? 
            'anexo2_nombre' : 
            $request->anexo2_nombre
            );
            $this->saveAsPDF($request->anexo2_archivo, $folder, 'anexo2_nombre' );    
        }
 
        // generar pdf carta

        $pdfCarta = PDF::loadView('pdf.violencia_familiar_denuncia', compact( 'datos1' , 'datos2' ));
        Storage::disk('local')->put( $folder . '/denuncia.pdf' ,$pdfCarta->output());

        // unir pdfs
        $pdfMerge = new PdfMerge();

        $pdfMerge->add(storage_path('app/'.$folder.'/denuncia.pdf'));

        $pdfMerge->add(storage_path('app/'.$folder.'/dni.pdf'));

        if($request->hasFile('anexo1_archivo')){
            $pdfMerge->add(storage_path('app/'.$folder.'/anexo1_nombre.pdf'));
        }
        if($request->hasFile('anexo2_archivo')){
            $pdfMerge->add(storage_path('app/'.$folder.'/anexo2_nombre.pdf'));
        }        
        $pdfMerge->merge(storage_path('app/'.$folder.'/Denuncia Completa.pdf'));

        return Storage::download($folder . '/Denuncia Completa.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function filterFileName($palabra) 
    {
       return str_replace( " " , "_", preg_replace("/[^\p{Latin}0-9._ -]/u", "", $palabra));
    }

    private function saveAsPDF($archivo, $folder, $name){
        if (str_contains($archivo->getClientMimeType(), 'image')) 
        {
            $path = $archivo->store($folder,'local');
            $type = pathinfo(storage_path('app/'.$path), PATHINFO_EXTENSION);
            $data = file_get_contents(storage_path('app/'.$path));
            $base64 = 'data:image/'. $type . ';base64,' . base64_encode($data);
            $pdfDni = PDF::loadHTML('<img src="' . $base64 .'" style="width: 100%" />');            
            Storage::disk('local')->put( $folder . '/'.$name .'.pdf' ,$pdfDni->output());
            Storage::delete($folder. '/' . $archivo->hashName());
        } else {
            $archivo->storeAs($folder, $name .'.pdf','local');
        }
    }
}
