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
        'collection',
        'tagline',
        'description',
        'image',
        'is_active',
        'sort_order',
    ];

    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;
        if (\Illuminate\Support\Str::startsWith($this->image, 'images/')) {
            return asset($this->image);
        }
        return app(\App\Services\SupabaseStorageService::class)->publicUrl($this->image);
    }

    public function bubbles()
    {
        return $this->hasMany(ProductBubble::class)->orderBy('sort_order');
    }

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
