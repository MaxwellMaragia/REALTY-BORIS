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
use Jenssegers\Agent\Agent;


class HomeController extends Controller
{
    //
    public function __construct()
    {
        View::share('logo_desktop', settings::where('name','logo_desktop')->first());
        View::share('logo_mobile', settings::where('name','logo_mobile')->first());
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
        View::share('first_image', settings::where('name','first_image')->first());
        View::share('agent', new Agent());


    }


    public function home()
    {
        $seo = seo::where('page','home')->first();
        $services = service::where('status',1)->get();
        $banners = banner::where('status',1)->get();
        $reviews = testimonials::where('status',1)->get();
        $featured_properties = property::where('featured',1)->where('status',1)->whereNull('new_development')->take(6)->get();
        $posts = post::where('status',1)->take(3)->get();
        $featured_listings = settings::where('name','featured_listings')->first();
        $boris_yelstine = settings::where('name','boris_yelstine')->first();
        $our_reviews = settings::where('name','our_reviews')->first();
        $our_articles = settings::where('name','our_articles')->first();
        $button_text = settings::where('name','button_text')->first();
        $button_url = settings::where('name','button_url')->first();
        $home_banner_text = settings::where('name','home_banner_text')->first();
        return view('user.home',compact('banners','featured_properties','services','seo','reviews','posts','featured_listings','boris_yelstine','button_text','button_url',
        'home_banner_text','our_articles','our_reviews'));
    }

    public function blog()
    {
        $seo = seo::where('page','blog')->first();
        $tags = tag::all();
        $categories = category::all();
        $background = settings::where('name','background')->first();
        $posts = post::where('posts.status','1')->orderBy('posts.created_at','DESC')->paginate(6);
        $featured = post::where('featured',1 AND 'status',1)->get();
        return view('user.blog',compact('posts','featured','seo','tags','categories','background'));
    }

    public function about(){
        $seo = seo::where('page','about')->first();
        $second_image = settings::where('name','second_image')->first();
        $about_text = settings::where('name','about_text')->first();
        $our_history_text = settings::where('name','our_history_text')->first();
        $background = settings::where('name','background')->first();
        $images = Storage::disk('public')->files('files/our-brokerage');
        $realty_boris = settings::where('name','realty_boris')->first();
        $our_brokerage = settings::where('name','our_brokerage')->first();
        $our_history = settings::where('name','our_history')->first();
        return view('user.about',compact('seo','second_image','our_history_text','about_text','images','background','realty_boris','our_brokerage','our_history'));
    }

    public function post(post $post){

        $user_id = $post->posted_by;
        $user = User::where('id',$user_id)->first();
        $tags = tag::all();
        $categories = category::all();
        $background = settings::where('name','background')->first();
        return view('user.post',compact('post','user','tags','categories','background'));
    }

    public function service(service $service)
    {
        return view('user.service',compact('service'));
    }

    public function property(property $property)
    {
        $path = "properties/".$property->id."/carousel";
        $images = Storage::disk('public')->files($path);
        //$images = \File::allFiles(public_path("properties/".$property->name."/carousel"));
        return view('user.property',compact('property','images'));
    }

    public function properties(){
        $properties = property::where('status',1)->whereNull('new_development')->paginate(10);
        $seo = seo::where('page','properties')->first();
        $background = settings::where('name','background')->first();
        $locations = location::all();
        return view('user.properties',compact('properties','seo','background','locations'));
    }

    public function developments(){
        $properties = property::where('status',1)->where('new_development',1)->paginate(10);
        $seo = seo::where('page','properties')->first();
        $background = settings::where('name','background')->first();
        return view('user.developments',compact('properties','seo','background'));
    }

    public function contact(){
        $seo = seo::where('page','contact')->first();
        $background = settings::where('name','background')->first();
        return view('user.contact',compact('seo','background'));
    }

    public function tag(tag $tag)
    {
        $tags = tag::all();
        $categories = category::all();
        $seo = seo::where('page','blog')->first();
        $posts = $tag->posts();
        $background = settings::where('name','background')->first();
        return view('user.tag',compact('posts','tags','categories','seo','tag','background'));
    }

    public function category(category $category)
    {
        $tags = tag::all();
        $categories = category::all();
        $posts = $category->posts();
        $seo = seo::where('page','blog')->first();
        $background = settings::where('name','background')->first();
        return view('user.category',compact('posts','tags','seo','categories','category','background'));
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

    public function location(location $location){
        $properties = $location->properties()->paginate(10);
        $selected_location = $location;
        $locations = location::all();
        return view('user.location',compact('properties','selected_location','locations'));
    }
}
