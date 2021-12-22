<?php

namespace App\Http\Controllers\admin;

use App\feature;
use App\Http\Controllers\Controller;
use App\property;
use App\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $properties = property::all();
        return view('admin.property.show',compact('properties'));
    }

    public function create()
    {
        $features = feature::all();
        $locations = location::all();
        return view('admin.property.create',compact('features','locations'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required|unique:properties',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description'=>'required',
        ]);


        $data = array(
            'title'=>$request->title,
            'slug'=>str::slug($request->title),
            'price'=>$request->price,
            'size'=>$request->size,
            'video'=>$request->video,
            'bedroom'=>$request->bedroom,
            'bathroom'=>$request->bathroom,
            'featured'=>$request->featured,
            'status'=>$request->status,
            'new_development'=>$request->new_development,
            'location'=>$request->location,
            'description'=>$request->description,
            'completion_date'=>$request->completion_date,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
        );

        $property = property::create($data);
        //make directory for media
        $directory = 'public/properties/'.$property->id;
        Storage::makeDirectory($directory);
        if($request->hasFile('image'))
        {
            $property->image = $request->image->store($directory);
            $property->save();
        }

        $carousel_images = $request->file('carousel');
        if($request->hasFile('carousel'))
        {
            foreach ($carousel_images as $carousel_image) {
                $carousel_image->store($directory . '/carousel');
            }
        }

        return redirect()->back()->with('success',"Property added successfully");

    }

    public function edit($id)
    {
        $property = property::where('id', $id)->first();
        $locations = location::all();
        return view('admin.property.edit', compact('property','locations'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description'=>'required',
        ]);


        $property = property::find($id);
        //make directory for media
        $directory = 'public/properties/'.$property->id;
        Storage::makeDirectory($directory);
        if($request->hasFile('image'))
        {
            $image = $request->image->store($directory);
        }else{ $image=$property->image;}

        $carousel_images = $request->file('carousel');
        if($request->hasFile('carousel'))
        {
            Storage::deleteDirectory($directory.'/carousel');
            foreach ($carousel_images as $carousel_image) {
                $carousel_image->store($directory . '/carousel');
            }
        }

        $data = array(
            'title'=>$request->title,
            'slug'=>str::slug($request->title),
            'price'=>$request->price,
            'size'=>$request->size,
            'image'=>$image,
            'video'=>$request->video,
            'bedroom'=>$request->bedroom,
            'bathroom'=>$request->bathroom,
            'featured'=>$request->featured,
            'status'=>$request->status,
            'new_development'=>$request->new_development,
            'location'=>$request->location,
            'description'=>$request->description,
            'completion_date'=>$request->completion_date,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
        );

        $property->update($data);
        return redirect()->back()->with('success',"Property added successfully");

    }

    public function destroy($id)
    {
        //

        $property = property::find($id);
        $directory = 'public/properties/'.$property->name;
        property::where('id',$id)->delete();
        Storage::deleteDirectory($directory);
        return redirect()->back()->with('success','property deleted successfully');
    }

}
