<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImage extends Controller
{
    public function uploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $request->file->store('public');
        return "File berhasil di upload";
    }
}
