<?php

namespace App\Http\Controllers;

use App\Models\ReceiveBill;
use Illuminate\Http\Request;
use App\Http\Requests\ReceiveBillRequest;
use App\Models\User;
class ReceiveBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $receivebill = ReceiveBill::with('user')->orderBy('id', 'desc')->get();
        //$electricityCount = Electricity::count();
         return view('backend.bill_received.index',['receivebill'=>$receivebill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::select('id','name')->where('role','user')->get();
        return view('backend.bill_received.create',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiveBillRequest $request)
    {
        //
        $receiveBill = ReceiveBill::create($request->all());
        return redirect()->route('bill_received.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiveBill  $receiveBill
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveBill $receiveBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveBill  $receiveBill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      //  dd($receiveBill);
      $user = User::select('id','name')->where('role','user')->get();
      $receiveBill = ReceiveBill::find($id);
        return view('backend.bill_received.edit',[
            'edit' => $receiveBill,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveBill  $receiveBill
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiveBillRequest $request, $id)
    {
        //
        $receiveBill = ReceiveBill::find($id);
        $receiveBill->update($request->all());
        return redirect()->route('bill_received.index')->with('success','Data inserted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiveBill  $receiveBill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $receiveBill = ReceiveBill::find($id);
        $receiveBill->delete();
        return redirect()->route('bill_received.index')->with('success','Data deleted successfully');
    }
}
