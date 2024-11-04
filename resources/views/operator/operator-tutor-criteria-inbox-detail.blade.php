@extends('operator.layout.main-operator')

@section('title', 'Operator - Detail Pengajar') 

@section('content')

<div class="container mx-auto p-4">
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-4xl font-bold">Informasi Tutor</h1>
    </div>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-lg font-medium text-gray-700">Nama Pembuat Lowongan:</label>
                <p class="text-lg">{{ $data->parent_name }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Jenis Kelamin:</label>
                @if ($data->jenis_kelamin == 'L')
                <p class="text-lg">Pria</p>
                @elseif($data->jenis_kelamin == 'P')
                <p class="text-lg">Wanita</p>
                @elseif($data->jenis_kelamin == 'Both')
                <p class="text-lg">Pria/Wanita</p>
                @endif
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Provinsi:</label>
                <p class="text-lg">{{ $data->provinsi }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Alamat Mengajar:</label>
                <p class="text-lg">{{ $data->alamat_mengajar }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Universitas/Sekolah:</label>
                <p class="text-lg">{{ $data->universitas_sekolah }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Tingkat Pendidikan Murid:</label>
                <p class="text-lg">{{ $data->student_level }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Jurusan:</label>
                <p class="text-lg">{{ $data->jurusan }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Mata Pelajaran:</label>
                <p class="text-lg">{{ $data->mata_pelajaran }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Hari:</label>
                <p class="text-lg">{{ $data->hari }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Jam:</label>
                <p class="text-lg">{{ $data->jam }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Fee:</label>
                <p class="text-lg">{{ $data->fee }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium text-gray-700">Catatan Tambahan:</label>
                <p class="text-lg">{{ $data->additional_notes }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium text-gray-700">Cover Image:</label>
                @if ($data->cover_image)
                <img src="{{ asset($data->cover_image) }}" alt="Cover Image" class="mt-2 rounded-lg shadow-lg w-full">
                @else
                <p class="text-lg">Tidak ada Gambar</p>  
                @endif
            </div>
        </div>
        <div class="mt-8 flex justify-center space-x-4">
            <a href="javascript:history.back()" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Kembali</a>
        </div>
    </div>
</div>

@endsection
    