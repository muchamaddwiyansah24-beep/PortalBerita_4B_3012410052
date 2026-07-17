<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'publisher',
        'tanggal_berita',
        'kategori',
        'published'
    ];
}