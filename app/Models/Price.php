<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_size_id',
        'price',
        'started_at',
        'ended_at',
    ];

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class,'product_size_id');
    }
}
