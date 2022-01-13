<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncia;
use App\Models\Denunciante;
use PDF;

class DenunciaController extends Controller
{
   
    public function index()
    {
        //
    }

    public function crear(Request $request)
    {
        //
        $datos1 = $request->all();
        $name = $datos1['name_denunciante'];
        $lastname = $datos1['lastname_denunciante'];
        $dni = $datos1['dni_denunciante'];
        $direccion = $datos1['direccion_denunciante'];
        $distrito = $datos1['distrito_denunciante'];
        $provincia = $datos1['ciudad_denunciante'];
        $email = $datos1['email_denunciante'];
        $celular = $datos1['celular_denunciante'];
        
        Denunciante::create([
            'name' => $name, 
            'lastname' => $lastname,
            'email' => $email,
            'dni' => $dni,
            'direccion' => $direccion,
            'distrito' => $distrito,
            'provincia' => $provincia,
            'celular' => $celular,
        ]);

        return view('denuncia.denuncia');

    }

    public function crear2(Request $request)
    {
        //
        $datos1 = Denunciante::first();
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
}
