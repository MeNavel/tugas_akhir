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
        $file_predict = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/test/mask_firsa.png";

        $data = 'Firsa';
        return view('result', ['data' => $data, 'foto' => $file_predict]);
    }
}
