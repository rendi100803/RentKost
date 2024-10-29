<?php

namespace App\Models\Produk;

use App\Models\Kategori\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'categoryId', 'id');
    }
}
