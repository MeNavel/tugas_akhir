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
        
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $request->file->storeAs('python/test',$file_name);
        $file_predict = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/".$file->getClientOriginalName();
        $path_python = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/env/bin/python3";
        $path_progam = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/predict_mask.py";
        $path_model = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/model/mask/mobileNET_Mask.pkl";
        $command = escapeshellcmd("$path_python $path_progam $file_predict $path_model 2>&1");
        $predict_mask = shell_exec($command);
        set_time_limit(1000);
        echo json_encode($predict_mask);
    }
}
