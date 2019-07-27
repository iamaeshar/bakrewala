<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Product;
use App\Http\Resources\DealsOfTheDayResource;

class DealsOfTheDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals_of_the_day = Product::orderBy('id', 'DESC')->get()->take(4);
        return DealsOfTheDayResource::collection($deals_of_the_day);
    }
}
