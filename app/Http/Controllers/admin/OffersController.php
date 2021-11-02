<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OffersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $offers = offer::all();
        return view('admin.offer.show',compact('offers'));
    }


    public function create()
    {
        //
        if(Auth::user()->can('offers.update')) {
            return view('admin.offer.create');
        }

        $message = "add offers";
        return view('admin.unauthorised',compact('message'));

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'title'=>'required|unique:offers',
        ]);

        $offer = new offer();
        $offer->title = $request->title;
        $offer->slug = Str::slug($request->title);
        $offer->short_description = $request->short_description;
        $offer->description = $request->description;
        $offer->status = $request->status;
        $offer->meta_title = $request->meta_title;
        $offer->meta_author = $request->meta_author;
        $offer->meta_description = $request->meta_description;
        $offer->meta_keywords = $request->meta_keywords;

        if($request->hasFile('image'))
        {

            $offer->media = $request->image->store('public/files/offers');
        }

        $offer->save();
        return redirect()->back()->with('success','Offer created successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(Auth::user()->can('offers.update')) {
            $offer = offer::where('id',$id)->first();
            return view('admin.offer.edit',compact('offer'));
        }

        $message = "edit this offer";
        return view('admin.unauthorised',compact('message'));


    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'title'=>'required',
        ]);

        $offer = offer::find($id);
        $offer->title = $request->title;
        $offer->slug = Str::slug($request->title);
        $offer->short_description = $request->short_description;
        $offer->description = $request->description;
        $offer->status = $request->status;
        $offer->meta_title = $request->meta_title;
        $offer->meta_author = $request->meta_author;
        $offer->meta_description = $request->meta_description;
        $offer->meta_keywords = $request->meta_keywords;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/offers/'.substr($offer->media,20);

            //delete old offer first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $offer->media = $request->image->store('public/files/offers');


        }

        $offer->save();
        return redirect()->back()->with('success','Offer updated successfully');
    }

    public function destroy($id)
    {
        if(Auth::user()->can('offers.update')) {
            $offer = offer::find($id);
            $current_image = 'storage/files/offers/'.substr($offer->media,20);

            //delete old offer first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            offer::where('id',$id)->delete();
            return redirect()->back()->with('success','Offer deleted successfully');
        }

        $message = "delete this offer";
        return view('admin.unauthorised',compact('message'));



    }
}
