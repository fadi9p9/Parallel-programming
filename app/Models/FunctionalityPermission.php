<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FunctionalityPermission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'functionality_permissions_permissions')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_functionality_permissions')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }
}