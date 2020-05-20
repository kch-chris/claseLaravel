<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(){

        $products = Products::where('price','>', 30)->get();;
        
        return view('catalogs.products.index')->with('products',$products);

    }

    public function add()
    {
        return view('catalogs.products.add');
    }
}
