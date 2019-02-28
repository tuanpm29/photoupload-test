<?php

namespace App\Repositories;


use App\Models\Tag;
use Illuminate\Support\Collection;

class TagRepository extends AbstractRepository
{
    public function all() {
        return Tag::all();
    }

    public function create($data)
    {
        return Tag::create($data);
    }

    public function find($tagName)
    {
        return Tag::where('tag_name', $tagName)->first();
    }

    public function firstOrCreate($data) {
        return Tag::firstOrCreate($data);
    }

    public function getOrCreate(Collection $tagNames) {
        $tagModelCollection = collect([]);

        foreach($tagNames as $key => $value) {
            $tagModelCollection->add($this->firstOrCreate(['tag_name' => $value]));
        }

        return $tagModelCollection;
    }
}