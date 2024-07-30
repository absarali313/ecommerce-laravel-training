<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable=[
        'price',
        'started_at',
        'ended_at',
    ];

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
