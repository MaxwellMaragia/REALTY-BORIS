<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\portfolio;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $portfolios = portfolio::all();
        return view('admin.portfolio.show',compact('portfolios'));
    }

    public function create()
    {
        //
        if(Auth::user()->can('portfolios.update')) {
            return view('admin.portfolio.create');
        }

        $message = "add portfolio item";
        return view('admin.unauthorised',compact('message'));

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required|unique:portfolios',
            'link'=>'required',
        ]);

        $portfolio = new portfolio();
        $portfolio->title = $request->title;
        $portfolio->link = $request->link;
        $portfolio->status = $request->status;

        if($request->hasFile('image'))
        {

            $portfolio->media = $request->image->store('public/files/portfolios');
        }

        $portfolio->save();
        return redirect()->back()->with('success','Portfolio created successfully');
    }

    public function edit($id)
    {
        if(Auth::user()->can('portfolios.update')) {
            $portfolio = portfolio::where('id',$id)->first();
            return view('admin.portfolio.edit',compact('portfolio'));
        }

        $message = "edit portfolio item";
        return view('admin.unauthorised',compact('message'));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required',
            'link'=>'required',
        ]);

        $portfolio = portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->link = $request->link;
        $portfolio->status = $request->status;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/portfolios/'.substr($portfolio->media,24);

            //delete old portfolio first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $portfolio->media = $request->image->store('public/files/portfolios');
        }

        $portfolio->save();
        return redirect()->back()->with('success','portfolio updated successfully');
    }


    public function destroy($id)
    {
        if(Auth::user()->can('portfolios.update')) {
            $portfolio = portfolio::find($id);
            $current_image = 'storage/files/portfolios/'.substr($portfolio->media,24);

            //delete old portfolio first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            portfolio::where('id',$id)->delete();
            return redirect()->back()->with('success','portfolio deleted successfully');
        }

        $message = "delete this item";
        return view('admin.unauthorised',compact('message'));


    }
}
