@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Edit Operator')

@section('content')

<div class="my-4 w-full px-4 lg:px-20">
    {{-- @php
        dd($tutor)
    @endphp --}}
    <div class="flex flex-col lg:flex-row lg:justify-between items-start lg:items-end mb-8">
        <div>
            <h1 class="text-2xl lg:text-4xl font-extrabold text-gray-800">Edit Tutor</h1>
            <p class="text-sm lg:text-base text-gray-600 mt-2">Perbarui status tutor di halaman ini.</p>
        </div>
        <div class="mt-4 lg:mt-0">
            <a href="javascript:history.back()" 
               class="py-2 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 transition duration-200">
               &larr; Kembali ke Daftar Tutor
            </a>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8">
        <form action="{{ route('superadmin/tutor/update', ['id' => $tutor->nik]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Operator -->
            <div class="mb-6">
                <label for="nama_operator" class="block text-lg font-medium text-gray-700">Nama Tutor</label>
                <input type="text" id="nama_operator" name="nama_operator" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-not-allowed" 
                       value="{{ $tutor->nama_tutor }}" readonly>
            </div>

            <!-- NIK Operator -->
            <div class="mb-6">
                <label for="nama_operator" class="block text-lg font-medium text-gray-700">NIK Tutor</label>
                <input type="text" id="nik_operator" name="nik_operator" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-not-allowed" 
                       value="{{ $tutor->nik }}" readonly>
            </div>


            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-lg font-medium text-gray-700">Status</label>
                <select id="status" name="status" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        required>
                    <option value="Aktif" {{ $tutor->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ $tutor->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <!-- Button Actions -->
            <div class="flex justify-end gap-4 mt-8">
                <button type="submit" 
                        class="py-2 px-6 rounded-lg bg-blue-600 text-white hover:bg-blue-500 transition duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
