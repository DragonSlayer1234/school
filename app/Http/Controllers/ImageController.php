<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request->file('file')->store('public/answers');

        return '/storage/' . ltrim($path, '/public');
    }
}
