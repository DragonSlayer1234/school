<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Olympiad;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::orderByDesc('created_at')->limit(9)->get();
        $olympiads = Olympiad::active()->limit(10)->get();
        return view('home', compact('news', 'olympiads'));
    }

    public function about()
    {
        return view('about');
    }

    public function showDocument()
    {
        return view('documents');
    }

    public function showTeacherDocument()
    {
        return view('teacher-documents');
    }

    public function contact()
    {
        return view('contacts');
    }

}
