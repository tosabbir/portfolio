<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_category',
        'service_title',
        'service_short_details',
        'service_details',
        'service_icon',
        'service_image',
    ];
}
