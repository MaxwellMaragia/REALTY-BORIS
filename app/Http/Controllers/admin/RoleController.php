<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin\role;
use App\role_user;
use App\permission_role;
use App\Model\admin\Permission;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::user()->can('roles.update')) {

            $roles = role::all();
            return view('admin.role.show',compact('roles'));
        }
        $message = "view this page";
        return view('admin.unauthorised',compact('message'));

    }

    public function create()
    {
        if(Auth::user()->can('permissions.update')) {

            $permissions = Permission::all();
            return view('admin.role.create',compact('permissions'));
        }
        $message = "access this page";
        return view('admin.unauthorised',compact('message'));

    }


    public function store(Request $request)
    {
        //
        $this->validate($request,[

            'role'=>'required|max:50|unique:roles'

        ]);


        $role = new role();
        $role->role = $request->role;
        $role->save();
        $role->permissions()->sync($request->permission);
        return(redirect()->back()->with('success','Role added successfully'));
    }

    public function edit($id)
    {
        if(Auth::user()->can('roles.update')) {

            $permissions = Permission::all();
            $role = role::where('id',$id)->first();
            return view('admin.role.edit',compact('role','permissions'));
        }
        $message = "perform this action";
        return view('admin.unauthorised',compact('message'));

    }


    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[

            'role'=>'required|max:50'

        ]);
        $role = role::find($id);
        $role->role = $request->role;
        $role->save();
        $role->permissions()->sync($request->permission);
        return(redirect()->back())->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        if(Auth::user()->can('roles.update')) {
            role::where('id',$id)->delete();
            role_user::where('role_id',$id)->delete();
            permission_role::where('role_id',$id)->delete();
            return redirect()->back()->with('success','Role deleted successfully');
        }
        $message = "perform this action";
        return view('admin.unauthorised',compact('message'));

    }
}
