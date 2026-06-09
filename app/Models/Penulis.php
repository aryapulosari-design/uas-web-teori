<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penulis extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'penulis';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_penulis');
    }
}
