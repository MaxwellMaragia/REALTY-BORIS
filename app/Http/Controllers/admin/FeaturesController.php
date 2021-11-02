<?php

namespace App\Http\Controllers\admin;

use App\feature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeaturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $features = feature::all();
        return view('admin.feature.show', compact('features'));
    }

    public function create()
    {
        return view('admin.feature.feature');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:features'
        ]);

        $feature = new feature();
        $feature->name = $request->name;

        $feature->save();
        return (redirect()->back()->with('success', 'feature saved successfully'));
    }

    public function edit($id)
    {
        $feature = feature::where('id', $id)->first();
        return view('admin.feature.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        $feature = feature::find($id);
        $feature->name = $request->name;

        $feature->save();

        return redirect()->back()->with('success', 'Update was successful');
    }


    public function destroy($id)
    {
        //
        feature::where('id', $id)->delete();
        return redirect()->back()->with('success', 'feature deleted successfully');

    }
}
