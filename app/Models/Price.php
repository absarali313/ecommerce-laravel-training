<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Price extends Model
{
    use HasFactory;

    protected $fillable=[
        'price',
        'started_at',
        'ended_at',
        'product_size_id',
    ];

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
