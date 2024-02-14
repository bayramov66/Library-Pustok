<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class AdminUser extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = 'admin';

    protected $fillable = [
            'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return true; 
    }
}
