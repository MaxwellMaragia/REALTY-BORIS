<?php

namespace App\Http\Controllers;
use App\Model\user\post;
use App\Model\admin\service;
use App\offer;


use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index() {
        $posts = post::all()->first();
        $services = service::all()->first();
        $offers = offer::all()->first();

        return response()->view('sitemap.index', [
            'post' => $posts,
            'service' => $services,
            'offer' => $offers,
        ])->header('Content-Type', 'text/xml');
    }

    public function posts() {
        $post = post::latest()->get();
        return response()->view('sitemap.post', [
            'post' => $post,
        ])->header('Content-Type', 'text/xml');
    }

    public function services() {
        $service = service::latest()->get();
        return response()->view('sitemap.service', [
            'service' => $service,
        ])->header('Content-Type', 'text/xml');
    }

    public function offers() {
        $offer = offer::latest()->get();
        return response()->view('sitemap.offer', [
            'offer' => $offer,
        ])->header('Content-Type', 'text/xml');
    }

}
