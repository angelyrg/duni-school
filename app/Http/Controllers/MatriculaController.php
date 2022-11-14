<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatriculaStoreRequest;
use App\Models\Banco;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{

    public $grados = [
        ["3 Años", "4 años", "5 años"],
        ["1°", "2°", "3°", "4°", "5°", "6°"],
        ["1°", "2°", "3°", "4°", "5°"],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = Matricula::paginate(6);
        return view("matriculas.index", compact('matriculas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = Banco::all();
        $grados =  $this->grados;
        return view("matriculas.create", compact('bancos', 'grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaStoreRequest $request)
    {

        $matricula = new Matricula();
        $matricula->monto = $request->monto;
        $matricula->apoderado = $request->nombres_apoderado." ".$request->apellidos_apoderado;
        $matricula->nivel = $request->nivel;
        $matricula->grado = $request->grado;
        $matricula->seccion = $request->seccion;
        $matricula->estudiante_id = $request->estudiante_id;        
        
        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'Matrícula registrado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $grados =  $this->grados;
        $bancos = Banco::all();
        return view("matriculas.edit", compact('matricula', 'grados', 'bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        $this->validate($request, [
            'nivel' => 'required|string',
            'grado' => 'required|string',
            'seccion' => 'required|string',
            'monto' => 'required',
            'banco' => 'required|string',
            'dni_apoderado' => 'required|digits:8',
            'nombres_apoderado' => 'required|string',
            'apellidos_apoderado' => 'required|string',
        ]);

        $matricula->monto = $request->monto;
        $matricula->apoderado = $request->nombres_apoderado." ".$request->apellidos_apoderado;
        $matricula->nivel = $request->nivel;
        $matricula->grado = $request->grado;
        $matricula->seccion = $request->seccion;
        $matricula->estudiante_id = $request->estudiante_id;        
        $matricula->save();
        
        return redirect()->route('matriculas.index')->with('success', 'Registro actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->route('matriculas.index')->with('success', 'Registro eliminado exitosamente.'); 
    }
}
