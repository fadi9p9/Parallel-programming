<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'usage_name',
        'name',
        'guard_name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_permissions')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }

    public function functionalityPermissions(): BelongsToMany
    {
        return $this->belongsToMany(FunctionalityPermission::class, 'functionality_permissions_permissions')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }
}