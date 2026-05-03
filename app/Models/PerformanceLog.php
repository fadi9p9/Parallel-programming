<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class PerformanceLog extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'performance_logs';

    protected $fillable = [
        'endpoint',
        'execution_time_ms',
        'memory_usage_kb',
    ];

    protected function casts(): array
    {
        return [
            'execution_time_ms' => 'integer',
            'memory_usage_kb' => 'integer',
        ];
    }
}