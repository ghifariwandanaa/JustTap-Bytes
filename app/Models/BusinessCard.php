<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor_telepon',
        'email',
        'instagram',
        'linkedin',
        'custom_link', // Menambahkan kolom custom_link ke dalam fillable
        'expired_at',
    ];

    protected $dates = ['expired_at'];

    // Menggunakan UUID sebagai primary key, jadi auto increment diatur menjadi false
    public function getIncrementing()
    {
        return false;
    }

    // Mengubah tipe primary key menjadi string (karena UUID)
    public function getKeyType()
    {
        return 'string';
    }
}
