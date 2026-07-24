<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'perusahaan_id',
        'posisi',
        'lokasi',
        'jenis_pekerjaan',
        'gaji',
        'deskripsi',
        'persyaratan',
        'deadline',
        'status',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}