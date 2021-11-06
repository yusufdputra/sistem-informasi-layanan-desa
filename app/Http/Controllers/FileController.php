<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController
{
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
