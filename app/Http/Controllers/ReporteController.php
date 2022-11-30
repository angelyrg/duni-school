<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){
        $matriculas = Matricula::where('deuda', '>=', 0)->get();

        //return $matriculas;
        return view("reportes.index", compact('matriculas'));
    }

}
