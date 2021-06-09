<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date("d/m/Y h:i:s");
        echo $tgl;
        // $name="firsa\n";
        // $name2 = substr($name, 0, -1);
        // echo $name2;
        // $identity = DB::table('dataset')->where('kode', 'LIKE', "%".$name2."%")->first();
        // return view('new', ['id' => $identity]);
    }
}
