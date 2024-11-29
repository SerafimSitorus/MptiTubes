<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class tutor extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'tutors';
    protected $fillable = [
        'nik',
        'user_id',
        'nama_tutor',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'provinsi_naungan',
        'alamat_domisili',
        'universitas/sekolah',
        'jenjang_pendidikan',
        'jurusan',
        'status',
        'image',
        'cv',
    
    ];

    protected $guarded = ['nik'];
    protected $primaryKey = 'nik';

    protected $keyType = 'string';

    public function rules()
    {
        return [
            'nik' => 'unique:tutors,nik,' . $this->id,
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName} tutor");
    }
}
