<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'description', 'price', 'badge_status', 'is_available', 'image_url'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
