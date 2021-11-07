<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController
{
    static function cekFile(Request $request, $target)
    {
        if (($request->file('file_foto') != null)) {
            //jika ada upload foto
            //cek apakah ada file lama atau tidak
            if ($request->has('file_lama')) {
                $file_lama = $request->file_lama;
            } else {
                $file_lama = null;
            }
            $upload = FileController::uploadFile($target, $request->file('file_foto'), $file_lama);
        } else {
            // jika tidak ada ubah foto
            $upload = $request->file_lama;
        }
        return $upload;
    }
    static function uploadFile($target, $file, $file_lama)
    {
        try {
            if ($file_lama != null) {
                // update file
                // hapus file lama
                FileController::unlinkFile($file_lama);
            }
            // upload file baru
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file_path = $file->storeAs('uploads/' . $target, $file_name, 'public');
            return $file_path;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    static function unlinkFile($target)
    {
        try {
            unlink(storage_path('app/public/'. $target));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
