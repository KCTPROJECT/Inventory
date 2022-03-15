<?php

namespace App\Http\Controllers;

use App\Client;
use App\Sale;
use App\Product;
use Carbon\Carbon;
use App\SoldProduct;
use App\Transaction;
use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Salesinvoice;
use App\Salesreturn;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sales = Sale::latest()->paginate(25);

        // return view('sales.index', compact('sales'));

         $sales = Salesinvoice::latest()->paginate(25);

        return view('sales.invoices.index', compact('sales'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $clients = Client::all();

        // return view('sales.create', compact('clients'));
         $sales = Salesinvoice::all();

        return view('sales.invoices.create', compact('sales'));
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeinvoice(Request $request, Salesinvoice $invoices)
    {
        $invoices->create($request->all());
        return redirect()->route('sales.index')->withStatus('Successfully Registered Sale Invoice.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sale $model)
    {
        $existent = Sale::where('client_id', $request->get('client_id'))->where('finalized_at', null)->get();

        if($existent->count()) {
            return back()->withError('There is already an unfinished sale belonging to this customer. <a href="'.route('sales.show', $existent->first()).'">Click here to go to it</a>');
        }

        $sale = $model->create($request->all());
        
        return redirect()
            ->route('sales.show', ['sale' => $sale->id])
            ->withStatus('Sale registered successfully, you can start registering products and transactions.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Salesinvoice $sale)
    {
        return view('sales.invoices.edit', compact('sale'));
    }
    public function update(Request $request, Salesinvoice $sale)
    {
        $sale->update($request->all());

        return redirect()
            ->route('sales.index')
            ->withStatus('Successfully modified Sales Invoice.');
    }
     public function destroy(Salesinvoice $sale)
    {
        $sale->delete();

        return redirect()
            ->route('sales.index')
            ->withStatus('The sale record has been successfully deleted.');
    }

    public function salesreturns(){
        $sales = Salesreturn::latest()->paginate(25);
        //echo ">>> sales returns ";
        return view('sales.returns.index', compact('sales'));
    }
     public function salesreturnscreate(){
         $sales = Salesreturn::all();

        return view('sales.returns.create', compact('sales'));
     }
    public function storereturns(Request $request, Salesreturn $returns)
    {
        $returns->create($request->all());
        return redirect()->route('salesreturn.index')->withStatus('Successfully Registered Sale Return/Credit Note.');
    }
     
    public function editreturns(Salesreturn $salesreturn)
    {
        // print_r($salesreturn);
        $sale = $salesreturn;
        return view('sales.returns.edit', compact('sale'));
    }
    public function updatereturns(Request $request, Salesreturn $sale)
    {
        $sale->update($request->all());
        // print_r($sale);
        return redirect()
            ->route('salesreturn.index')
            ->withStatus('Successfully modified Sales Return.');
    }
     public function destroyreturns(Salesreturn $salesreturn)
    {
        $salesreturn->delete();
        return redirect()
            ->route('salesreturn.index')
            ->withStatus('The sale record has been successfully deleted.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // not used items

 public function show(Sale $sale)
    {
        //return view('sales.show', ['sale' => $sale]);
        //return view('sales.show', ['sale' => $sale]);
         $sales = Salesinvoice::latest()->paginate(25);

        return view('sales.invoices.index', compact('sales'));
    }

   
}
