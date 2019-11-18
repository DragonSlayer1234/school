<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileWorkController extends Controller
{
    public function download(Request $request)
    {
        return Storage::download($request->path);
    }
}
