<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(){

        $products = Products::where('price','>', 30)->get();;
        
        return view('catalogs.products.index')->with('products',$products);

    }

    public function create()
    {
        return view('catalogs.products.create');
    }

    public function store(ProductsRequest $request)
    {
        // dd($request->post('description'));

        $newProduct = new Products();

        $newProduct->name = $request->post('name');
        $newProduct->description = $request->post('description');
        $newProduct->price = $request->post('price');
        $newProduct->cost = $request->post('cost');

        $newProduct->save();

        return redirect()->route('products.index');
    }

    public function edit($product)
    {
        $product = Products::where('productsID', '=' , $product)->firstOrFail();
        // dd($product);
        return view('catalogs.products.edit')->with('product',$product);
    }

    public function update($productID,Request $request)
    {
        $product = Products::where('productsID', '=' , $productID)->firstOrFail();

        $product->name = $request->post('name');
        $product->description = $request->post('description');
        $product->price = $request->post('price');
        $product->cost = $request->post('cost');
        
        $product = Products::where('productsID', '=', $product)->firstOrFail();  

        $product->save();

        return redirect()->route('products.index');

    }

    public function destroy($productID)
    {
        Products::destroy($productID);

        return redirect()->route('products.index');
    }
}
