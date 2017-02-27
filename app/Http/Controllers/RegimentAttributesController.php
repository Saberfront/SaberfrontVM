<?php

namespace App\Http\Controllers;

use App\RegimentAttributes;
use DB;
use Illuminate\Http\Request;

class RegimentAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
     return view('regimentAttributes.index',['regiments' => DB::table("regiment_data")->get()]);

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
     * @param  \App\RegimentAttributes  $regimentAttributes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
             return view('regimentAttributes.show',['regiment' => DB::table('regiment_data')->where('id',$id)->get()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegimentAttributes  $regimentAttributes
     * @return \Illuminate\Http\Response
     */
    public function edit(RegimentAttributes $regimentAttributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegimentAttributes  $regimentAttributes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegimentAttributes $regimentAttributes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegimentAttributes  $regimentAttributes
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegimentAttributes $regimentAttributes)
    {
        //
    }
}
