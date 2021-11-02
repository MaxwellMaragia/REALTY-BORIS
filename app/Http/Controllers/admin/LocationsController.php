<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $locations = location::all();
        return view('admin.locations.show',compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:locations',
        ]);

        $location = new location();
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);

        $location->save();
        return redirect()->back()->with('success','Location created successfully');
    }

    public function edit($id)
    {
        $location = location::where('id',$id)->first();
        return view('admin.locations.edit',compact('location'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $location = location::find($id);
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);

        $location->save();
        return redirect()->back()->with('success','location updated successfully');
    }


    public function destroy($id)
    {
        location::where('id',$id)->delete();
        return redirect()->back()->with('success','location deleted successfully');
    }
}
