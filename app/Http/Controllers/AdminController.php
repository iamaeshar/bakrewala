<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Event;
use App\Breed;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard() {
        $no_of_orders = Order::count();
        $no_of_products = Product::count();
        $no_of_events = Event::count();
        $no_of_breeds = Breed::count();
        return view('admin.dashboard', compact('no_of_orders', 'no_of_products', 'no_of_events', 'no_of_breeds'));
    }
}
