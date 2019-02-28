<?php

namespace App\Helpers;


use Illuminate\Http\UploadedFile;

class UploadHelper
{
    public function moveImage(UploadedFile $fileImage, $newFileName) {
        $localImageDir = config('upload.local_storage_dir');
        $newFileName = "{$newFileName}.{$fileImage->guessExtension()}";
        $fileImage->move(public_path($localImageDir), $newFileName);

        return "{$localImageDir}/{$newFileName}";
    }
}