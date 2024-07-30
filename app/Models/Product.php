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




}
