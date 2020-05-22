<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderByDesc('created_at')->paginate(6);
        $recentNews = News::latest()->limit(6)->get();

        return view('news.index', compact('news', 'recentNews'));
    }

    public function show(News $news)
    {
        $posts = News::where('id', '<>', $news->id)->latest()->limit(6)->get();
        return view('news.show', compact('news', 'posts'));
    }
}
