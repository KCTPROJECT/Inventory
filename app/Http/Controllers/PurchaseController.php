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
use App\Purchasebill;
use App\Purchasereturn;

class PurchaseController extends Controller
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

         $purchases = Purchasebill::latest()->paginate(25);
         // $sales = $purchases;
        return view('purchases.bills.index', compact('purchases'));

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
         $sales = Purchasebill::all();

        return view('purchases.bills.create', compact('sales'));
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeinvoice(Request $request, Purchasebill $invoices)
    {
        // $invoices->create($request->all());
        // return redirect()->route('sales.index')->withStatus('Successfully Registered Sale Invoice.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Purchasebill $bill)
    {
       //
         $bill->create($request->all());
        return redirect()->route('purchases.index')->withStatus('Successfully Registered Purchase bill.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Purchasebill $purchase)
    {
        $sale = $purchase;
        return view('purchases.bills.edit', compact('sale'));
    }
    public function update(Request $request, Purchasebill $purchase)
    {
        //print_r($purchase);
        $purchase->update($request->all());

        return redirect()
            ->route('purchases.index')
            ->withStatus('Successfully modified Purchase Bill.');
    }
     public function destroy(Purchasebill $purchase)
    {
        $purchase->delete();

        return redirect()
            ->route('purchases.index')
            ->withStatus('The Purchase Bill has been successfully deleted.');
    }

    public function purchasereturns(){
        $sales = Purchasereturn::latest()->paginate(25);
        //echo ">>> sales returns ";
        return view('purchases.returns.index', compact('sales'));
    }
     public function purchasereturnscreate(){
         $sales = Purchasereturn::all();

        return view('purchases.returns.create', compact('sales'));
     }
    public function storereturns(Request $request, Purchasereturn $returns)
    {
        $returns->create($request->all());
        return redirect()->route('purchasereturn.index')->withStatus('Successfully Registered Purchase Return/Credit Note.');
    }
     
    public function editreturns(Purchasereturn $purchasereturn)
    {
         //print_r($purchasereturn);
        $sale = $purchasereturn;
        return view('purchases.returns.edit', compact('sale'));
    }
    public function updatereturns(Request $request, Purchasereturn $sale)
    {
        $sale->update($request->all());
        // print_r($sale);
        return redirect()
            ->route('purchasereturn.index')
            ->withStatus('Successfully modified Purchase Return.');
    }
     public function destroyreturns(Purchasereturn $purchasereturn)
    {
        $purchasereturn->delete();
        return redirect()
            ->route('purchasereturn.index')
            ->withStatus('The Purchase Return record has been successfully deleted.');
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
        
    }

   
}
