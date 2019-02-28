<?php

namespace App\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot() {
        view()->share('url', [
            'api' => [
                'upload' => route('api.upload'),
                'bindTag' => route('api.tag.bind')
            ],
            'web' => [
                'upload' => route('web.upload'),
                'image' => route('web.image', ['{imageId}' => ':id']),
                'tag' => route('web.tag')
            ]
        ]);
    }
}