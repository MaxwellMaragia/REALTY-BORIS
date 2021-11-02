<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\case_study;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CasestudyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $csds = case_study::all();
        return view('admin.csd.show', compact('csds'));
    }


    public function create()
    {
        //
        if (Auth::user()->can('csd.update')) {

            return view('admin.csd.create');
        }

        $message = "add case study";
        return view('admin.unauthorised', compact('message'));


    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'title' => 'required|unique:case_studies',
        ]);

        $csd = new case_study();
        $csd->title = $request->title;
        $csd->slug = Str::slug($request->title);
        $csd->short_description = $request->short_description;
        $csd->description = $request->description;
        $csd->status = $request->status;

        if ($request->hasFile('image')) {

            $csd->media = $request->image->store('public/files/case_study');
        }

        $csd->save();
        return redirect()->back()->with('success', 'Case study created successfully');
    }


    public function edit($id)
    {
        //
        if (Auth::user()->can('csd.update')) {
            $csd = case_study::where('id', $id)->first();
            return view('admin.csd.edit', compact('csd'));
        }

        $message = "edit this case study";
        return view('admin.unauthorised', compact('message'));


    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'title' => 'required',
        ]);

        $csd = case_study::find($id);
        $csd->title = $request->title;
        $csd->slug = Str::slug($request->title);
        $csd->short_description = $request->short_description;
        $csd->description = $request->description;
        $csd->status = $request->status;

        if ($request->hasFile('image')) {
            $current_image = 'storage/files/case_study/' . substr($csd->media, 24);

            //delete old csd first
            if (file_exists($current_image)) {
                unlink($current_image);
            }
            $csd->media = $request->image->store('public/files/case_study');


        }

        $csd->save();
        return redirect()->back()->with('success', 'Case study updated successfully');
    }

    public function destroy($id)
    {
        //
        $csd = case_study::find($id);
        $current_image = 'storage/files/case_study/' . substr($csd->media, 24);

        //delete old csd first
        if (file_exists($current_image)) {
            unlink($current_image);
        }
        case_study::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Case study deleted successfully');
    }
}
