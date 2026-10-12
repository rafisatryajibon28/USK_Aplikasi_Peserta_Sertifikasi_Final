<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'email',
        'no_hp',
        'alamat',
        'skema_id',
    ];

    // Relasi: setiap peserta punya satu skema
    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}
