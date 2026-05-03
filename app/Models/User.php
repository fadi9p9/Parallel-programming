<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'phone',
        'media_id',
        'is_phone_verified',
        'is_active',
        'is_temporary_password',
        'password_changed_at',
        'last_login_at',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_phone_verified' => 'boolean',
            'is_active' => 'boolean',
            'is_temporary_password' => 'boolean',
            'password_changed_at' => 'datetime',
            'last_login_at' => 'datetime',
        ];
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function otps(): HasMany
    {
        return $this->hasMany(UserOtp::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles')
            ->withPivot('created_by', 'updated_by', 'deleted_by')
            ->withTimestamps();
    }

    public function createdByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'created_by');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(UserSession::class);
    }

    public function loginAttempts(): HasMany
    {
        return $this->hasMany(LoginAttempt::class);
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function notificationSettings(): HasMany
    {
        return $this->hasMany(UserNotificationSetting::class);
    }
}