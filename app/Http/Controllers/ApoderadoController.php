<?php

namespace App\Http\Controllers;

use App\Models\Apoderado;
use Illuminate\Http\Request;

class ApoderadoController extends Controller
{

    public function index()
    {
        $apoderados = Apoderado::all();
        return view("apoderados.index", compact('apoderados'));
    }

    public function create(){
        return view("apoderados.create");
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'dni_apoderado' => 'required|digits:8|max:8|unique:apoderados',
            'nombres_apoderado' => 'required|string',
            'apellidos_apoderado' => 'required|string',
            'celular_apoderado' => 'digits:9|max:9',
        ]);


        $user = new Apoderado();
        $user->dni_apoderado = $request->dni_apoderado;
        $user->nombres_apoderado = $request->nombres_apoderado;
        $user->apellidos_apoderado = $request->apellidos_apoderado;
        $user->celular_apoderado = $request->celular_apoderado;
        //Auth::user()->id;
        $user->save();

        return redirect()->route('apoderados.index')->with('success', 'Apoderado '.$request->nombres_apoderado.' agregado exitosamente.');

    }



    public function edit(Apoderado $apoderado)
    {
        return view("apoderados.edit", compact('apoderado'));

    }


    public function update(Request $request, Apoderado $apoderado)
    {
        $this->validate($request, [
            'dni_apoderado' => 'required|digits:8|max:81unique:apoderados',
            'nombres_apoderado' => 'required|string',
            'apellidos_apoderado' => 'required|string',
            'celular_apoderado' => 'digits:9|max:9',
        ]);

        $apoderado->dni_apoderado = $request->dni_apoderado;
        $apoderado->nombres_apoderado = $request->nombres_apoderado;
        $apoderado->apellidos_apoderado = $request->apellidos_apoderado;
        $apoderado->celular_apoderado = $request->celular_apoderado;
        $apoderado->save();
        
        return redirect()->route('apoderados.index')->with('success', 'Apoderado '.$request->nombres_apoderado.' actualizado exitosamente.');
    }


    public function destroy(Apoderado $apoderado)
    {
        $apoderado->delete();        
        return redirect()->route('apoderados.index')->with('success', 'Apoderado eliminado exitosamente.'); 

    }

    public function getApoderadobyDNI(Request $request){
        $dni = $request->dni;
        $apoderado = Apoderado::where('dni_apoderado', $dni)->get();  
        return response()->json($apoderado);
    }
}
