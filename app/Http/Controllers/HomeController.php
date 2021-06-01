<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $path_python = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/env/bin/python3";
        $path_progam = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/predict_mask.py";
        // $path_progam = "/Applications/XAMPP/xamppfiles/htdocs/website/python/hello_world.py";
        $command = escapeshellcmd("$path_python $path_progam");
        $output = shell_exec($command);
        echo $output;

        // $file_predict = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/".$file->getClientOriginalName();
        // $path_python = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/env/bin/python3";
        // $path_progam = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/predict_mask.py";
        // $path_progam = "/Applications/XAMPP/xamppfiles/htdocs/website/python/hello_world.py";
        // $command = escapeshellcmd("$path_python $path_progam /Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/TEST_PREDICT_1.JPG  2>&1");
        // $output = shell_exec("$path_python $path_progam $file_predict");
        // echo $output;
        // echo shell_exec($command);
    }
}
