<?php

namespace App\Models\MultiImage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMultiImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'images'
    ];
}
