<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\Production;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(25);

        return view('inventory.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('inventory.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  App\Product  $model
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $model)
    {
        $model->create($request->all());

        return redirect()
            ->route('products.index')
            ->withStatus('Product successfully registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $solds = $product->solds()->latest()->limit(25)->get();

        $receiveds = $product->receiveds()->latest()->limit(25)->get();

        return view('inventory.products.show', compact('product', 'solds', 'receiveds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();

        return view('inventory.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->withStatus('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withStatus('Product removed successfully.');
    }
   // productions
    public function production(){
           $products = Production::paginate(25);
            
        return view('inventory.productions.index', compact('products'));
    }
    public function createproduction(){
        $categories = ProductCategory::all();
        $products  = Product::all();
        return view('inventory.productions.create', compact('categories','products'));
    }
    public function getproductiondetails($id = 0){
     //echo ">>> get production details";
    // print_r($id);    
      $data = Product::where('id', $id)->first();
      $productionamount =  ProductCategory::where('id',$data->product_category_id)->first();
      $result = array('item'=>$data,'productionamount'=>$productionamount);
        return response()->json($result);  
    }
    
    public function storeproduction(Request $request, Production $model)
    {
        //print_r($model);

        $model->create($request->all());
        return redirect()
            ->route('production.index')
            ->withStatus('Production data successfully Added.');
    }

    public function editproduction(Production $production)
    {
        $categories = ProductCategory::all();
        $products  = Product::all();  
        return view('inventory.productions.edit', compact('products', 'categories','production'));
    }
    public function updateproduction(Request $request, Production $production)
    {
       // print_r($production);
        $production->update($request->all());

        return redirect()
            ->route('production.index')
            ->withStatus('Production data updated successfully.');
    }

     public function destroyproduction(Production $production)
    {
        $production->delete();

        return redirect()
            ->route('production.index')
            ->withStatus('Production Data removed successfully.');
    }
}
