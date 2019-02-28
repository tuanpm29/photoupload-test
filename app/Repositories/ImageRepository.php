<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Str;

class ImageRepository extends AbstractRepository
{
    public function create($data)
    {
        $newImage = Image::create(['string_id' => $this->getAvailableStringId()]);
        $newImage->update($data);

        return $newImage;
    }

    public function find($id)
    {

    }

    public function getAvailableStringId() {
        do {
            $newStringId = Str::random(16);
        } while(Image::where('string_id', $newStringId)->exists());

        return $newStringId;
    }
}