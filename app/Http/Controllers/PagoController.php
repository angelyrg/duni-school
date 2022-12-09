<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\Pago;
use App\Traits\DeudaTrait;
use Illuminate\Http\Request;



use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class PagoController extends Controller
{
    use DeudaTrait;
    public $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];


    public function index(){
        $meses = $this->meses;
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos', 'meses'));
    }

    public function create(){
        $meses = $this->meses;
        $bancos = Banco::all();
        return view("pagos.create", compact('bancos', 'meses'));
    }

    public function store(Request $request){
        $today = getdate();
        $pago = new Pago();
        $pago->matricula_id = $request->matricula_id;
        $pago->num_recibo = $today[0];

        //$concepto = $request->concepto;

        if ($request->concepto == "Mensualidad"){
            $concepto = date('m');
        }else{
            $concepto = $request->concepto;
        }
        
        $pago->concepto = $concepto;
        $pago->mes_pago = $request->mes_pagado; //Mes de pago
        $pago->ticket_banco = $request->numero_ticket; //Num ticket


        $pago->medio_pago = $request->medio_pago;
        $pago->monto = $request->monto;
        $pago->save();

        $this->updateDeuda($request->matricula_id, $request->monto);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');
    }



    public function generateInvoice(Pago $pago){

        $client = new Party([
            'name'          => "I.E. COLEGIO D'UNI",
            'custom_fields' => [
                'Dirección' => 'Chupaca, Huancayo',
                'RUC' => '10064564154',
                'Teléfono' => '929006040',
            ],
        ]);

        $customer = new Party([
            'name'          => $pago->matricula->estudiante->nombres_estudiante." ".$pago->matricula->estudiante->apellidos_estudiante,
            'custom_fields' => [
                'Grado y sección' =>$pago->matricula->grado." ".$pago->matricula->seccion,
                'Cod. Matrícula'=> $pago->matricula->cod_matricula,
                'Apoderado'       => $pago->matricula->apoderado->nombres_apoderado." ".$pago->matricula->apoderado->apellidos_apoderado,
            ],
        ]);

        $concepto = "";
        if ($pago->concepto == 0){
            $concepto = "Matrícula";
        }else if($pago->concepto > 0 && $pago->concepto < 13){
            $concepto = "Mensualidad: ".$this->meses[$pago->concepto - 1];
        }else{
            $concepto = "Otro";
        }

        $items = [
            (new InvoiceItem())->title($concepto)->pricePerUnit($pago->monto)->quantity(1)
        ];

        $invoice = Invoice::make('Factura')
            ->status(__('invoices::invoice.paid'))
            ->seller($client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat('d/m/Y')
            ->payUntilDays(0)
            ->currencySymbol('S/')
            ->currencyCode('soles')
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename('Factura'.$pago->id)
            ->addItems($items)
            ->logo(public_path('assets/img/logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
