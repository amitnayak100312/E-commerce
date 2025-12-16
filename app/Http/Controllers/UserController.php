<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Order;
use GuzzleHttp\Handler\Proxy;
use Pest\Matchers\Any;
use Reflection;
use Session;
use Stripe;

class UserController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->user_type == "user") {
                return view('dashboard');
            } else if (Auth::user()->user_type == "admin") {
                $newClients = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
                $newProjects = Project::where('created_at', '>=', Carbon::now()->subDays(30))->count();
                $allProjects = Project::count();
                $totalProducts = Product::count();
                return view('admin.dashboard', compact('newClients', 'newProjects', 'allProjects', 'totalProducts'));
            }
        }

        return redirect()->back();
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
            $cart = ProductCart::where('user_id', Auth::id())->get();
        } else {
            $count = '';
        }

        return view('viewcartproducts', compact('count', 'cart'));
    }

    public function removecartproduct($id)
    {
        $cart_product = ProductCart::findOrFail($id);
        $cart_product->delete();
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $cart_user_id = ProductCart::where('user_id', Auth::id())->get();
        $address = $request->receiver_address;
        $contact = $request->receiver_contact_num;
        foreach ($cart_user_id as $cart_product) {
            $order = new Order();
            $order->receiver_address = $address;
            $order->receiver_contact_num = $contact;
            $order->user_id = Auth::id();
            $order->product_id = $cart_product->product_id;
            $order->save();
        }

        $carts = ProductCart::where('user_id', Auth::id())->get();
        foreach ($carts as $cart) {
            $cart_id =  ProductCart::findOrFail($cart->id);
            $cart_id->delete();
        }
        return redirect()->back()->with('confirmMsg', 'Order Confirm');
    }

    public function myorders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('viewmyorders', compact('orders'));
    }

    //payment gatway
    public function stripe($price)
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
            $cart = ProductCart::where('user_id', Auth::id())->get();
        } else {
            $count = '';
        }

        $prices = $price;
        return view('stripe', compact('count', 'price'));
    }

    public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => 10 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        $cart_user_id = ProductCart::where('user_id', Auth::id())->get();
        $address = $request->receiver_address;
        $contact = $request->receiver_contact_num;
        foreach ($cart_user_id as $cart_product) {
            $order = new Order();
            $order->receiver_address = $address;
            $order->receiver_contact_num = $contact;
            $order->user_id = Auth::id();
            $order->product_id = $cart_product->product_id;
            $order->payment_status = "Paid";
            $order->save();
        }

        $carts = ProductCart::where('user_id', Auth::id())->get();
        foreach ($carts as $cart) {
            $cart_id =  ProductCart::findOrFail($cart->id);
            $cart_id->delete();
        }

        return back()
            ->with('success', 'Payment successful!');
    }
}
