<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'path',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'media_id');
    }

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class, 'logo_id');
    }

    public function productMedia(): HasMany
    {
        return $this->hasMany(ProductMedia::class);
    }
}