<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'subscription_plan',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
            'is_admin' => 'boolean',
        ];
    }

    public function userTemplates()
    {
        return $this->hasMany(UserTemplate::class);
    }
    /**
     * Get the generated documents for the user.
     */
    public function generatedDocuments()
    {
        return $this->hasMany(GeneratedDocument::class);
    }

    /**
     * Get the details associated with the user.
     * Это связь "один к одному".
     */
    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function signedDocuments()
    {
        return $this->hasMany(SignedDocument::class);
    }
}
