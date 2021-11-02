<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $categories = category::all();
        return view('admin.category.show', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.category');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();
        return (redirect()->back()->with('success', 'Category saved successfully'));
    }

    public function edit($id)
    {
        $category = category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back()->with('success', 'Update was successful');
    }


    public function destroy($id)
    {
        category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
