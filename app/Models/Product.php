<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'description',
        'price',
        'image_path',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price'     => 'integer',
        'is_active' => 'boolean',
        'sort_order'=> 'integer',
    ];
}
