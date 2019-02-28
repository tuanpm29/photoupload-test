<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ImageTagMap extends Model
{
    public $table = 'image_tag';

    public $fillable = ['tag_id', 'image_id'];
}