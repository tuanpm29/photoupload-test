<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TagBindRequest extends FormRequest
{
    const KEY_TAG_NAME = 'tags';
    const KEY_IMAGE_STRING_ID = 'image_id';
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            self::KEY_TAG_NAME => 'array',
            self::KEY_TAG_NAME.'.*' => 'string',
            self::KEY_IMAGE_STRING_ID => 'required|exists:images,string_id'
        ];
    }

    public function response($errors) {
        return $errors;
    }
}
