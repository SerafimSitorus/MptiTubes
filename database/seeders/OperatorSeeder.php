<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\operator;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentdata = [
            [
                'nik' => '1111333333334444',
                'user_id' => '2',
                'nama_operator' => 'Serafim Edgar Pandamei Sitorus',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Pematangsiantar',
                'tanggal_lahir' => '2003-11-14',
                'provinsi_naungan' => 'Sumatera Utara',
                'alamat_domisili' => 'Jl. Berdikari 125',
                'jenjang_pendidikan' => 'S1',
                'jurusan' => 'Teknologi Informasi',
                'status' => 'Aktif'
            ],
            [
                'nik' => '1111444433334444',
                'user_id' => '5',
                'nama_operator' => 'Ghalbi Daffa Yustiawan',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2002-10-14',
                'provinsi_naungan' => 'Sumatera Utara',
                'alamat_domisili' => 'Jl. Sehat 125',
                'jenjang_pendidikan' => 'S1',
                'jurusan' => 'Teknologi Informasi',
                'status' => 'Tidak Aktif'
            ],
            [
                'nik' => '1111555533334444',
                'user_id' => '6',
                'nama_operator' => 'Rifqi Jabrah Rhae',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2004-05-14',
                'provinsi_naungan' => 'DKI Jakarta',
                'alamat_domisili' => 'Jl. SehatBergizi 125',
                'jenjang_pendidikan' => 'S1',
                'jurusan' => 'Ilmu Komputer',
                'status' => 'Aktif'
            ],
        ];

        foreach($parentdata as $key => $val){
            operator::create($val);
        }
    }
}
