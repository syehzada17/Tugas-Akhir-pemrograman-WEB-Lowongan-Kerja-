<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'logo',
        'alamat',
        'email',
        'telepon',
        'website',
        'deskripsi',
    ];

    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }
}