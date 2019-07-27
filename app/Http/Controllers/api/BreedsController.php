<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Breed;
use App\Http\Resources\BreedsResource;

class BreedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::all();
        return BreedsResource::collection($breeds);
    }
}
