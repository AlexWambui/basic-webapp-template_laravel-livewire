<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\USER_ROLES;
use App\Enums\USER_STATUSES;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'secondary_phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => USER_ROLES::class,
            'status' => USER_STATUSES::class,
        ];
    }

    public function isActive(): bool
    {
        return $this->status === USER_STATUSES::ACTIVE;
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === USER_ROLES::SUPER_ADMIN;
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, [
            USER_ROLES::ADMIN,
            USER_ROLES::SUPER_ADMIN,
            USER_ROLES::OWNER,
        ]);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getPhoneNumbersAttribute(): string
    {
        $phone_numbers = array_filter([
            $this->phone_number,
            $this->secondary_phone_number,
        ]);
        return $phone_numbers ? implode(' | ', $phone_numbers) : '-';
    }
}
