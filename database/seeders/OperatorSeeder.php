<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\operator;
use App\Models\User;

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
                'user_id' => User::where('email', 'serafim@gmail.com')->first()->id,
                'nama_operator' => 'Serafim Edgar Pandamei Sitorus',
                'provinsi_naungan' => 'Sumatera Utara',
                'status' => 'Aktif'
            ],
            [
                'nik' => '1111444433334444',
                'user_id' => User::where('email', 'ghalbi@gmail.com')->first()->id,
                'nama_operator' => 'Ghalbi Daffa Yustiawan',
                'provinsi_naungan' => 'Sumatera Utara',
                'status' => 'Tidak Aktif'
            ],
            [
                'nik' => '1111555533334444',
                'user_id' => User::where('email', 'rifqi@gmail.com')->first()->id,
                'nama_operator' => 'Rifqi Jabrah Rhae',
                'provinsi_naungan' => 'DKI Jakarta',
                'status' => 'Aktif'
            ],
        ];

        foreach($parentdata as $key => $val){
            operator::create($val);
        }
    }
}
