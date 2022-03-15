<?php

namespace App\Http\Controllers;

//use App\Sale;
use App\Supplier;
use App\Transaction;
use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::paginate(25);

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\SupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Supplier $supplier)
    {
        $supplier->create($request->all());
        
        return redirect()->route('suppliers.index')->withStatus('Successfully registered Supplier.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\SupplierRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());

        return redirect()
            ->route('suppliers.index')
            ->withStatus('Successfully modified Supplier.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->withStatus('Supplier successfully removed.');
    }

    public function addtransaction(Supplier $supplier)
    {
        $payment_methods = PaymentMethod::all();

        return view('suppliers.transactions.add', compact('supplier','payment_methods'));
    }
}
