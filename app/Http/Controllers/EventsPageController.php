<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsPageController extends Controller
{
    public function eid_special() {
        $ret_val = Event::with('products')->where('name', 'Eid')->get();
        if(count($ret_val) > 0) {
            return view('event.eid-special')->with('ret_val', $ret_val[0]->products);
        }else {
            return view('event.eid-special')->with('ret_val', $ret_val);
        }
    }
    
    public function bakri_eid_special() {
        $ret_val = Event::with('products')->where('name', 'Bakri Eid')->get();
        if(count($ret_val) > 0) {
            return view('event.bakri-eid-special')->with('ret_val', $ret_val[0]->products);
        }else {
            return view('event.bakri-eid-special')->with('ret_val', $ret_val);
        }
    }

    public function aqeeqa_special() {
        $ret_val = Event::with('products')->where('name', 'Aqeeqa')->get();
        if(count($ret_val) > 0) {
            return view('event.aqeeqa-special')->with('ret_val', $ret_val[0]->products);
        }else {
            return view('event.aqeeqa-special')->with('ret_val', $ret_val);
        }
    }
 
    public function sadqa_special() {
        $ret_val = Event::with('products')->where('name', 'Sadqa')->get();
        if(count($ret_val) > 0) {
            return view('event.sadqa-special')->with('ret_val', $ret_val[0]->products);
        }else {
            return view('event.sadqa-special')->with('ret_val', $ret_val);
        }
    }
}
