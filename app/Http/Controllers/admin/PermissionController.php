<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Permission;
use Illuminate\Http\Request;
use App\permission_role;
use Illuminate\Support\Facades\Auth;


class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        if(Auth::user()->can('permissions.update')) {
            $permissions = Permission::all();
            return view('admin.permission.show', compact('permissions'));
        }

        $message = "view system permissions";
        return view('admin.unauthorised',compact('message'));
    }

    public function create()
    {
        //
        if(Auth::user()->can('permissions.update')) {
            return view('admin.permission.create');
        }
        $message = "create system permissions";
        return view('admin.unauthorised',compact('message'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required|max:50|unique:permissions',
            'for'=>'required'

        ]);


        $permission = new Permission();
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();
        return(redirect()->back()->with('success','Permission added successfully'));
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit($id)
    {
        if(Auth::user()->can('permissions.update')) {

            $permission = Permission::where('id',$id)->first();
            return view('admin.permission.edit',compact('permission'));
        }
        $message = "edit system permissions";
        return view('admin.unauthorised',compact('message'));


    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name'=>'required|max:50',
            'for'=>'required'

        ]);


        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();
        return(redirect()->back()->with('success','Permission updated successfully'));
    }

    public function destroy($id)
    {
        //
        if(Auth::user()->can('permissions.update')) {


            Permission::where('id',$id)->delete();
            permission_role::where('permission_id',$id)->delete();
            return redirect()->back()->with('warning','Permission deleted successfully');
        }

        $message = "delete system permissions";
        return view('admin.unauthorised',compact('message'));


    }
}
