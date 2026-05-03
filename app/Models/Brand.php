<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'logo_id',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function logo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}