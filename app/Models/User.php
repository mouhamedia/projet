<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs qui peuvent être remplis massivement.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // Indispensable pour votre système de rôles
    ];

    /**
     * Les attributs cachés pour la sécurité.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast des attributs pour faciliter le typage PHP.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean', // Transforme le 0/1 de la DB en false/true
    ];
}