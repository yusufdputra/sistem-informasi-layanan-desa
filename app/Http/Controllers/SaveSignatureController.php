<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaveSignatureController extends Controller
{
    static function store(Request $request)
    {
        $folderPath = public_path('storage/uploads/signatures/');
        $image_parts = explode(";base64,", $request->tanda_tangan);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        return $file;
    }
}
