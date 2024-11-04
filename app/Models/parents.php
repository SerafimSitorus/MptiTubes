<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'parents';
    protected $fillable = [
        'nik',
        'user_id',
        'nama_parents',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'provinsi',
        'alamat_domisili',
        'image',
    ];

    protected $guarded = ['nik'];
    protected $primaryKey = 'nik';

    protected $keyType = 'string';

    public function rules()
    {
        return [
            'nik' => 'unique:parents,nik,' . $this->id,
        ];
    }
}
