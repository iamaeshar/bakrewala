<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirmation() {
        $orders = Cart::with('product', 'user')->where('user_id', Auth::user()->id)->get();
        $profile = Profile::find(Auth::user()->id);
        return view('order.confirmation')->with('orders', $orders)->with('profile', $profile);
    }

    public function payment_check(Request $request) {
        if($request->payment_option == 2) {
            $user_orders = Cart::with('product', 'user')->where('user_id', Auth::user()->id)->get();
            foreach($user_orders as $user_order) {
                $order = new Order;
                $order->product_id = $user_order->product->id;
                $order->user_id = $user_order->user->id;
                $order->quantity = $user_order->quantity;
                $order->status = "processed";
                $order->save();
                
                $product = Product::find($user_order->product->id);
                $product->quantity = $product->quantity - $user_order->quantity;
                $product->no_of_sold_out_items = $product->no_of_sold_out_items + $user_order->quantity;
                $product->save();

                $user_order->delete();

                return redirect('/user/dashboard')->with('success', 'your order has been placed successfully !!');
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordered_products = Product::with('order')->has('order')->get();
        foreach($ordered_products as $ordered_product) {
            $ordered_product->user_profile =  Profile::find($ordered_product->order->user_id);
        }
        return view('admin.order.index')->with('ordered_products', $ordered_products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return $order;
        // return view('admin.order.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
