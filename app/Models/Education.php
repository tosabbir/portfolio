<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'education_title',
        'cgpa',
        'out_of',
        'year',
        'short_description',
    ];
}
