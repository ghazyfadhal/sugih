<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBubble extends Model
{
    use HasFactory;

    protected $table = 'product_bubbles';

    protected $fillable = [
        'product_id',
        'image',
        'sort_order',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;
        return app(\App\Services\SupabaseStorageService::class)->publicUrl($this->image);
    }
}
