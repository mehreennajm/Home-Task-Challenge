<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Display the Dashboard page
    public function index()
    {
        $products = Product::count();
        $product_types = ProductType::count();
        $suppliers = Supplier::count();
       
        return view('pages.index',compact('products','product_types','suppliers'));
    
    }
}
