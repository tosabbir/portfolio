<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_name',
        'user_email',
        'user_phone',
        'contact_subject',
        'contact_budget',
        'message',
        'comment_section',
        'coment_section_id',
        'comment_type',
        'user_img',

    ];
}
