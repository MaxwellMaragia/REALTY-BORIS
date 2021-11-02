<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\property;
use App\User;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $posts = post::all();
        $properties = property::all();
        $featured = property::where('featured','1')->get();
        $active = property::where('status','1')->get();
        $latest = post::orderBy('posts.created_at','DESC')->take(5)->get();
        return view('admin.home',compact('latest','posts','active','properties','featured'));
    }

    public function unauthorised()
    {
        return view('admin.unauthorised');
    }

}
