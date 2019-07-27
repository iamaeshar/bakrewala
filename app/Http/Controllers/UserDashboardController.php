<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Order;
use App\Product;
use App\Breed;

class UserDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        foreach($orders as $order) {
            $order->product = Product::find($order->product_id);
            $order->breed = Breed::find($order->product->breed_id);
        }
        $cart_products = Cart::with('product', 'user')->where('user_id', Auth::user()->id)->get();
        $profile = Profile::find(Auth::user()->id);
        return view('user.dashboard')->with('profile', $profile)->with('cart_products', $cart_products)->with('orders', $orders);
    }
}
