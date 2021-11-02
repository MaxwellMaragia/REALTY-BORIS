<?php

namespace App\Http\Controllers\user;
use App\case_study;
use App\property;
use App\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Download;
use App\Http\Controllers\Controller;
use App\Model\admin\service;
use App\Model\user\category;
use App\Model\user\tag;
use App\banner;
use App\Model\user\post;
use App\offer;
use App\portfolio;
use App\team_member;
use App\testimonials;
use App\User;
use App\settings;
use App\Model\admin\seo;
use Illuminate\Foundation\Inspiring;


class HomeController extends Controller
{
    //
    public function __construct()
    {
        View::share('logo_light', settings::where('name','logo_light')->first());
        View::share('logo_dark', settings::where('name','logo_dark')->first());
        View::share('favicon', settings::where('name','favicon')->first());
        View::share('email', settings::where('name','email')->first());
        View::share('mobile', settings::where('name','mobile')->first());
        View::share('whatsapp', settings::where('name','whatsapp')->first());
        View::share('facebook', settings::where('name','facebook')->first());
        View::share('twitter', settings::where('name','twitter')->first());
        View::share('instagram', settings::where('name','instagram')->first());
        View::share('youtube', settings::where('name','youtube')->first());
        View::share('custom_css', settings::where('name','custom_css')->first());
        View::share('address', settings::where('name','address')->first());
        View::share('footer_text', settings::where('name','footer_text')->first());
        View::share('map', settings::where('name','map')->first());
        View::share('locations', location::all());
    }


    public function home()
    {
        $seo = seo::where('page','home')->first();

        $services = service::where('status',1)->get();
        $banners = banner::where('status',1)->get();
        $reviews = testimonials::where('status',1)->get();
        $featured_properties = property::where('featured',1)->where('status',1)->whereNull('new_development')->take(6)->get();
        $posts = post::where('status',1)->take(3)->get();

        return view('user.home',compact('banners','featured_properties','services','seo','reviews','posts'));
    }

    public function blog()
    {
        $seo = seo::where('page','blog')->first();
        $tags = tag::all();
        $categories = category::all();
        $posts = post::where('posts.status','1')->orderBy('posts.created_at','DESC')->paginate(6);
        $featured = post::where('featured',1 AND 'status',1)->get();
        return view('user.blog',compact('posts','featured','seo','tags','categories'));
    }

    public function about(){
        $seo = seo::where('page','about')->first();
        $testimonials = testimonials::where('status','1')->get();
        $members = team_member::where('status','1')->get();
        return view('user.about',compact('seo','members','testimonials'));
    }

    public function post(post $post){

        $user_id = $post->posted_by;
        $user = User::where('id',$user_id)->first();
        $tags = tag::all();
        $categories = category::all();
        return view('user.post',compact('post','user','tags','categories'));
    }

    public function service(service $service)
    {
        return view('user.service',compact('service'));
    }

    public function property($id)
    {
        $path = "properties/".$id."/carousel";
        $images = Storage::disk('public')->files($path);
        //$images = \File::allFiles(public_path("properties/".$property->name."/carousel"));
        $property = property::find($id);
        return view('user.property',compact('property','images'));
    }

    public function properties(){
        $properties = property::where('status',1)->whereNull('new_development')->paginate(6);
        $seo = seo::where('page','properties')->first();
        $locations = location::all();
        return view('user.properties',compact('properties','locations','seo'));
    }

    public function buy(){
        $seo = seo::where('page','Home')->first();
        $properties = property::where('Property_status','For sale')->paginate();
        return view('user.buy',compact('properties','seo'));
    }

    public function rent(){
        $seo = seo::where('page','Home')->first();
        $properties = property::where('Property_status','For rent')->paginate();
        return view('user.rent',compact('properties','seo'));
    }

    public function contact(){
        $seo = seo::where('page','contact')->first();
        return view('user.contact',compact('seo'));
    }

    public function tag(tag $tag)
    {
        $tags = tag::all();
        $categories = category::all();
        $seo = seo::where('page','blog')->first();
        $posts = $tag->posts();
        return view('user.tag',compact('posts','tags','categories','seo','tag'));
    }

    public function category(category $category)
    {
        $tags = tag::all();
        $categories = category::all();
        $posts = $category->posts();
        $seo = seo::where('page','blog')->first();
        return view('user.category',compact('posts','tags','seo','categories','category'));
    }

    public function download(Download $download){
        $seo = seo::where('page','home')->first();
        return view('user.download',compact('download','seo'));
    }

    public function portfolio(){
        $seo = seo::where('page','Portfolio')->first();
        $portfolios = portfolio::where('status',1)->get();
        return view('user.portfolio',compact('portfolios','seo'));
    }

    public function search(Request $request){
        $keywords = $request->keywords;
        $results = post::whereRaw('MATCH (keywords) AGAINST (?)' , $keywords)->paginate(6);
        return view('user.search',compact('results','keywords'));
    }

    public function csd(case_study $case_study)
    {
        return view('user.case_study',compact('case_study'));
    }

    public function error_404(){
        return view('user.404');
    }

}
