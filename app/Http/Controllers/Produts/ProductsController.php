<?php

namespace App\Http\Controllers\Produts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function productsXml()
    {
        $products = Product::all();
        
	    return response()->xml(['products' => $products->toArray()])
    }
}
