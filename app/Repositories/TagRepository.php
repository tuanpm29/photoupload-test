<?php

namespace App\Repositories;


use App\Models\Tag;

class TagRepository extends AbstractRepository
{

    public function create($data)
    {
        return Tag::create($data);
    }

    public function find($tagName)
    {
        return Tag::where('tag_name', $tagName)->first();
    }

    public function firstOrCreate($tagName) {
        return Tag::firstOrCreate(['tag_name' => $tagName]);
    }
}