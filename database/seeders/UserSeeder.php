<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $userData = [
        [
            'username'=>'kelompok2mpti',
            'email'=>'kelompok2mpti@gmail.com',
            'password'=>bcrypt('mptiKelompok2Paten'),
            'role'=>'superadmin'
        ],
        [
            'username'=>'SerafimSitorus',
            'email'=>'serafim@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'operator'
        ],
        [
            'username'=>'WahyuSianipar',
            'email'=>'wahyu@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'tutor'
        ],
        [
            'username'=>'CeycilliaDear',
            'email'=>'cici@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'parents'
        ],
        [
            'username'=>'Ghalbi',
            'email'=>'ghalbi@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'operator'
        ],
        [
            'username'=>'Rifqi',
            'email'=>'rifqi@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'operator'
        ],
        [
            'username'=>'ZeeroXc',
            'email'=>'luthfi@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'operator'
        ],
        [
            'username'=>'Denice',
            'email'=>'denice@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'operator'
        ],
        [
            'username' => 'Gunawan',
            'email' => 'gunawan@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'parents'
        ],
        [
            'username' => 'ManukGazali',
            'email' => 'gazali@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'parents'
        ],
        [
            'username' => 'ManukGizali',
            'email' => 'gizali@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'parents'
        ],
        [
            'username'=>'Hermann',
            'email'=>'hermann@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'tutor'
        ],
        [
            'username'=>'Wilhelm',
            'email'=>'wilhelm@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'tutor'
        ],
        [
            'username'=>'kirsten',
            'email'=>'kirsten@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'tutor'
        ]
    ];

    foreach($userData as $key => $val){
        User::create($val);
    }
    }
}
