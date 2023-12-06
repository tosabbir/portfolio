<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_name',
        'portfolio_title',
        'portfolio_short_description',
        'portfolio_description',
        'portfolio_date',
        'portfolio_location',
        'portfolio_client',
        'portfolio_link',
        'portfolio_video_url',
        'portfolio_category',
        'portfolio_slug',
        'portfolio_image',
    ];
}
