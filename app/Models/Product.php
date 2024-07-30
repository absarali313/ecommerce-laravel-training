<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    // Define fillable fields
    protected $fillable = [
        'title',
        'description',
        'Visibility'
    ];

    public function relatedProducts(){
        return $this->belongsToMany(Product::class,'related_products','product_id','related_product_id');
    }

    public function relatedTo(){
        return $this->belongsToMany(Product::class,'related_products','related_product_id','product_id');
    }



}
