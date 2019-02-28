<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2/28/2019
 * Time: 7:36 PM
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Repositories\TagRepository;

class TagController extends Controller
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository) {
        parent::__construct();

        $this->tagRepository = $tagRepository;
    }

    public function index() {
        $tags = $this->tagRepository->all();
        $tagsValue = collect([]);

        $tags->each(function($item, $key) use ($tagsValue) {
            $tagsValue->push($item->tag_name);
        });

        return view('tags', ['tags' => $tagsValue]);
    }
}