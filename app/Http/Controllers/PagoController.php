<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\Pago;
use App\Traits\DeudaTrait;
use Illuminate\Http\Request;



// use LaravelDaily\Invoices\Invoice;
// use LaravelDaily\Invoices\Classes\Buyer;
// use LaravelDaily\Invoices\Classes\InvoiceItem;


class PagoController extends Controller
{
    use DeudaTrait;

    


    public function index()
    {
        //$matriculas = Matricula::all();
        $pagos = Pago::paginate(6);
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = Banco::all();
        return view("pagos.create", compact('bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = new Pago();
        $pago->matricula_id = $request->matricula_id;
        $pago->num_recibo = "R-001";
        $pago->concepto = $request->concepto;
        $pago->medio_pago = $request->medio_pago;
        $pago->monto = $request->monto;
        $pago->save();

        $this->updateDeuda($request->matricula_id, $request->monto);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }

    // public function generateInvoice(Pago $pago){
    //     $customer = new Buyer([
    //         'name'          => 'John Doe',
    //         'custom_fields' => [
    //             'email' => 'test@example.com',
    //         ],
    //     ]);

    //     $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

    //     $invoice = Invoice::make()
    //         ->buyer($customer)
    //         ->discountByPercent(10)
    //         ->taxRate(15)
    //         ->shipping(1.99)
    //         ->addItem($item);

    //     return $invoice->stream();
    // }
}
