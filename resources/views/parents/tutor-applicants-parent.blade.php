@extends('parents.layout.main-parent')

@section('title', 'Pelamar Tutor')

@section('content')
<div class="my-4 mx-10 overflow-x-auto">
    <!-- Header Section -->
    <div class="flex justify-between md:items-end flex-col md:flex-row">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">List Pelamar Tutor</h1>
            <p class="text-sm lg:text-base">
                Anda bisa menyetujui atau tidak menyetujui tutor-tutor yang melamar di sini.
            </p>
            <h2 class="mt-6 text-lg lg:text-xl font-semibold">List Tutor</h2>
        </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md border border-yellow-300 mt-6">
        @if ($data->count() > 0)
        <table class="min-w-full divide-y divide-gray-300">
            <!-- Table Header -->
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Nama Tutor</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Tanggal</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Detail Pengajar</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Detail Lowongan</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Aksi</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-yellow-300">
                @foreach ($data as $item)
                <tr>
                    <!-- Nama Tutor -->
                    <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->tutor_name }}</td>
                    
                    <!-- Tanggal -->
                    <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">
                        {{ \Carbon\Carbon::parse($item->waktu)->setTimezone('Asia/Jakarta')->translatedFormat('d F Y H:i') }}
                    </td>
                    
                    <!-- Detail Pengajar -->
                    <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                        <a href="{{ route('tutor-applicant-profil-detail', ['nik_lamaran' => $item->tutor_nik]) }}" class="text-blue-600 hover:underline">
                            Lihat detail
                        </a>
                    </td>
                    
                    <!-- Detail Lowongan -->
                    <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                        <a href="{{ route('tutor-applicant-lowongan-detail', ['id_lowongan' => $item->lowongan_tutor]) }}" class="text-blue-600 hover:underline">
                            Lihat detail
                        </a>
                    </td>
                    
                    <!-- Actions -->
                    <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                        <div class="flex items-center gap-2">
                            @if ($item->status_lamaransss == 'Disetujui')
                                <span class="py-1 px-3 bg-green-600 text-white rounded-md">Diterima</span>
                            @elseif($item->status_lamaransss == 'Ditolak')
                                <span class="py-1 px-3 bg-red-600 text-white rounded-md">Ditolak</span>
                            @else
                                <a href="{{ route('tutor-applicant-terima', ['id_lamaran' => $item->lamaran_id]) }}" class="py-1 px-3 bg-green-500 text-white rounded-md hover:bg-green-700">Terima</a>
                                <a href="{{ route('tutor-applicant-tolak', ['id_lamaran' => $item->lamaran_id]) }}" class="py-1 px-3 bg-red-500 text-white rounded-md hover:bg-red-700">Tolak</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="flex items-center justify-center h-64">
            <h1 class="text-2xl lg:text-4xl font-bold text-gray-500">Belum Ada Data</h1>
        </div>
        @endif
    </div>

    <!-- Pagination Section -->
    <div class="flex justify-between items-center mt-6">
        <div>
            @if ($data->total() > 0)
                <p class="text-sm lg:text-base">
                    Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari {{ $data->total() }} data
                </p>
            @else
                <p class="text-sm lg:text-base">Showing 0 data</p>
            @endif
        </div>

        <div class="flex space-x-4">
            <!-- Previous Button -->
            <a href="{{ $data->previousPageUrl() }}" 
                class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $data->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}" 
                {{ $data->onFirstPage() ? 'disabled' : '' }}>
                &lt;
            </a>
            
            <!-- Next Button -->
            <a href="{{ $data->nextPageUrl() }}" 
                class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$data->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}" 
                {{ !$data->hasMorePages() ? 'disabled' : '' }}>
                &gt;
            </a>
        </div>
    </div>
</div>
@endsection
