<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\Pago;
use App\Traits\DeudaTrait;
use Illuminate\Http\Request;



use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class PagoController extends Controller
{
    use DeudaTrait;

    public function index(){
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    public function create(){
        $bancos = Banco::all();
        return view("pagos.create", compact('bancos'));
    }

    public function store(Request $request){
        $today = getdate();
        $pago = new Pago();
        $pago->matricula_id = $request->matricula_id;
        $pago->num_recibo = $today[0];
        $pago->concepto = $request->concepto;
        $pago->medio_pago = $request->medio_pago;
        $pago->monto = $request->monto;
        $pago->save();

        $this->updateDeuda($request->matricula_id, $request->monto);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');

    }



    public function generateInvoice(Pago $pago){
        $customer = new Buyer([
            'name'          => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }
}
