<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Breed;
use App\Event;

class ProductController extends Controller
{
    
    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        $breeds  = Breed::all();
        return view('admin.product.create')->with('breeds', $breeds)->with('events', $events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'breed' => 'required',
            'events' => 'required|array|min:1',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|image',
            'description' => 'required|min:20',
        ]);

        if($request->hasFile('image'))  {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $onlyFileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $onlyExt = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);
            $fileNameToStore = $onlyFileName . time() . '.' . $onlyExt;
            $request->file('image')->storeAs('public/product_images', $fileNameToStore);
        }

        $product = new Product;
        $product->breed_id = $request->input('breed');
        $product->weight = $request->input('weight');
        $product->price = $request->input('price');
        $product->image = @$fileNameToStore;
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->save();
        $product->events()->attach($request->input('events'),['created_at'=>now(), 'updated_at'=>now()]);
        return redirect(url()->previous())->with('success', 'Product added successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
