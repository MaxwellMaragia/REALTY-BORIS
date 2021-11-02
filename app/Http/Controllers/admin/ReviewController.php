<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\testimonials;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $testimonials = testimonials::all();
        return view('admin.testimonial.show',compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'review' => 'required',
            'name'=>'required|unique:testimonials',
            'role'=>'required',
        ]);

        $testimonial = new testimonials();
        $testimonial->name = $request->name;
        $testimonial->role = $request->role;
        $testimonial->content = $request->review;
        $testimonial->status = $request->status;

        if($request->hasFile('avatar'))
        {

            $testimonial->avatar = $request->avatar->store('public/files/testimonials');
        }

        $testimonial->save();
        return redirect()->back()->with('success','testimonial created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $testimonial = testimonials::where('id',$id)->first();
        return view('admin.testimonial.edit',compact('testimonial'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'review' => 'required',
            'name'=>'required',
            'role'=>'required'
        ]);

        $testimonial = testimonials::find($id);
        $testimonial->name = $request->name;
        $testimonial->role = $request->role;
        $testimonial->content = $request->review;
        $testimonial->status = $request->status;

        if($request->hasFile('avatar'))
        {
            $current_image = 'storage/files/testimonials/'.substr($testimonial->avatar,26);

            //delete old testimonial first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $testimonial->avatar = $request->avatar->store('public/files/testimonials');
        }

        $testimonial->save();
        return redirect()->back()->with('success','Testimonial updated successfully');
    }


    public function destroy($id)
    {
        $testimonial = testimonials::find($id);
        $current_image = 'storage/files/testimonials/'.substr($testimonial->avatar,26);

        //delete old testimonial first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        testimonials::where('id',$id)->delete();
        return redirect()->back()->with('success','Testimonial deleted successfully');
    }
}
