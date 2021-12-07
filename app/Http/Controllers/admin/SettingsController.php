<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\settings;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $logo_light = settings::where('name', 'logo_light')->first();
            $logo_dark = settings::where('name', 'logo_dark')->first();
            $favicon = settings::where('name', 'favicon')->first();
            $email = settings::where('name', 'email')->first();
            $mobile = settings::where('name', 'mobile')->first();
            $whatsapp = settings::where('name', 'whatsapp')->first();
            $facebook = settings::where('name', 'facebook')->first();
            $instagram = settings::where('name', 'instagram')->first();
            $twitter = settings::where('name', 'twitter')->first();
            $youtube = settings::where('name', 'youtube')->first();
            $address = settings::where('name', 'address')->first();
            $map = settings::where('name', 'map')->first();

            return view('admin.settings.setting',compact('logo_dark','facebook','logo_light','favicon','email','whatsapp','instagram','twitter','youtube','mobile','address','map'));



     }

    public function store(Request $request)
    {
        $this->validate($request,[
            'logo_light' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'logo_dark' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'logo_favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        if($request->hasFile('logo_light'))
        {
            $logo_light = settings::where('name','logo_light')->first();

            $current_image = 'storage/files/settings/'.substr($logo_light->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $logo_light->value = $request->logo_light->store('public/files/settings');
            $logo_light->save();
        }

        if($request->hasFile('logo_dark'))
        {
            $logo_dark = settings::where('name','logo_dark')->first();

            $current_image = 'storage/files/settings/'.substr($logo_dark->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $logo_dark->value = $request->logo_dark->store('public/files/settings');
            $logo_dark->save();
        }

        if($request->hasFile('favicon'))
        {
            $favicon = settings::where('name','favicon')->first();

            $current_image = 'storage/files/settings/'.substr($favicon->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $favicon->value = $request->favicon->store('public/files/settings');
            $favicon->save();
        }

        $email = settings::where('name','email')->first();
        $email->value = $request->email;
        $email->save();

        $mobile = settings::where('name','mobile')->first();
        $mobile->value = $request->mobile;
        $mobile->save();

        $whatsapp = settings::where('name','whatsapp')->first();
        $whatsapp->value = $request->whatsapp;
        $whatsapp->save();

        $facebook = settings::where('name','facebook')->first();
        $facebook->value = $request->facebook;
        $facebook->save();

        $instagram = settings::where('name','instagram')->first();
        $instagram->value = $request->instagram;
        $instagram->save();

        $youtube = settings::where('name','youtube')->first();
        $youtube->value = $request->youtube;
        $youtube->save();

        $twitter = settings::where('name','twitter')->first();
        $twitter->value = $request->twitter;
        $twitter->save();

        $address = settings::where('name','address')->first();
        $address->value = $request->address;
        $address->save();

        $map = settings::where('name','map')->first();
        $map->value = $request->map;
        $map->save();

        return redirect()->back()->with('success','Settings updated successfully');
    }
}
