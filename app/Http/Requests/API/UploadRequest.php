<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    const KEY_IMAGE = 'file';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            self::KEY_IMAGE => 'required|mimes:jpeg,png'
        ];
    }

    public function messages() {
        return [
            self::KEY_IMAGE.'.required' => __('image.error.upload.required'),
            self::KEY_IMAGE.'.mimes' => __('image.error.upload.image'),
        ];
    }

    public function response($errors) {
        return $errors;
    }
}
