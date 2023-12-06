<?php

namespace App\Models\MultiImage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMultiImage extends Model
{
    use HasFactory;
    protected $fillbale = [
        'images'
    ];
}
