<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'author',
        'is_published',
    ];

    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;
        if (\Illuminate\Support\Str::startsWith($this->image, 'images/')) {
            return asset($this->image);
        }
        return app(\App\Services\SupabaseStorageService::class)->publicUrl($this->image);
    }

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
