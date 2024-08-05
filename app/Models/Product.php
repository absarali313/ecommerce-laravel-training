<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'Visibility'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_product');
    }

    public function relatedProducts(){
        return $this->belongsToMany(Product::class,'product_products','product_id','related_product_id');
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function getImageAttribute(){}


    public function getTotalStock()
    {
        return $this->sizes->sum('stock');
    }

}
