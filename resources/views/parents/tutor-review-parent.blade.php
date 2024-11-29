@extends('parents.layout.main-parent')

@section('title', 'Tutor Review') 

@section('content')

<div class="flex flex-col p-4" x-data="{ showModal: false, tutorToBeDismissed: null }">
    <div>
        <h1 class="text-xl lg:text-3xl font-bold">Tutor Mengajar</h1>
        <p class="text-sm lg:text-base">Tutor yang sedang mengajar</p>
        <h2 class="mt-6 text-lg lg:text-xl font-semibold">List Tutor</h2>
    </div>
    <div class="flex flex-wrap gap-4 justify-center">
        @forelse ($kerja as $item)
        <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden shadow-lg">
            <div class="flex justify-center">
                <img class="w-64 h-64 rounded-full content-center" src="{{ $item->gambar ? asset($item->gambar) : asset('images/profiluser.jpg') }}" alt="Satria">
            </div>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $item->nama_tutor }}</div>
                <p class="font-semibold text-lg">Mata Pelajaran : {{ $item->mata_pelajaran }}</p>
                <p class="font-semibold text-lg">Hari : {{ $item->hari }}</p>
                <p class="font-semibold text-lg">Jam : {{ $item->jam }}</p>
            </div>
            <div class="flex justify-end px-6 pt-4 pb-2">
                <!-- Tombol untuk melihat detail tutor -->
                <a href="{{ route('tutor-applicant-profil-detail', ['nik_lamaran' => $item->nik_tutor]) }}" class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-bold text-white mr-2 mb-2 hover:bg-blue-600">Lihat Detail pengajar</a>
                <!-- Tombol untuk melihat detail yang diajar -->
                <a href="{{ route('tutor-applicant-lowongan-detail', ['id_lowongan' => $item->id]) }}" class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-bold text-white mr-2 mb-2 hover:bg-blue-600">Lihat Detail Mengajar</a>
                
                <!-- Tombol untuk berhentikan tutor -->
                <button @click="showModal = true; tutorToBeDismissed = '{{ $item->id_mengajar }}'" class="inline-block bg-red-500 rounded-full px-3 py-1 text-sm font-bold text-black mr-2 mb-2 hover:bg-red-600">Berhentikan</button>
            </div>
        </div>
        @empty
        <div class="text-center mt-8">
            <p class="text-lg font-semibold">Tidak ada tutor yang sedang mengajar sekarang</p>
        </div>
        @endforelse
    </div>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
        <div class="bg-white rounded-lg p-8 max-w-sm mx-auto">
            <h2 class="text-2xl font-semibold mb-4">Konfirmasi Berhentikan</h2>
            <p class="mb-4">Apakah Anda yakin ingin berhentikan tutor ini?</p>
            <div class="flex justify-end">
                <button @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</button>
                <a :href="'tutor-management-berhentikan' + tutorToBeDismissed" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Berhentikan</a>
            </div>
        </div>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>

@endsection
