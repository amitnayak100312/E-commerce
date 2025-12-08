<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Order;
use GuzzleHttp\Handler\Proxy;
use Reflection;

class UserController extends Controller{

    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == "user") {
        } else if (auth::user()->user_type == "admin") {
            return view('admin.dashboard');
        }
    }


    public function home()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::latest()->take(4)->get();
        return view('index', compact('products', 'count'));
    }


    public function product_details($id) // Change argument to match route
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }

        $product = Product::findOrFail($id); // Find by ID
        return view('product_details', compact('product', 'count'));
    }

    public function viewallproducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('viewallproducts', compact('products', 'count'));
    }

    public function addToCart($id)
    {
        $poduct = Product::findOrFail($id);
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $poduct->id;
        $product_cart->save();
        return redirect()->back()->with('cart_msg', 'added to the cart');
    }

    public function cartproducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
            $cart = ProductCart::where('user_id',Auth::id())->get();
        } else {
            $count = '';
        }
        
        return view('viewcartproducts',compact('count','cart'));
    }
    
    public function removecartproduct($id){
        $cart_product = ProductCart::findOrFail($id);
        $cart_product->delete();
        return redirect()->back();
    }
    
    public function confirm_order(Request $request){
        $cart_user_id = ProductCart::where('user_id',Auth::id())->get();
        $address = $request->receiver_address;
        $contact = $request->receiver_contact_num;
        foreach($cart_user_id as $cart_product){     
            $order = New Order();
            $order->receiver_address=$address;
            $order->receiver_contact_num=$contact;
            $order->user_id=Auth::id();
            $order->product_id=$cart_product->product_id;
            $order->save();
        }
        
        $carts = ProductCart::where('user_id',Auth::id())->get();
        foreach($carts as $cart){
            $cart_id=  ProductCart :: findOrFail($cart->id);
            $cart_id->delete();
        }
         return redirect()->back()->with('confirmMsg','Order Confirm');
    }
    
}
