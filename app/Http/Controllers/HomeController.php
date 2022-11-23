<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Pago;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $pagos_matricula = Pago::sum('monto');
        $ctd_matricula = Matricula::count('id');

        return view("home", compact('pagos_matricula', 'ctd_matricula'));
    }
}
