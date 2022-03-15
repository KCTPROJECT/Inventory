<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Expense;
use App\Supplier;
use App\Transaction;
use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $expenses = Expense::paginate(25);
       // $expenses = $expense->all();
              //print_r($expenses);
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\ExpenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Expense $expense)
    {
        $expense->create($request->all());
        
        return redirect()->route('expenses.index')->withStatus('Successfully registered Expense.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\ExpenseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->update($request->all());

        return redirect()
            ->route('expenses.index')
            ->withStatus('Successfully modified Expense.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()
            ->route('expenses.index')
            ->withStatus('Expense successfully removed.');
    }

    public function addtransaction(Expense $expense)
    {
        $payment_methods = PaymentMethod::all();

        return view('expenses.transactions.add', compact('expense','payment_methods'));
    }
}
