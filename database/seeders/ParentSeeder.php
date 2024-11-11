<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\parents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentdata = [
            [
                'nik' => '1111222233334444',
                'user_id' => User::where('email', 'cici@gmail.com')->first()->id,
                'nama_parents' => 'Ceycylia Dear Amizafatel',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Batam',
                'tanggal_lahir' => '2004-05-21',
                'no_hp' => '081234565237',
                'provinsi' => 'Sumatera Utara',
                'alamat_domisili' => 'Jl. pegangsaan timur',
            ],
            [
                'nik' => '1111222233335555',
                'user_id' => User::where('email', 'gunawan@gmail.com')->first()->id,
                'nama_parents' => 'Gunawan Sihombing',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Bali',
                'tanggal_lahir' => '2004-07-21',
                'no_hp' => '081234565456',
                'provinsi' => 'Sumatera Barat',
                'alamat_domisili' => 'Jl. pengungsian timur',
            ],
            [
                'nik' => '1111222233336666',
                'user_id' => User::where('email', 'gazali@gmail.com')->first()->id,
                'nama_parents' => 'Gazali Sitorus',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Depok',
                'tanggal_lahir' => '2004-10-21',
                'no_hp' => '081234563123',
                'provinsi' => 'Lampung',
                'alamat_domisili' => 'Jl. pengasingan timur',
            ],
            [
                'nik' => '1111222233337777',
                'user_id' => User::where('email', 'gizali@gmail.com')->first()->id,
                'nama_parents' => 'Gizali Gunawan',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Comberan',
                'tanggal_lahir' => '2004-07-21',
                'no_hp' => '081234567899',
                'provinsi' => 'Sumatera Barat',
                'alamat_domisili' => 'Jl. konsentrasi timur',
            ],
            
        ];

        foreach($parentdata as $key => $val){
            parents::create($val);
        }
    }
}
