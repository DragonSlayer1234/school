<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download(Request $request)
    {
        return response()->download(storage_path("app/public/{$request->path}"));
    }

    public function uploadImage(Request $request)
    {
        $path = str_replace('public', '/storage', $request->file('file')->store('public/tmp-images'));
        return $path;
    }
}
