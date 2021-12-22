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
            $logo_desktop = settings::where('name', 'logo_desktop')->first();
            $logo_mobile = settings::where('name', 'logo_mobile')->first();
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
            $button_text = settings::where('name', 'button_text')->first();
            $button_url = settings::where('name', 'button_url')->first();
            $home_banner_text = settings::where('name','home_banner_text')->first();

            return view('admin.settings.setting',compact('logo_mobile','facebook','logo_desktop','favicon','email','whatsapp','instagram','twitter','youtube','mobile','address','map','button_text','button_url','home_banner_text'));



     }

    public function store(Request $request)
    {
        $this->validate($request,[
            'logo_desktop' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'logo_mobile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'logo_favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        if($request->hasFile('logo_desktop'))
        {
            $logo_desktop = settings::where('name','logo_desktop')->first();

            $current_image = 'storage/files/settings/'.substr($logo_desktop->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $logo_desktop->value = $request->logo_desktop->store('public/files/settings');
            $logo_desktop->save();
        }

        if($request->hasFile('logo_mobile'))
        {
            $logo_mobile = settings::where('name','logo_mobile')->first();

            $current_image = 'storage/files/settings/'.substr($logo_mobile->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $logo_mobile->value = $request->logo_mobile->store('public/files/settings');
            $logo_mobile->save();
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

        $button_text = settings::where('name','button_text')->first();
        $button_text->value = $request->button_text;
        $button_text->save();

        $button_url = settings::where('name','button_url')->first();
        $button_url->value = $request->button_url;
        $button_url->save();

        $home_banner_text = settings::where('name','home_banner_text')->first();
        $home_banner_text->value = $request->home_banner_text;
        $home_banner_text->save();

        return redirect()->back()->with('success','Settings updated successfully');
    }
}
