<?php

namespace App\Repositories;


use App\Models\Image;
use App\Models\ImageTagMap;
use App\Models\Tag;

class ImageTagMapRepository extends AbstractRepository
{

    public function create($data)
    {
        return ImageTagMap::create($data);
    }

    public function find($id)
    {

    }

    public function findImagesByTag(Tag $tag) {

    }

    public function findTagsByImage(Image $image) {

    }

    public function firstOrCreate(Tag $tag, Image $image) {
        return ImageTagMap::firstOrCreate([
            'tag_id' => $tag->id,
            'image_id' => $image->id
        ]);
    }
}