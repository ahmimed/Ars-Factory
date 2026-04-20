<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    public const UPDATED_AT = null;

    protected $table = 'images';

    protected $fillable = [
        'image_path',
    ];
}