<?php

namespace App\Http\Controllers;
use App\Sale;
use Carbon\Carbon;
use App\SoldProduct;
use App\Transaction;
use App\PaymentMethod;

use App\Purchasebill;
use App\Salesinvoice;
use App\Salesreturn;
use App\Expense;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {

        $monthlyBalanceByMethod = $this->getMethodBalance()->get('monthlyBalanceByMethod');
        $monthlyBalance = $this->getMethodBalance()->get('monthlyBalance');

        $anualsales = $this->getAnnualSales();
        $anualclients = $this->getAnnualClients();
        $anualproducts = $this->getAnnualProducts();
        $monthyexpense = $this->getAnnualExpense();
        $profitonsale = $this->getProfit();
        $anualpurchase = $this->getPurchase();
        return view('dashboard', [
            'monthlybalance'            => $monthlyBalance,
            'monthlybalancebymethod'    => $monthlyBalanceByMethod,
            'lasttransactions'          => Transaction::latest()->limit(20)->get(),
            'unfinishedsales'           => Sale::where('finalized_at', null)->get(),
            'anualsales'                => $anualsales,
            'monthlyexpense'            => $monthyexpense,
            'profitonsale'              => $profitonsale,
            'anualclients'              => $anualclients,
            'anualproducts'             => $anualproducts,
            'anualpurchases'            => $anualpurchase,
            'expenseAmount'             => Expense::all()->sum('amount'),
            'purchaseAmount'            => (Purchasebill::all()->sum('amount')),
            'profitAmount'              => (Salesinvoice::all()->sum('amount')) - 
                                              (Purchasebill::all()->sum('amount')),
            'lastmonths'                => array_reverse($this->getMonthlyTransactions()->get('lastmonths')),
            'lastincomes'               => $this->getMonthlyTransactions()->get('lastincomes'),
            'lastexpenses'              => $this->getMonthlyTransactions()->get('lastexpenses'),
            'semesterexpenses'          => $this->getMonthlyTransactions()->get('semesterexpenses'),
            'semesterincomes'           => $this->getMonthlyTransactions()->get('semesterincomes')
        ]);
    }

    public function getMethodBalance()
    {
        $methods = PaymentMethod::all();
        $monthlyBalanceByMethod = [];
        $monthlyBalance = 0;

        foreach ($methods as $method) {
            $balance = Transaction::findByPaymentMethodId($method->id)->thisMonth()->sum('amount');
            $monthlyBalance += (float) $balance;
            $monthlyBalanceByMethod[$method->name] = $balance;
        }
        return collect(compact('monthlyBalanceByMethod', 'monthlyBalance'));
    }

    public function getAnnualSales()
    {
        $sales = [];
        foreach(range(1, 12) as $i) {
           // $monthlySalesCount = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();
             $monthlySalesCount = Salesinvoice::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();

            array_push($sales, $monthlySalesCount);
        }
        return "[" . implode(',', $sales) . "]";
    }
    public function getPurchase(){
        $purchases = [];
        foreach(range(1, 12) as $i) {
           // $monthlySalesCount = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();
            $monthlyPurchaseCount = Purchasebill::whereYear('date', Carbon::now()->year)->whereMonth('date', $i)->count();
            array_push($purchases, $monthlyPurchaseCount);
        }
        return "[" . implode(',', $purchases) . "]";
    }
    public function getAnnualExpense()
    {
        $sales = [];
        foreach(range(1, 12) as $i) {
           // $monthlySalesCount = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();
             $monthlyExpenseCount = Expense::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();

            array_push($sales, $monthlyExpenseCount);
        }
        return "[" . implode(',', $sales) . "]";
    }
    public function getProfit(){
        $sales = [];
        foreach(range(1, 12) as $i) {
             $monthlySalesCount = Salesinvoice::whereYear('date', Carbon::now()->year)->whereMonth('date', $i)->count();

            array_push($sales, $monthlySalesCount);
        }
        $purchases = [];
        $profit    = [];
         foreach(range(1, 12) as $i) {
             $monthlyPurchaseCount = Purchasebill::whereYear('date', Carbon::now()->year)->whereMonth('date', $i)->count();

            array_push($purchases, $monthlyPurchaseCount);
             $profitvalue = $sales[$i-1] - $monthlyPurchaseCount;
            array_push($profit,$profitvalue); 

        }

        return "[" . implode(',', $profit) . "]";
    }

    public function getAnnualClients()
    {
        $clients = [];
        foreach(range(1, 12) as $i) {
            $monthclients = Sale::selectRaw('count(distinct client_id) as total')
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $i)
                ->first();

            array_push($clients, $monthclients->total);
        }
        return "[" . implode(',', $clients) . "]";
    }

    public function getAnnualProducts()
    {
        $products = [];
        foreach(range(1, 12) as $i) { 
            $monthproducts = SoldProduct::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->sum('qty');

            array_push($products, $monthproducts);
        }        
        return "[" . implode(',', $products) . "]";
    }

    public function getMonthlyTransactions()
    {
        $actualmonth = Carbon::now();

        $lastmonths = [];
        $lastincomes = '';
        $lastexpenses = '';
        $semesterincomes = 0;
        $semesterexpenses = 0;

        foreach (range(1, 6) as $i) {
            array_push($lastmonths, $actualmonth->shortMonthName);

            $incomes = Transaction::where('type', 'income')
                ->whereYear('created_at', $actualmonth->year)
                ->WhereMonth('created_at', $actualmonth->month)
                ->sum('amount');

            $semesterincomes += $incomes;
            $lastincomes = round($incomes).','.$lastincomes;

            $expenses = abs(Transaction::whereIn('type', ['expense', 'payment'])
                ->whereYear('created_at', $actualmonth->year)
                ->WhereMonth('created_at', $actualmonth->month)
                ->sum('amount'));

            $semesterexpenses += $expenses;
            $lastexpenses = round($expenses).','.$lastexpenses;

            $actualmonth->subMonth(1);
        }

        $lastincomes = '['.$lastincomes.']';
        $lastexpenses = '['.$lastexpenses.']';

        return collect(compact('lastmonths', 'lastincomes', 'lastexpenses', 'semesterincomes', 'semesterexpenses'));
    }
}
