<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

class UserController extends Controller
{
    //
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == "user") {
        } else if (auth::user()->user_type == "admin") {
            return view('admin.dashboard');
        }
    }
    
    
    public function home(){
        $products = Product::all();
        return view('index',compact('products'));
    }
    
    // public function product_details($product_title){
    //     $product = Product::findOrFail($product_title);
    //     return view('product_details',compact('product'));
    // }
    
    public function product_details($id) // Change argument to match route
{
    $product = Product::findOrFail($id); // Find by ID
    return view('product_details', compact('product'));
}
}
