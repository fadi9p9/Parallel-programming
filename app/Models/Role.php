<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }

    public function functionalityPermissions(): BelongsToMany
    {
        return $this->belongsToMany(FunctionalityPermission::class, 'roles_functionality_permissions')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_roles')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }
}