<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancos = Banco::all();
        return view("bancos.index", compact('bancos'));
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
            'banco' => 'required|string',
            'direccion' => 'required|string',
            'codigo_banco' => 'required|string',
        ]);

        $banco = new Banco();
        $banco->banco = $request->banco;
        $banco->direccion = $request->direccion;
        $banco->codigo = $request->codigo_banco;
        $banco->save();

        return redirect()->route('bancos.index')->with('success', 'Banco '.$request->banco.' registrado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(Banco $banco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function edit(Banco $banco)
    {
        return view("bancos.edit", compact('banco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banco $banco)
    {
        $this->validate($request, [
            'banco' => 'required|string',
            'direccion' => 'required|string',
            'codigo_banco' => 'required|string',
        ]);

        $banco->banco = $request->banco;
        $banco->direccion = $request->direccion;
        $banco->codigo = $request->codigo_banco;
        $banco->save();
        
        return redirect()->route('bancos.index')->with('success', 'Banco '.$banco->banco.' actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banco $banco)
    {
        $banco->delete();
        return redirect()->route('bancos.index')->with('success', 'Banco eliminado exitosamente.'); 
    }
}
