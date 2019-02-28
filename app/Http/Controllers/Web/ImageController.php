<?php

namespace App\Http\Controllers\Web;


use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use App\Repositories\ImageTagMapRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $imageRepository;
    private $imageTagMapRepository;
    private $tagRepository;

    public function __construct(ImageRepository $imageRepository, ImageTagMapRepository $imageTagMapRepository, TagRepository $tagRepository)
    {
        parent::__construct();
        $this->imageRepository = $imageRepository;
        $this->imageTagMapRepository = $imageTagMapRepository;
        $this->tagRepository = $tagRepository;
    }

    public function upload() {
        return view('upload');
    }

    public function get(ImageHelper $imageHelper, $imageStringId) {
        $image = $this->imageRepository->find($imageStringId);

        if(empty($image)) {
            abort(404);
        }

        $tags = $this->imageTagMapRepository->findTagsByImage($image, 0);

        return view('image', [
            'imageStringId' => $imageStringId,
            'imageURL' => $imageHelper->generateURL($image),
            'dataTags' => $tags->implode('tag_name', ',')
        ]);
    }

    public function listByTag(Request $request, ImageHelper $imageHelper, $tagName) {
        $tag = $this->tagRepository->find($tagName);

        if(empty($tag)) {
            return view('list_image', ['images' => [], 'tagName' => $tagName]);
        }

        $images = $this->imageTagMapRepository->findImagesByTag($tag, $request->get('page', 0));

        $imagesCollection = collect([]);

        $imageRepository = $this->imageRepository;

        $images->each(function($item, $key) use ($imagesCollection, $imageHelper, $imageRepository) {
            $newObject = new \stdClass();
            $newObject->imageStringId = $item->string_id;
            $newObject->imageURL = $imageHelper->generateURL($imageRepository->buildFromObject($item));

            $imagesCollection->push($newObject);
        });

        return view('list_image', ['images' => $imagesCollection, 'tagName' => $tagName]);
    }
}