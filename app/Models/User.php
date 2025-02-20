<?php

namespace App\Models;

// Menggunakan fitur autentikasi bawaan Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{   
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // Menggunakan HasFactory untuk mendukung pembuatan instance model secara otomatis
    // Menggunakan Notifiable untuk mendukung fitur notifikasi pada model User
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atribut yang harus disembunyikan saat serialisasi.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Mendapatkan atribut yang harus dikonversi ke tipe data lain.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Konversi tanggal verifikasi email ke format datetime
            'password' => 'hashed', // Menggunakan hashing pada password secara otomatis
        ];
    }
}