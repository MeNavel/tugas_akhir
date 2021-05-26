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
        echo shell_exec('/Applications/XAMPP/xamppfiles/htdocs/website/python/env/bin/python3 /Applications/XAMPP/xamppfiles/htdocs/website/python/hello_world.py 2>&1');
        // echo shell_exec('python3 --version 2>&1');
    }
}
