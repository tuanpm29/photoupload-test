<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';

    public $fillable = ['string_id', 'local_path', 'remote_path'];
}