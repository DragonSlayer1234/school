<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreateNewsRequest;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(CreateNewsRequest $request)
    {
        $path = str_replace('public', '/storage', $request->file('image')->store('public/images'));
        $news = News::new($request->title, $request->description, $path, $request->text);

        return redirect()->route('admin.news.index');
    }
}
