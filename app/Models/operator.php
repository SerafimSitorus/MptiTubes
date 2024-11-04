<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\Hasuuids;
use Illuminate\Database\Eloquent\Model;

class operator extends Model
{
    use HasFactory, HasUuids;
    // public $incrementing = false; // Nonaktifkan auto-increment
    // protected $keyType = 'string'; // Set tipe primary key sebagai string
    protected $table = 'operators';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik',
        'user_id',
        'nama_operator',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'provinsi_naungan',
        'alamat_domisili',
        'jenjang_pendidikan',
        'jurusan',
        'status',
        'image',
    
    ];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName} operator");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
