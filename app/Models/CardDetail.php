<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardDetail extends Model
{
    protected $table = 'businessCard';

    protected $fillable = [
        'nama',
        'nomor_telepon',
        'email',
        'instagram',
        'linkedin',
        'expired_at',
    ];
}
