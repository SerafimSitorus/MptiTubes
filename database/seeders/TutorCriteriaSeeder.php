<?php

namespace Database\Seeders;

use App\Models\tutor_criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentdata = [
            [
                'nik' => '1111222233334444',
                'jenis_kelamin' => 'P',
                'provinsi' => 'Sumatera Utara',
                'alamat_mengajar' => 'Jl. pegangsaan timur',
                'universitas_sekolah' => 'SMA Negeri 1 Medan',
                'student_level' => 'SMA',
                'jurusan' => 'MIPA',
                'mata_pelajaran' => 'Matematika',
                'hari' => 'Senin, Rabu, Jumat',
                'status' => 'Menunggu Persetujuan',
                'status_accept' => 'Belum Dilamar',
                'cover_image' => 'images/cover_criteria/kriteria.jpg',
                'jam' => '10:00 - 12:00',
                'fee' => 'Rp 1.000.000 per bulan',
                'additional_notes' => 'Khusus untuk hari Rabu Jam di mualai jam 10:00 - 14:00.'
            ],
            [
                'nik' => '1111222233335555',
                'jenis_kelamin' => 'Both',
                'provinsi' => 'DKI Jakarta',
                'alamat_mengajar' => 'Jl. Sudirman No. 2',
                'universitas_sekolah' => 'Universitas Bina Nusantara',
                'student_level' => 'S2',
                'jurusan' => 'Manajemen Bisnis',
                'mata_pelajaran' => 'Manajemen Proyek',
                'hari' => 'Selasa, Kamis',
                'status' => 'Disetujui',
                'status_accept' => 'Belum Dilamar',
                'jam' => '13:00 - 15:00',
                'fee' => 'Rp 1.500.000 per bulan',
                'additional_notes' => 'Pendekatan studi kasus dalam setiap pertemuan.',
            ],
            [
                'nik' => '1111222233335555',
                'jenis_kelamin' => 'L',
                'provinsi' => 'DKI Jakarta',
                'alamat_mengajar' => 'Jl. Sudirman No. 2',
                'universitas_sekolah' => 'Universitas Bina Nusantara',
                'student_level' => 'S1',
                'jurusan' => 'Teknik Informatika',
                'mata_pelajaran' => 'Algoritma Pemrograman',
                'hari' => 'Selasa, Kamis',
                'status' => 'Disetujui',
                'status_accept' => 'Belum Dilamar',
                'jam' => '13:00 - 15:00',
                'fee' => 'Rp 1.500.000 per bulan',
                'additional_notes' => 'Pendekatan studi kasus dalam setiap pertemuan.',
            ],
            [
                'nik' => '1111222233336666',
                'jenis_kelamin' => 'L',
                'provinsi' => 'Sumatera Utara',
                'alamat_mengajar' => 'Jl. Sudirman No. 2',
                'universitas_sekolah' => 'Universitas Sumatera Utara',
                'student_level' => 'S1',
                'jurusan' => 'Teknologi Informasi',
                'mata_pelajaran' => 'Pemrograman Web',
                'hari' => 'Selasa, Kamis, Sabtu',
                'status' => 'Disetujui',
                'status_accept' => 'Belum Dilamar',
                'jam' => '14:00 - 16:00',
                'fee' => 'Rp 1.500.000 per bulan',
                'additional_notes' => 'Pendekatan studi kasus dalam setiap pertemuan.',
            ],
            [
                'nik' => '1111222233334444',
                'jenis_kelamin' => 'L',
                'provinsi' => 'Sumatera Utara',
                'alamat_mengajar' => 'Jl. pegangsaan timur',
                'universitas_sekolah' => 'SMA Negeri 1 Medan',
                'student_level' => 'SMK',
                'jurusan' => 'Teknik Komputer Jaringan',
                'mata_pelajaran' => 'Jaringan Komputer',
                'hari' => 'Senin, Rabu, Jumat',
                'status' => 'Disetujui',
                'status_accept' => 'Belum Dilamar',
                'jam' => '10:00 - 12:00',
                'fee' => 'Rp 1.000.000 per bulan',
                'additional_notes' => 'Lebih mengedepankan Praktikum'
            ],
            [
                'nik' => '1111222233337777',
                'jenis_kelamin' => 'P',
                'provinsi' => 'Sumatera Utara',
                'alamat_mengajar' => 'Jl. pegangsaan timur',
                'universitas_sekolah' => 'SMA Negeri 1 Medan',
                'student_level' => 'SMA',
                'jurusan' => 'MIPA',
                'mata_pelajaran' => 'Matematika',
                'hari' => 'Senin, Rabu, Jumat',
                'status' => 'Disetujui',
                'status_accept' => 'Belum Dilamar',
                'jam' => '10:00 - 12:00',
                'fee' => 'Rp 1.000.000 per bulan',
                'additional_notes' => 'Lorem Ipsum'
            ],
            [
                'nik' => '1111222233337777',
                'jenis_kelamin' => 'P',
                'provinsi' => 'Sumatera Utara',
                'alamat_mengajar' => 'Jl. pegangsaan timur',
                'universitas_sekolah' => 'SMA Negeri 1 Medan',
                'student_level' => 'SMA',
                'jurusan' => 'MIPA',
                'mata_pelajaran' => 'Matematika',
                'hari' => 'Senin, Rabu, Jumat',
                'status' => 'Disetujui',
                'status_accept' => 'Belum Dilamar',
                'jam' => '10:00 - 12:00',
                'fee' => 'Rp 1.000.000 per bulan',
                'additional_notes' => 'Lorem Ipsum'
            ]
        ];

        foreach($parentdata as $key => $val){
            tutor_criteria::create($val);
        }
    }
}
