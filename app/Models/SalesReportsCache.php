<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesReportsCache extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'report_date',
        'report_type',
        'total_sales',
        'total_orders',
        'total_customers',
        'total_products_sold',
        'top_selling_product_id',
        'top_selling_category_id',
        'data',
    ];

    protected function casts(): array
    {
        return [
            'report_date' => 'date',
            'report_type' => 'integer',
            'total_sales' => 'decimal:2',
            'total_orders' => 'integer',
            'total_customers' => 'integer',
            'total_products_sold' => 'integer',
        ];
    }

    public function topSellingProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'top_selling_product_id');
    }

    public function topSellingCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'top_selling_category_id');
    }
}