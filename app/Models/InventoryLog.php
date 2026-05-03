<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'change',
        'type',
        'source_type',
        'source_id',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected function casts(): array
    {
        return [
            'change' => 'decimal:2',
            'type' => 'integer',
            'source_type' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}