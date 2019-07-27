<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function index() {
        $deals_of_the_day = Product::orderBy('id', 'DESC')->get()->take(4);
        return view('index')->with('deals_of_the_day', $deals_of_the_day);
    }

    public function about() {
        return view('pages.about');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function about_qurbani() {
        return view('pages.about-qurbani');
    }
}
