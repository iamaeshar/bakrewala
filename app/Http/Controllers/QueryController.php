<?php

namespace App\Http\Controllers;

use App\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = Query::orderBy('id', 'DESC')->get();
        return view('admin.query.index')->with('queries', $queries);
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
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric',
            'query' => 'required|min:10'
        ]);

        $query  = new Query;
        $query->name = $request->input('name');
        $query->mobile = $request->input('mobile');
        $query->query = $request->input('query');
        $query->save();

        return redirect(url()->previous())->with('success', 'Thank you for contact us. Hear from us soon.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit(Query $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        //
    }
}
