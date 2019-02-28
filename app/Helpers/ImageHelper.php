<?php

namespace App\Helpers;


use App\Models\Image;

class ImageHelper
{
    public function generateURL(Image $image) {
        if(!empty($image->remote_path)) {
            return $image->remote_path;
        }

        return asset($image->local_path);
    }
}