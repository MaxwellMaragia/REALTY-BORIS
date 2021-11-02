<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.profile.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'password' => ['confirmed'],
        ]);


        $user = User::find($id);

        $user->name = $request->name;
        if($request->filled('password'))
        {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success',"Your account updated successfully'");

    }

}
