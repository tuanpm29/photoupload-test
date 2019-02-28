<?php

namespace App\Http\Controllers\API;

use App\Helpers\ImageHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\UploadRequest;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $imageRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function upload(UploadRequest $request, ImageHelper $imageHelper, UploadHelper $uploadHelper) {
        $fileImage = $request->file(UploadRequest::KEY_IMAGE);

        $newImage = $this->imageRepository->create([]);
        $newPath = $uploadHelper->moveImage($fileImage, $newImage->string_id);

        $this->imageRepository->update($newImage, ['local_path' => $newPath]);

        return [
            'string_id' => $newImage->string_id,
            'url' => $imageHelper->generateURL($newImage)
        ];
    }

    public function get(Request $request) {

    }
}