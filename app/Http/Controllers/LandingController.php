<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use App\Models\Author;
use App\Models\NewsCategory;

class LandingController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $featureds = News::where('is_featured', true)->get();
        $news = News::orderBy('created_at', 'desc')->get()->take(4);
        $authors = Author::all()->take(5);
        $latestNews = News::with('newsCategory')
    ->orderBy('created_at', 'desc')
    ->take(4)
    ->get();

        return view('pages.landing', compact('banners', 'featureds', 'news', 'authors', 'latestNews'));
    }
}
    