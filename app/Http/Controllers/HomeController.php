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
        $tgl=date("Y/m/d H:i:s");
        // $nama = 'Sudrajad Hadi Saputra';
        // $status = 'Tidak Menggunakan Masker';

        // DB::table('predicts')->insert([
        //     'nama' => $nama,
        //     'status' => $status,
        //     'created_at' => $tgl
        // ]);

        echo $tgl;
        // $name="firsa\n";
        // $name2 = substr($name, 0, -1);
        // echo $name2;
        // $identity = DB::table('dataset')->where('kode', 'LIKE', "%".$name2."%")->first();
        // return view('new', ['id' => $identity]);
    }
}
