<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\settings;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $first_image = settings::where('name', 'first_image')->first();
        $second_image = settings::where('name', 'second_image')->first();
        $about_text = settings::where('name', 'about_text')->first();
        $our_history_text = settings::where('name', 'our_history_text')->first();

        return view('admin.settings.about',compact('first_image','second_image','about_text','our_history_text'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'first_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'second_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        if($request->hasFile('first_image'))
        {
            $first_image = settings::where('name','first_image')->first();

            $current_image = 'storage/files/settings/'.substr($first_image->value,22);

            //delete old banner first
            $first_image->value = $request->first_image->store('public/files/settings');
            $first_image->save();
        }

        if($request->hasFile('second_image'))
        {
            $second_image = settings::where('name','second_image')->first();

            $current_image = 'storage/files/settings/'.substr($second_image->value,22);

            //delete old banner first
            $second_image->value = $request->second_image->store('public/files/settings');
            $second_image->save();
        }

        $about_text = settings::where('name','about_text')->first();
        $about_text->value = $request->about_text;
        $about_text->save();

        $our_history_text = settings::where('name','our_history_text')->first();
        $our_history_text->value = $request->our_history_text;
        $our_history_text->save();

        $carousel_images = $request->file('carousel');
        if($request->hasFile('carousel'))
        {
            Storage::deleteDirectory('public/files/our-brokerage');
            foreach ($carousel_images as $carousel_image) {
                $carousel_image->store('public/files/our-brokerage');
            }
        }


        return redirect()->back()->with('success','Settings updated successfully');
    }
}
