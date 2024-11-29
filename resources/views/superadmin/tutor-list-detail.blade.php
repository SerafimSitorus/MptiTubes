@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Tutor List')

@section('content')

<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-xl lg:text-3xl font-bold">Profil Pengajar</h1>
    </div>
    <div class="max-w-4xl mx-auto p-10 rounded-lg shadow-lg">
        <div class="flex flex-col items-center mb-8">
            <div class="relative w-[212px] h-[212px] rounded-full overflow-hidden mb-4">
                <img src="{{ $tutor->image ? asset($tutor->image) : asset('images/profiluser.jpg')}}"
                    alt="profiluser.jpg" class="w-full h-full object-cover">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8"> 
            <div>
                <label class="block text-lg font-medium ">Nama:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{ $tutor->nama_tutor }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Jenis Kelamin:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">
                    @if($tutor->jenis_kelamin == 'P')
                    Perempuan
                    @elseif($tutor->jenis_kelamin == 'L')
                    Laki-laki
                    @else
                    Tidak diketahui
                    @endif
                </p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Tempat Lahir:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{ $tutor->tempat_lahir }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Tanggal Lahir:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{ $tutor->tanggal_lahir }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">No. HP:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{ $tutor->no_hp }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Provinsi:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{ $tutor->provinsi_naungan }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium ">Alamat Domisili:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{ $tutor->alamat_domisili }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium ">Universitas/Sekolah:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{$tutor->universitasorsekolah}}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium ">Jurusan:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">{{$tutor->jurusan}}</p>
            </div>
            <div class="md:col-span-2">
                <h2 class="text-xl lg:text-2xl font-bold mb-4">Curriculum Vitae</h2>
                @if ($tutor->cv)
                <a href="{{ asset($tutor->cv) }}" target="_blank"
                     class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                    Lihat CV
                </a>
                    @else
                    <p class="text-red-500">CV belum diunggah.</p>
                @endif
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="javascript:history.back()"
                    class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
