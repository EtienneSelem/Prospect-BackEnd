<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadFilesController extends Controller
{
    public function index(){
        return view('image');
    }

    public static function saveImage(\Symfony\Component\HttpFoundation\File\UploadedFile $file)
    {
        $name = date("Ymdhi").$file->getClientOriginalName();
        $path = $file->move('upload/images', $name);
        $save = new \App\Models\Files;

        $save->name = $name;
        $save->path = $path;
        if($save->save()){
            return  \App\Models\Files::where('name', $name)->first();
        }
    }
    public static function saveDoc(UploadedFile $file)
    {
        $name = $file->getClientOriginalName();
        $path = $file->move('upload/documents', $name);
        $save = new \App\Models\Files;

        $save->name = $name;
        $save->path = $path;
        return $save->save();

    }
}
