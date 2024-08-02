<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'stock',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'product_size_id');
    }

    public function scopeCurrentPrice(){
        return $this->hasOne(Price::class,'product_size_id')->latestOfMany( $column = 'started_at');

    }
}
