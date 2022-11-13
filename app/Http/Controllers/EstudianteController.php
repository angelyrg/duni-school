<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::paginate(6);
        return view("estudiantes.index", compact('estudiantes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dni_estudiante' => 'required|digits:8|max:8',
            'nombres_estudiante' => 'required|string',
            'apellidos_estudiante' => 'required|string',
        ]);


        $user = new Estudiante();
        $user->dni_estudiante = $request->dni_estudiante;
        $user->nombres_estudiante = $request->nombres_estudiante;
        $user->apellidos_estudiante = $request->apellidos_estudiante;
        $user->save();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante '.$request->nombre_usuario.' agregado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return view("estudiantes.edit", compact('estudiante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $this->validate($request, [
            'dni_estudiante' => 'required|digits:8|max:8',
            'nombres_estudiante' => 'required|string',
            'apellidos_estudiante' => 'required|string',
        ]);

        $estudiante->dni_estudiante = $request->dni_estudiante;
        $estudiante->nombres_estudiante = $request->nombres_estudiante;
        $estudiante->apellidos_estudiante = $request->apellidos_estudiante;
        $estudiante->save();
        
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante '.$request->nombres_estudiante.' actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();        
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente.'); 

    }
}
