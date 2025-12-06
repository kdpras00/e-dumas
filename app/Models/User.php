<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'alamat',
        'no_hp',
        'nik',
        'nama_lengkap',
        'rt_id',
        'user_level_id',
        'kategori_id',
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
        ];
    }

    public function level()
    {
        return $this->belongsTo(UserLevel::class, 'user_level_id');
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class, 'rt_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
