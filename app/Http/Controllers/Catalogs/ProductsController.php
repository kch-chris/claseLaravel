<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Models\Products;
use App\User;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:see products')->only(['index']);
        $this->middleware('permission:edit products')->only(['edit','update']);
        $this->middleware('permission:delete products')->only(['destroy']);
        $this->middleware('permission:create products')->only(['create','store']);
    }

    public function index(){

        $products = Products::all();;
        
        return view('catalogs.products.index')->with('products',$products);

    }

    public function show($product)
    {
        $product = Products::where('productsID', '=' , $product)->firstOrFail();
        
        return view('catalogs.products.show')->with('product',$product);
    }


    public function create()
    {
        return view('catalogs.products.create');
    }

    public function store(ProductsRequest $request)
    {
        try {
            $newProduct = new Products();

            $newProduct->name = $request->post('name');
            $newProduct->description = $request->post('description');
            $newProduct->price = $request->post('price');
            $newProduct->cost = $request->post('cost');
    
            $newProduct->save();
    
            return response()->json(['status'=> true,'message'=>'Usuario Creado']);

        } catch (\Throwable $th) {
            
            return response()->json(['status'=> false,'message'=>$th->getMessage()]);
        }

        

    }

    public function edit($product)
    {
        $product = Products::where('productsID', '=' , $product)->firstOrFail();
        // dd($product);
        return view('catalogs.products.edit')->with('product',$product);
    }

    public function update($productID,ProductsRequest $request)
    {
        $product = Products::where('productsID', '=' , $productID)->firstOrFail();

        $product->name = $request->post('name');
        $product->description = $request->post('description');
        $product->price = $request->post('price');
        $product->cost = $request->post('cost');

        $product->save();

        return redirect()->route('products.index');

    }

    public function destroy($productID)
    {
        Products::destroy($productID);

        return redirect()->route('products.index');
    }
}
