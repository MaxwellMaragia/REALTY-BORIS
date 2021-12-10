<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            $featured_listings = settings::where('name', 'featured_listings')->first();
            $boris_yelstine = settings::where('name', 'boris_yelstine')->first();
            $realty_boris = settings::where('name', 'realty_boris')->first();
            $our_brokerage = settings::where('name', 'our_brokerage')->first();
            $our_history = settings::where('name', 'our_history')->first();
            $background = settings::where('name', 'background')->first();

            return view('admin.settings.images',compact('featured_listings','boris_yelstine','realty_boris','our_brokerage','our_history','background'));
        }

        public function store(Request $request)
        {
            $this->validate($request,[
                'featured_listings' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'boris_yelstine' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'realty_boris' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'our_brokerage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'our_history' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'background' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);

            if($request->hasFile('featured_listings'))
            {
                $featured_listings = settings::where('name','featured_listings')->first();
                $featured_listings->value = $request->featured_listings->store('public/files/settings');
                $featured_listings->save();
            }

            if($request->hasFile('boris_yelstine'))
            {
                $boris_yelstine = settings::where('name','boris_yelstine')->first();
                $boris_yelstine->value = $request->boris_yelstine->store('public/files/settings');
                $boris_yelstine->save();
            }

            if($request->hasFile('realty_boris'))
            {
                $realty_boris = settings::where('name','realty_boris')->first();
                $realty_boris->value = $request->realty_boris->store('public/files/settings');
                $realty_boris->save();
            }

            if($request->hasFile('our_brokerage'))
            {
                $our_brokerage = settings::where('name','our_brokerage')->first();
                $our_brokerage->value = $request->our_brokerage->store('public/files/settings');
                $our_brokerage->save();
            }

            if($request->hasFile('our_history'))
            {
                $our_history = settings::where('name','our_history')->first();
                $our_history->value = $request->our_history->store('public/files/settings');
                $our_history->save();
            }

            if($request->hasFile('background'))
            {
                $background = settings::where('name','background')->first();
                $background->value = $request->background->store('public/files/settings');
                $background->save();
            }

            return redirect()->back()->with('success','Image settings updated successfully');
        }
}
