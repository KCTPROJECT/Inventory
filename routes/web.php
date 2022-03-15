<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\EmployeeController;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'users' => 'UserController',
        'providers' => 'ProviderController',
        'inventory/products' => 'ProductController',
        'clients' => 'ClientController',
        'inventory/categories' => 'ProductCategoryController',
        'transactions/transfer' => 'TransferController',
        'methods' => 'MethodController',
        'employees' => 'EmployeeController',
        'customers'  => 'CustomerController',
        'suppliers' => 'SupplierController',
        'expenses'  => 'ExpenseController',
        'salesinvoices' => 'SaleController',
        'salesreturn'   => 'SaleController',
        'sales'         => 'SaleController',
        'purchases'     => 'PurchaseController',
        'purchasereturns' => 'PurchaseController'

    ]);
    Route::resource('transactions', 'TransactionController');
    //Route::resource('transactions', 'TransactionController')->except(['create', 'show']);
    Route::get('transactions/stats/{year?}/{month?}/{day?}', ['as' => 'transactions.stats', 'uses' => 'TransactionController@stats']);
    Route::get('transactions/{type}', ['as' => 'transactions.type', 'uses' => 'TransactionController@type']);
    Route::get('transactions/{type}/create', ['as' => 'transactions.create', 'uses' => 'TransactionController@create']);
    Route::get('transactions/{transaction}/edit', ['as' => 'transactions.edit', 'uses' => 'TransactionController@edit']);

    Route::get('inventory/stats/{year?}/{month?}/{day?}', ['as' => 'inventory.stats', 'uses' => 'InventoryController@stats']);
    Route::resource('inventory/receipts', 'ReceiptController')->except(['edit', 'update']);
    Route::get('inventory/receipts/{receipt}/finalize', ['as' => 'receipts.finalize', 'uses' => 'ReceiptController@finalize']);
    Route::get('inventory/receipts/{receipt}/product/add', ['as' => 'receipts.product.add', 'uses' => 'ReceiptController@addproduct']);
    Route::get('inventory/receipts/{receipt}/product/{receivedproduct}/edit', ['as' => 'receipts.product.edit', 'uses' => 'ReceiptController@editproduct']);
    Route::post('inventory/receipts/{receipt}/product', ['as' => 'receipts.product.store', 'uses' => 'ReceiptController@storeproduct']);
    Route::match(['put', 'patch'], 'inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.update', 'uses' => 'ReceiptController@updateproduct']);
    Route::delete('inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.destroy', 'uses' => 'ReceiptController@destroyproduct']);

    Route::post('sales/storeinvoice', ['as' => 'sales.storeinvoice', 'uses' => 'SaleController@storeinvoice']);

    Route::get('salesreturn', ['as' => 'salesreturn.index', 'uses' => 'SaleController@salesreturns']);
    Route::get('salesreturn/create', [ 'as' => 'salesreturn.create','uses' => 'SaleController@salesreturnscreate']);
    Route::post('salesreturn/storereturns', [ 'as' => 'salesreturn.store','uses' => 'SaleController@storereturns']);
    Route::get('salesreturn/{salesreturn}/edit', [ 'as' => 'salesreturn.edit','uses' => 'SaleController@editreturns']);
    Route::put('salesreturn/update/{sale}', [ 'as' => 'salesreturn.update','uses' => 'SaleController@updatereturns']);
    Route::delete('salesreturn/{salesreturn}', [ 'as' => 'salesreturn.destroy','uses' => 'SaleController@destroyreturns']);

    Route::get('purchasereturn', ['as' => 'purchasereturn.index', 'uses' => 'PurchaseController@purchasereturns']);
    Route::get('purchasereturn/create', [ 'as' => 'purchasereturn.create','uses' => 'PurchaseController@purchasereturnscreate']);
    Route::post('purchasereturn/storereturns', [ 'as' => 'purchasereturn.store','uses' => 'PurchaseController@storereturns']);
    Route::get('purchasereturn/{purchasereturn}/edit', [ 'as' => 'purchasereturn.edit','uses' => 'PurchaseController@editreturns']);
    Route::put('purchasereturn/update/{sale}', [ 'as' => 'purchasereturn.update','uses' => 'PurchaseController@updatereturns']);
    Route::delete('purchasereturn/{purchasereturn}', [ 'as' => 'purchasereturn.destroy','uses' => 'PurchaseController@destroyreturns']);
    
    Route::get('production', ['as' => 'production.index', 'uses' => 'ProductController@production']);
    Route::get('production/create', ['as' => 'production.create', 'uses' => 'ProductController@createproduction']);
    Route::post('production/storeproduction', ['as' => 'production.store', 'uses' => 'ProductController@storeproduction']);
    Route::get('production/{production}/edit', [ 'as' => 'production.edit','uses' => 'ProductController@editproduction']);
    Route::put('production/update/{production}', [ 'as' => 'production.update','uses' => 'ProductController@updateproduction']);
    Route::delete('production/{production}', [ 'as' => 'production.destroy','uses' => 'ProductController@destroyproduction']);
   Route::get('production/getDetails/{id}', ['as' => 'production.getDetails', 'uses' => 'ProductController@getproductiondetails']);
   
   Route::post('salary/update', ['as' => 'employees.salaryupdate', 'uses' => 'EmployeeController@updateSalaryStatus']);
    Route::post('attendance/update', ['as' => 'employees.attendanceupdate', 'uses' => 'EmployeeController@updateAttendanceStatus']);

    //Route::resource('sales', 'SaleController')->except(['edit', 'update']);
    // Route::get('sales/{sale}/finalize', ['as' => 'sales.finalize', 'uses' => 'SaleController@finalize']);
    // Route::get('sales/{sale}/product/add', ['as' => 'sales.product.add', 'uses' => 'SaleController@addproduct']);
    // Route::get('sales/{sale}/product/{soldproduct}/edit', ['as' => 'sales.product.edit', 'uses' => 'SaleController@editproduct']);
    // Route::post('sales/{sale}/product', ['as' => 'sales.product.store', 'uses' => 'SaleController@storeproduct']);
    // Route::match(['put', 'patch'], 'sales/{sale}/product/{soldproduct}', ['as' => 'sales.product.update', 'uses' => 'SaleController@updateproduct']);
    // Route::delete('sales/{sale}/product/{soldproduct}', ['as' => 'sales.product.destroy', 'uses' => 'SaleController@destroyproduct']);

    Route::get('clients/{client}/transactions/add', ['as' => 'clients.transactions.add', 'uses' => 'ClientController@addtransaction']);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::match(['put', 'patch'], 'profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::match(['put', 'patch'], 'profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
     Route::post('profile', ['as' => 'profile.updateimage', 'uses' => 'ProfileController@updateimage']);

    Route::get('salary', ['as' => 'employees.salary', 'uses' => 'EmployeeController@salary']);
  Route::get('attendance', ['as' => 'employees.attendance', 'uses' => 'EmployeeController@attendance']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
});
