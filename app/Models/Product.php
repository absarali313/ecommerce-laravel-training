<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'Visibility'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_product');
    }

    public function relatedProducts(){
        return $this->belongsToMany(Product::class,'product_product','product_id','related_product_id');
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class)->orderByAsc('order');
    }

    public function scopeCoverImage(){
        return $this->images()->orderByAsc('order')->first();
    }

}
