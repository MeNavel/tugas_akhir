<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UploadImage extends Controller
{
    public function uploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date("Y/m/d H:i:s");
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $request->file->storeAs('public',$file_name);
        $file_predict = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/public/".$file->getClientOriginalName();
        // $file_predict = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/test/mask_firsa.png";
        $path_python = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/env/bin/python3";

        $path_progam_mask = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/predict_mask.py";
        $path_model_mask = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/model/mask/mobileNET_Mask.pkl";

        $path_progam_face = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/predict_face.py";
        $path_model_face = "/Applications/XAMPP/xamppfiles/htdocs/website/storage/app/python/model/face/mobileNET_Face.pkl";
        
        
        $command = escapeshellcmd("$path_python $path_progam_mask $file_predict $path_model_mask");
        $predict_mask = shell_exec($command);
        if($predict_mask == "no_mask\n"){
            $command = escapeshellcmd("$path_python $path_progam_face $file_predict $path_model_face");
            $predict_face = shell_exec($command);
            // echo ($predict_face);
            // echo  "TIDAK menggunakan Masker";
            $result = "TIDAK menggunakan Masker";
            $predict_face2 = substr($predict_face, 0, -1);
            // echo $predict_face2;
            $indentity = DB::table('dataset')->where('kode', 'like', "%".$predict_face2."%")->first();
            DB::table('predicts')->insert([
                'nama' => $indentity->nama,
                'status' => $result,
                'created_at' => $tgl,
                'kode' => $predict_face2
            ]);
            return view('result', ['id' => $indentity ,'tgl' => $tgl ,'foto' => $file_name ,'data' => $result]);

        }
        if($predict_mask == "mask\n"){
            // echo "Menggunakan Masker";
            $result = "Menggunakan Masker";
            $predict_face = "Orang Tersebut";
        }
        // set_time_limit(1000);
        // echo ($predict_mask);
    }
}
