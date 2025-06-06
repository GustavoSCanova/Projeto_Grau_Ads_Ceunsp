<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
 
    use HasFactory, Notifiable, HasApiTokens, HasRoles, HasPermissions;

    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

