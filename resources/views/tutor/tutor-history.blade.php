@extends('tutor.layout.maintutor')
@section('title', 'Tutor - History')

@section('content')

@if (session('success_hapus'))
<div id="alertMessage" class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 rounded-md p-3 flex fixed top-4 right-4 shadow-lg z-50">
    <svg class="h-6 w-6 mr-2 flex-shrink-0 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M11.293 4.293a1 1 0 011.414 1.414L11.414 8l1.293 1.293a1 1 0 11-1.414 1.414L10 9.414l-1.293 1.293a1 1 0 11-1.414-1.414L8.586 8 7.293 6.707a1 1 0 111.414-1.414L10 6.586l1.293-1.293a1 1 0 011.414 0z" clip-rule="evenodd" />
    </svg>
    <div>
        <div class="font-bold text-xl">{{ session('success_hapus') }}!</div>
    </div>
</div>
@endif

<div class="my-4 w-full px-4 lg:px-20 overflow-auto min-h-screen">
    <div class="flex flex-col gap-4">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold">History JobSeeker</h1>
                <p class="text-sm lg:text-base mt-1">Selamat datang, {{ Auth::user()->username }}. Kamu bisa melihat riwayat lamaran dan statusnya di sini.</p>
            </div>
        </div>

        <!-- Important Information -->
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md">
            <div class="flex items-center">
                <svg class="h-6 w-6 mr-2 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                </svg>
                <div>
                    <p class="font-bold">Informasi Penting</p>
                    <p>Pastikan CV Anda selalu diperbarui dan berisi informasi lengkap agar peluang diterima menjadi lebih baik.</p>
                </div>
            </div>
        </div>

        @if ($data && count($data) > 0)
        <!-- List -->
        <ul class="divide-y divide-gray-300 bg-white rounded-md shadow-lg">
            @foreach ($data as $item)
            <li class="p-4 flex flex-col md:flex-row md:items-center justify-between hover:bg-gray-50">
                <div>
                    <p class="text-xs text-gray-500">{{ $item->provinsi }}</p>
                    <p class="text-base font-medium">{{ $item->alamat_mengajar }}</p>
                    <p class="text-lg font-bold">{{ $item->mata_pelajaran }}</p>
                    <a href="{{ route('tutor-history-detail', ['id_history_lowongan' => $item->kode]) }}" class="text-blue-600 mt-2 block">Detail Informasi</a>
                </div>
                <div class="mt-4 md:mt-0 flex items-center space-x-4">
                    @if ($item->status == 'Disetujui')
                    <span class="bg-green-600 text-white py-1 px-4 rounded-full text-sm">Diterima</span>
                    @elseif($item->status == 'Ditolak')
                    <span class="bg-red-600 text-white py-1 px-4 rounded-full text-sm">Ditolak</span>
                    <a href="{{ route('tutor-history-detail-hapus', ['id_history_lowongan' => $item->kode_lamaran]) }}" class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-lg text-sm">Hapus</a>
                    @else
                    <span class="bg-gray-600 text-white py-1 px-4 rounded-full text-sm">Menunggu Persetujuan</span>
                    <a href="{{ route('tutor-history-detail-hapus', ['id_history_lowongan' => $item->kode_lamaran]) }}" class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-lg text-sm">Batalkan</a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <div class="flex items-center justify-center h-64">
            <h1 class="text-2xl lg:text-4xl font-bold text-gray-500">Belum ada dilamar</h1>
        </div>
        @endif

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <div>
                @if ($data->total() > 0)
                    <p class="text-sm lg:text-base">Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari {{ $data->total() }} keseluruhan</p>
                @else
                    <p class="text-sm lg:text-base">Menampilkan 0 data</p>
                @endif
            </div>
            <div class="flex space-x-2">
                <a href="{{ $data->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $data->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}">&lt;</a>
                <a href="{{ $data->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$data->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}">&gt;</a>
            </div>
        </div>
    </div>
</div>

<script>
    if (document.getElementById('alertMessage')) {
        setTimeout(function() {
            document.getElementById('alertMessage').style.display = 'none';
        }, 5000);
    }
</script>

@endsection
