<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'lowongan_id',
        'lamaran_id',
        'nik_tutor',
        'nik_parent',
        'status'
    ];
}
