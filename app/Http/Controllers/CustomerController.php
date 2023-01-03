<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Electricity;
use App\Models\User;
use App\Models\Water;
use App\Models\Notice;
use App\Models\Speech;
use App\Models\Contact;

class CustomerController extends Controller
{
    //
    public function index()
    {
        # code...
        $data['notice'] = Notice::orderBy('id','desc')->skip(1)->take(10)->get();
        $data['noticefirst'] = Notice::orderBy('id','desc')->first();
        $data['speech'] = Speech::orderBy('id','desc')->skip(1)->take(10)->get();
        $data['speechfirst'] = Speech::orderBy('id','desc')->first();
        return view('frontend.layout.home', $data);
    }

    public function contact()
    {
        # code...
        $data['contact'] = Contact::first();
        return view('frontend.contact', $data);
    }

    public function notice()
    {
        # code...
        $data['notice'] = Notice::orderBy('id','desc')->get();
        return view('frontend.notice', $data);
    }

    public function speech()
    {
        # code...
        $data['speech'] = Speech::orderBy('id','desc')->get();
        return view('frontend.speech', $data);
    }

    public function electricity()
    {
        # code...
        $id  = Auth::user()->id;
        $electricity = Electricity::where('customer_info', $id)->get();
        return view('backend.user.electricity', ['electricity' => $electricity]);
    }

    public function electricity_details($id)
    {
        # code...
        $electricity = Electricity::find($id);
        return view('backend.user.electricity_show',['electricity' => $electricity]);
    }


    public function water()
    {
        # code...
        $id  = Auth::user()->id;
        $water = Water::where('tenants', $id)->get();
        return view('backend.user.water', ['water' => $water]);
    }

    public function water_details($id)
    {
        # code...
        $water = Water::find($id);
        return view('backend.user.water_show',['water' => $water]);
    }
}
