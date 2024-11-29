@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Operator Detail')

@section('content')

<div class="my-8 px-4 lg:px-20">
    <!-- Heading Section -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl lg:text-4xl font-bold text-gray-900">Detail Operator</h1>
            <p class="text-gray-600 text-sm lg:text-base">Lihat detail operator pada halaman ini</p>
        </div>
    </div>

    <!-- Operator Details Section -->
    <div class="bg-white shadow-lg rounded-lg p-6 space-y-6">
        <!-- Grid Layout for Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">     

            <!-- NIK -->
            <div>
                <p class="font-medium text-gray-700">Nomor Induk Kependudukan</p>
                <p class="text-gray-900">{{ $operator->nik }}</p>
            </div>

            <!-- Nama Operator -->
            <div>
                <p class="font-medium text-gray-700">Nama Operator</p>
                <p class="text-gray-900">{{ $operator->nama_operator }}</p>
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <p class="font-medium text-gray-700">Jenis Kelamin</p>
                <p class="text-gray-900">{{ $operator->jenis_kelamin == 'L' ? 'Pria' : 'Wanita' }}</p>
            </div>

            <!-- Provinsi Naungan -->
            <div>
                <p class="font-medium text-gray-700">Provinsi Naungan</p>
                <p class="text-gray-900">{{ $operator->provinsi_naungan }}</p>
            </div>

            <!-- Status -->
            <div>
                <p class="font-medium text-gray-700">Status</p>
                <p class="text-gray-900">{{ $operator->status }}</p>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-8 text-right">
        <a href="{{ route('superadmin/operator') }}" class="py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md shadow-md">
            Kembali
        </a>
    </div>
</div>

@endsection
