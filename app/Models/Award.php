<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $fillable =[
        'award_title',
        'your_designation',
        'short_description',
        'award_image',
    ];
}
