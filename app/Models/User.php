<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'username', 'age', 'email', 'password', 'school', 'bio','addres', 'instagram', 'tiktok','youtube', 'linkedin', 'github', 'profile_image'
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
