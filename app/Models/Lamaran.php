<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lamaran',
        'nik_tutor',
        'nik_parent',
        'lowongan_id',
        'status'
    ];

    protected $primaryKey = 'id_lamaran';
}