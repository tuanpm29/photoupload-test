<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2/28/2019
 * Time: 4:01 AM
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TagBindRequest;
use App\Repositories\ImageRepository;
use App\Repositories\ImageTagMapRepository;
use App\Repositories\TagRepository;

class TagController extends Controller
{
    private $tagRepository;
    private $imageTagMapRepository;
    private $imageRepository;

    public function __construct(TagRepository $tagRepository, ImageTagMapRepository $imageTagMapRepository, ImageRepository $imageRepository) {
        $this->tagRepository = $tagRepository;
        $this->imageTagMapRepository = $imageTagMapRepository;
        $this->imageRepository = $imageRepository;
    }

    public function bind(TagBindRequest $request) {
        $submittedTags = collect($request->get(TagBindRequest::KEY_TAG_NAME));
        $imageStringId = $request->get(TagBindRequest::KEY_IMAGE_STRING_ID);

        $foundTags = $this->tagRepository->getOrCreate($submittedTags);
        $image = $this->imageRepository->find($imageStringId);

        $this->imageTagMapRepository->removeTagFromImage($image);

        foreach($foundTags as $tag) {
            $this->imageTagMapRepository->firstOrCreate($tag, $image);
        }

        return [
            'image_id' => $imageStringId,
            'tags' => $submittedTags
        ];
    }
}