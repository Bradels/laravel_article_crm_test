<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $attributes = [
        'title' => "1",
        'content' => "1",
        'image_path' => "1"
    ];
}
