<?php

namespace App\Http\Controllers;

use App\Models\Apart;
use Illuminate\Http\{Request, Response};
use Illuminate\Support\Facades\DB;

class ApartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $result = '';
//        $aparts = Apart::all();
//        foreach ($aparts as $apart){
//            $result .= "<p>{$apart->name}</p>";
//        }
//        return response($result);
        return response(Apart::all()->pluck('price','name'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apart  $apart
     * @return \Illuminate\Http\Response
     */
    public function show(Apart $apart)
    {
        return response(Apart::find($apart->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apart  $apart
     * @return \Illuminate\Http\Response
     */
    public function edit(Apart $apart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apart  $apart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apart $apart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apart  $apart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apart $apart)
    {
        //
    }
}
