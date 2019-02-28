<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2/28/2019
 * Time: 3:19 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';

    public $fillable = ['string_id', 'local_path', 'remote_path'];
}