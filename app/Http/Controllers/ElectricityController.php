<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ElectricityRequest;
use App\Models\Rate;
use Carbon\Carbon;
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
        $electricity = Electricity::with('user')->orderBy('id', 'desc')->get();
        $electricityCount = Electricity::count();
         return view('backend.electricity.index',['electricity'=>$electricity,'electricityCount'=> $electricityCount,]);
    }

    public function current_index()
    {
        //
      //  $now = Carbon::now();
        $electricity = Electricity::with('user')->whereMonth('created_at', '=', Carbon::now()->month)->orderBy('id', 'desc')->get();
        $electricityCount = Electricity::count();
         return view('backend.electricity.dummy',['electricity'=>$electricity,'electricityCount'=> $electricityCount,]);
    }

    
    public function current_month($id)
    {
        # code...
        $electricity = Electricity::with('user')->where('id', $id)->whereMonth('created_at', '=', now()->month)->get();

        $electricityCount = Electricity::with('user')->where('id', $id)->whereMonth('created_at', '=', now()->month)->count();

        $electsum = Electricity::with('user')->where('customer_info', $id)->whereMonth('created_at', '=', now()->month)->sum('total_outtime');
        return view('backend.electricity.dummy',['electricity'=>$electricity,'electricityCount'=> $electricityCount,'electsum' => $electsum]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        //
        $unitrate = Rate::first();
        $user = user::select('id','name')->where('role','user')->get();
        return view('backend.electricity.create',['user' => $user, 'unitrate' => $unitrate]);
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
        
        $c_sub_total = $request->current_price+$request->service_charged+ $request->electricity_tax+$request->demand_charge+$request->electricity_vat;

        $d_sub_total  = $request->due_balance+$request->surcharge;
       // return $d_sub_total;
        $electricity = Electricity::create([
           'customer_info' => $request->customer_info,
           'time' => $request->time,
           'current_read' => $request->current_read,
           'current_date' => $request->current_date,
           'account' => $request->account,
           'previous_read' => $request->previous_read,
           'previous_date' => $request->previous_date,
           'meter_no' => $request->meter_no,
            'unit' => $request->unit,
            'issue_date' => $request->issue_date,
            'last_date' => $request->last_date,
            'current_price' => $request->current_price,
            'service_charged' => $request->service_charged,
            'electricity_tax' => $request->electricity_tax,
            'demand_charge' => $request->demand_charge,
            'electricity_vat' => $request->electricity_vat,
            'c_sub_total' => $c_sub_total,
            'd_fromdate' => $request->d_fromdate,
            'd_todate' => $request->d_todate,
            'due_balance' => $request->due_balance,
            'surcharge' => $request->surcharge,
            'd_sub_total' => $d_sub_total,
            'total_intime' => $c_sub_total,
            'total_outtime' => $c_sub_total + $d_sub_total,

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
        return view('backend.electricity.show', ['electricity' => $electricity]);
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
        $unitrate = Rate::first();
        $user = User::select('id','name')->where('role','user')->get();
        return view('backend.electricity.edit',[
            'edit' => $electricity,
            'user' => $user,
            'unitrate' => $unitrate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function update(ElectricityRequest $request, Electricity $electricity)
    {
        //
        $c_sub_total = $request->current_price+$request->service_charged+ $request->electricity_tax+$request->demand_charge+$request->electricity_vat;

        $d_sub_total  = $request->due_balance+$request->surcharge;
       // return $d_sub_total;

     //  return $request->all();
        $electricity = Electricity::create([
           'customer_info' => $request->customer_info,
           'time' => $request->time,
           'current_read' => $request->current_read,
           'current_date' => $request->current_date,
           'account' => $request->account,
           'previous_read' => $request->previous_read,
           'previous_date' => $request->previous_date,
           'meter_no' => $request->meter_no,
            'unit' => $request->unit,
            'issue_date' => $request->issue_date,
            'last_date' => $request->last_date,
            'current_price' => $request->current_price,
            'service_charged' => $request->service_charged,
            'electricity_tax' => $request->electricity_tax,
            'demand_charge' => $request->demand_charge,
            'electricity_vat' => $request->electricity_vat,
            'c_sub_total' => $c_sub_total,
            'd_fromdate' => $request->d_fromdate,
            'd_todate' => $request->d_todate,
            'due_balance' => $request->due_balance,
            'surcharge' => $request->surcharge,
            'd_sub_total' => $d_sub_total,
            'total_intime' => $c_sub_total,
            'total_outtime' => $c_sub_total + $d_sub_total,

        ]);

        return redirect()->route('electricity.index')->with('success','Data updated successfully');
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
        $electricity->delete();
        return redirect()->back()->with('success','Data deleted successfully!');
    }

    public function pdf($id)
    {
        # code...
        $electricity = Electricity::where('id',$id)->first();
       
 
       return view('backend.electricity.print', ['electricity' => $electricity]);
    }

    public function getuserelectricity(Request $request)
    {
        # code...
        $selectedValue = $request->input('value');
        //  $data = $request->input('selected_value');
          $data = Electricity::select('current_read', 'electricity_vat', 'electricity_tax')->where('customer_info', $selectedValue)->orderBy('id','desc')->first();
      
          return response()->json($data);
    }
}
