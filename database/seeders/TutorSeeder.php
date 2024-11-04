<?php

namespace Database\Seeders;


use App\Models\tutor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentdata = [
            [
                'nik' => '1111222244444444',
                'user_id' => '3',
                'nama_tutor' => 'Wahyu Sianipar',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Balige',
                'tanggal_lahir' => '2003-05-21',
                'no_hp' => '081234234564',
                'provinsi_naungan' => 'Sumatera Utara',
                'alamat_domisili' => 'Jl. danau toba timur',
                'universitasorsekolah' => 'Universitas Sumatera Utara',
                'jurusan' => 'Teknologi Informasi',
                'jenjang_pendidikan' => 'S1',
                'status' => 'Aktif'
            ],
            [
                'nik' => '1111222255554444',
                'user_id' => '12',
                'nama_tutor' => 'Hermann Fegelein',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Jerman, Berlin',
                'tanggal_lahir' => '2005-05-21',
                'no_hp' => '081234231267',
                'provinsi_naungan' => 'Lampung',
                'alamat_domisili' => 'Jl. bisabelajar timur',
                'universitasorsekolah' => 'Universitas Indonesia',
                'jurusan' => 'Ilmu Komputer',
                'jenjang_pendidikan' => 'S1',
                'status' => 'Aktif'
            ],
            [
                'nik' => '1111222266664444',
                'user_id' => '13',
                'nama_tutor' => 'Wilhelm Keitel',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Amerika, New York',
                'tanggal_lahir' => '2005-05-26',
                'no_hp' => '081234231269',
                'provinsi_naungan' => 'Lampung',
                'alamat_domisili' => 'Jl. bisabertengkar timur',
                'jurusan' => 'Pemerintahan Daerah',
                'universitasorsekolah' => 'Institut Pemerintahan Dalam Negeri',
                'jenjang_pendidikan' => 'S1',
                'status' => 'Aktif'
            ],
            [
                'nik' => '1111222277774444',
                'user_id' => '14',
                'nama_tutor' => 'Kirsten Hutapea',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Tangerang',
                'tanggal_lahir' => '2005-05-21',
                'no_hp' => '081234231267',
                'provinsi_naungan' => 'Lampung',
                'alamat_domisili' => 'Jl. bisajadiasn timur',
                'universitasorsekolah' => 'SMA Negeri 8',
                'jurusan' => 'MIPA',
                'jenjang_pendidikan' => 'SMA',
                'status' => 'Aktif'
            ]
        ];

        foreach($parentdata as $key => $val){
            tutor::create($val);
        }
    }
}
