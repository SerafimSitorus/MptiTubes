@extends('tutor.layout.maintutor')
@section('title', 'Tutor - Jadwal')
@section('content')
<div class="w-full my-4 mr-10 lg:mr-20 overflow-auto flex flex-col">
    <!-- Header Section -->
    <h1 class="text-xl lg:text-3xl font-bold text-gray-800">Jadwal Tutor</h1>
    <p class="text-sm lg:text-base text-gray-600 mt-1">
        Berikut adalah jadwal mengajar Anda. Tetap semangat memberikan yang terbaik!
    </p>

    <!-- Content Section -->
    @if ($kerja && count($kerja) > 0)
    <div class="border rounded-lg shadow-lg p-6 mt-6 bg-white">
        <h2 class="text-2xl font-semibold mb-4 text-blue-800">Informasi Jadwal</h2>
        <div id="schedule-info" class="space-y-6">
            <!-- Template Informasi Jadwal -->
            @foreach ($kerja as $data)
            <div class="p-4 border border-gray-300 rounded-lg shadow-sm bg-gray-50 hover:bg-gray-100 transition duration-300">
                <h3 class="text-lg font-bold text-gray-700">{{ $data->alamat_mengajar }}</h3>
                <ul class="mt-2">
                    <li class="text-gray-600">
                        <span class="font-medium text-blue-600">Jam:</span> {{ $data->jam }}
                    </li>
                    <li class="text-gray-600">
                        <span class="font-medium text-blue-600">Mata Pelajaran:</span> {{ $data->mata_pelajaran }}
                    </li>
                    <li class="text-gray-600">
                        <span class="font-medium text-blue-600">Hari:</span> {{ $data->hari }}
                    </li>
                    <li class="text-gray-600">
                        <span class="font-medium text-blue-600">Catatan Tambahan:</span> {{ $data->additional_notes }}
                    </li>
                </ul>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <p class="text-sm lg:text-base text-gray-600">
                Menampilkan {{ $kerja->firstItem() }} - {{ $kerja->lastItem() }} dari {{ $kerja->total() }} jadwal.
            </p>
            <div class="flex gap-2">
                <a href="{{ $kerja->previousPageUrl() }}" class="py-2 px-4 bg-blue-100 rounded-md text-blue-700 hover:bg-blue-200 {{ $kerja->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }} transition duration-300">
                    &lt; Sebelumnya
                </a>
                <a href="{{ $kerja->nextPageUrl() }}" class="py-2 px-4 bg-blue-100 rounded-md text-blue-700 hover:bg-blue-200 {{ !$kerja->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }} transition duration-300">
                    Selanjutnya &gt;
                </a>
            </div>
        </div>
    </div>
    @else
    <!-- No Schedule -->
    <div class="flex items-center justify-center h-64">
        <h1 class="text-2xl lg:text-4xl font-bold text-gray-500">Belum ada jadwal</h1>
    </div>
    @endif
</div>
@endsection
