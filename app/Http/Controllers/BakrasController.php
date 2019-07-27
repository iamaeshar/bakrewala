<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Breed;

class BakrasController extends Controller
{
    public function getData($name) {

        $ret_val = [];

        if($name == 'all') {
            $ret_val = Product::all();
        } else if($name == 'tota-pari-alwar') {
            $breed = Breed::select('id')->where('name', 'Tata - Pari Alwar')->first();
            if($breed) {
                $ret_val = Product::where('breed_id', $breed->id)->get();
            }
        } else {
            $breed = Breed::select('id')->where('name', $name)->first();
            if($breed) {
                $ret_val = Product::where('breed_id', $breed->id)->get();
            }
        }
        return view('bakra.' . $name)->with('ret_val', $ret_val);
    }
}
