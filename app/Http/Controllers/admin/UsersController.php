<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Model\admin\role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->can('users.update')) {
            $admins = User::all();
            return view('admin.user.show',compact('admins'));
        }

        $message = "view users";
        return view('admin.unauthorised',compact('message'));


    }

    public function create()
    {
        //
        if(Auth::user()->can('users.update')) {
            $roles = role::all();
            return view('admin.user.create',compact('roles'));
        }

        $message = "add new users";
        return view('admin.unauthorised',compact('message'));

    }

    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:12'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->avatar = 'public/avatar.png';
        $user->status = $request->status;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->role);
        return redirect()->back()->with('success',"$request->name's account created successfully'");

    }

    public function edit($id)
    {
        if(Auth::user()->can('users.update')) {
            $user = User::where('id',$id)->first();
            $roles = role::all();
            return view('admin.user.edit',compact('user','roles'));
        }

        $message = "edit user's details";
        return view('admin.unauthorised',compact('message'));


    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:12'],
            'password' => ['confirmed']
        ]);

        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;

        $user->status = $request->status;

        if($request->filled('password'))
        {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->roles()->sync($request->role);
        return redirect()->back()->with('success',"$request->name's account updated successfully'");
    }


    public function destroy($id)
    {
        if(Auth::user()->can('users.update')) {
            User::where('id',$id)->delete();
            role_user::where('user_id',$id)->delete();
            return redirect()->back()->with('success','User deleted successfully');
        }

        $message = "delete users";
        return view('admin.unauthorised',compact('message'));


    }
}
