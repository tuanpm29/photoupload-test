<?php

namespace App\Repositories;


use App\Models\Image;
use App\Models\ImageTagMap;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ImageTagMapRepository extends AbstractRepository
{

    public function create($data)
    {
        return ImageTagMap::create($data);
    }

    public function find($id)
    {

    }

    public function findImagesByTag(Tag $tag, $page) {
        $foundImageQuery =
            DB::table('image_tag')
                ->select('images.*')
                ->join('images', 'image_tag.image_id', '=', 'images.id')
                ->where('image_tag.tag_id', $tag->id);

        return $this->getPage($foundImageQuery, $page);
    }

    public function findTagsByImage(Image $image, $page = 0) {
        $foundTagQuery =
            DB::table('image_tag')
                ->select('tags.*')
                ->join('tags', 'image_tag.tag_id', '=', 'tags.id')
                ->where('image_tag.image_id', $image->id);

        return $this->getPage($foundTagQuery, $page);
    }

    public function firstOrCreate(Tag $tag, Image $image) {
        return ImageTagMap::firstOrCreate([
            'tag_id' => $tag->id,
            'image_id' => $image->id
        ]);
    }

    public function removeTagFromImage(Image $image) {
        return ImageTagMap::where('image_id', $image->id)->delete();
    }
}