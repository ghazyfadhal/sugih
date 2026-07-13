<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'department',
        'location',
        'type',
        'description',
        'requirements',
        'is_active',
    ];

    public function getCoverImageUrlAttribute()
    {
        if (!$this->cover_image) return null;
        if (\Illuminate\Support\Str::startsWith($this->cover_image, 'images/')) {
            return asset($this->cover_image);
        }
        return app(\App\Services\SupabaseStorageService::class)->publicUrl($this->cover_image);
    }

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
