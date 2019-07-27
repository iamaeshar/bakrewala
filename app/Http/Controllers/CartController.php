<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_products = Cart::with('product', 'user')->where('user_id', Auth::user()->id)->get();
        return view('cart.index')->with('cart_products', $cart_products);
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
        $cart = new Cart;
        $cart->product_id = $request->input('product_id');
        $cart->user_id = Auth::user()->id;
        $cart->save();
        return redirect(url()->previous())->with('cart-added', 'Item has been added to your cart successfully. Go to Cart for the checkout otherwise continue shopping.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        if($request->cart_quantity > $cart->quantity) {
            return redirect(url()->previous())->with('success', 'Quantity can not be increased because of availiability.');
        }else {
            $cart->quantity = $request->cart_quantity;
            $cart->save();
            return redirect(url()->previous());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->destroy($cart->id);
        return redirect(url()->previous());
    }
}
