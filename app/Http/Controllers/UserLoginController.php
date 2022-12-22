<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserAddRequest;
use Illuminate\Support\Str;
class UserLoginController extends Controller
{
    //
    public function login()
    {
        # code...
        return view('backend.user_login');
    }

    public function list()
    {
        # code...
        $user = User::where('role','user')->get();
        return view('backend.user.index',compact('user'));
    }

    public function adduser()
    {
        # code...
        return view('backend.user.adduser');
    }

    public function store(UserAddRequest $request)
    {
        # code...
      //  dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Str::slug($request->name)
        ]);

        return redirect()->route('user_list')->with('success','User add successfully!');
    }


    public function edituser($id)
    {
        # code...
      //  return "edit";
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    public function deleteuser($id)
    {
        # code...
        $user = User::find($id);
       $user->delete();
        return redirect()->back()->with('success','User deleted successfully!');
    }
}
