<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];

    public function index(){
        $meses = $this->meses;        
        $matriculas = Matricula::all();
        $mes =  date('m');
        // $pagos = Pago::whereYear('created_at', date('Y'))
        // ->get();
        return view("reportes.index", compact( 'matriculas', 'meses'));
    }
    
    
    public function filterByMonth(Request $request){
        
        $meses = $this->meses;
        $matriculas = Matricula::all();

        $fecha_selected = $request->selected_month;

        //$mes =  $request->selected_month;
        // $pagos = Pago::where('mes_pago', $fecha_selected)
        // ->whereYear('created_at', date('Y'))
        // ->get();

        return view("reportes.index", compact('matriculas', 'fecha_selected', 'meses'));

    }




}
