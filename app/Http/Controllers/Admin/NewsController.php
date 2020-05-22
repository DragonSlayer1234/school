<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreateNewsRequest;
use Intervention\Image\Facades\Image;
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

    public function edit()
    {
        return view('admin.news.edit');
    }

    public function store(CreateNewsRequest $request)
    {
        $path = $request->image->store('news', 'public');
        $preview = $request->image->store('news-preview', 'public');
        $previewAbs = storage_path("app/public/$preview");

        $image = Image::make($previewAbs);

        // $width = $image->width();
        // $height = $image->height();
        // if ($width < $height) {
        //     $height = $width;
        // }
        // $width = 0.75 * $height;
        //
        // $image->crop((int)$width, (int)$height);
        $image->resize(336, 251);
        $image->save($previewAbs);

        $preview = "/storage/$preview";
        $path = "/storage/$path";
        $news = News::new($request->title, $request->description, $path, $preview, $request->text);

        return redirect()->route('admin.news.index');
    }

    public function delete(Request $request, News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
