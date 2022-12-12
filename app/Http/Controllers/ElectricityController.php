<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\Request;
use App\Http\Requests\ElectricityRequest;
class ElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $electricity = Electricity::orderBy('id', 'desc')->get();
        $waterCount = Electricity::count();
         return view('backend.electricity.index',['electricity'=>$electricity,'waterCount'=> $waterCount,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.electricity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElectricityRequest $request)
    {
        //
        

        $electricity = Electricity::create([
           
        ]);
       
        return redirect()->route('electricity.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function show(Electricity $electricity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function edit(Electricity $electricity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electricity $electricity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electricity $electricity)
    {
        //
    }
}
