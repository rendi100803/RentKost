<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryId',
        'slug',
        'name',
        'thumbnailUrl',
        'description',
    ];
}
