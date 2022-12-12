<?php

namespace App\Http\Controllers;

use App\Models\Water;
use Illuminate\Http\Request;
use App\Http\Requests\WaterRequest;
class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $water = Water::orderBy('id', 'desc')->get();
        $waterCount = Water::count();
         return view('backend.water.index',['water'=>$water,'waterCount'=> $waterCount,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.water.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WaterRequest $request)
    {
        
        $totalpay = $request->c_measurement * $request->c_totalmonth *  $request->c_rate;
        $totaldue =  $request->d_measurement * $request->d_totalmonth *  $request->d_rate;
        $total = $totalpay+$totaldue;

        $water = Water::create([
            'building' => $request->building,
            'tenants' => $request->tenants,
            'c_fromdate' => $request->c_fromdate,
            'c_todate' => $request->c_todate,
            'c_measurement' => $request->c_measurement,
            'c_totalmonth' => $request->c_totalmonth,
            'c_rate' => $request->c_rate,
            'd_fromdate' => $request->d_fromdate,
            'd_todate' => $request->d_todate,
            'd_measurement' => $request->d_measurement,
            'd_totalmonth' => $request->d_totalmonth,
            'd_rate' => $request->d_rate,
            'totalpay' => $totalpay,
            'totaldue' => $totaldue,
            'total_bill' => $total
        ]);
       
        return redirect()->route('water.index')->with('success','Data inserted successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function show(Water $water)
    {
        //
        return view('backend.water.show',[
            'water' => $water
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function edit(Water $water)
    {
        //
        return view('backend.water.edit',[
            'edit' => $water
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function update(WaterRequest $request, Water $water)
    {
        //
        $totalpay = $request->c_measurement * $request->c_totalmonth *  $request->c_rate;
        $totaldue =  $request->d_measurement * $request->d_totalmonth *  $request->d_rate;
        $total = $totalpay+$totaldue;
        $water->update([
            'building' => $request->building,
            'tenants' => $request->tenants,
            'c_fromdate' => $request->c_fromdate,
            'c_todate' => $request->c_todate,
            'c_measurement' => $request->c_measurement,
            'c_totalmonth' => $request->c_totalmonth,
            'c_rate' => $request->c_rate,
            'd_fromdate' => $request->d_fromdate,
            'd_todate' => $request->d_todate,
            'd_measurement' => $request->d_measurement,
            'd_totalmonth' => $request->d_totalmonth,
            'd_rate' => $request->d_rate,
            'totalpay' => $totalpay,
            'totaldue' => $totaldue,
            'total_bill' => $total
        ]);
      
        return redirect()->route('water.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function destroy(Water $water)
    {
        //
        $water->delete();
        return redirect()->route('water.index')->with('status','Data deleted successfully!');
    }
}
