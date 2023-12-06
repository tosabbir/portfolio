<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_title',
        'blog_short_description',
        'blog_description',
        'blog_tag',
        'blog_share',
        'blog_comment',
        'blog_category',
        'blog_category_slug',
        'blog_image',
    ];
}
