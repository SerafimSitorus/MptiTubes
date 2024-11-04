@extends('tutor.layout.maintutor')
@section('title','Tutor - History')

@section('content')

@if (session('success_hapus'))
<div id="alertMessage" class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 rounded-md p-3 flex absolute">
    <svg class="h-6 w-6 mr-2 flex-shrink-0 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M11.293 4.293a1 1 0 011.414 1.414L11.414 8l1.293 1.293a1 1 0 11-1.414 1.414L10 9.414l-1.293 1.293a1 1 0 11-1.414-1.414L8.586 8 7.293 6.707a1 1 0 111.414-1.414L10 6.586l1.293-1.293a1 1 0 011.414 0z" clip-rule="evenodd" />
    </svg>
    <div>
        <div class="font-bold text-xl">{{ session('success_hapus') }}!</div>
    </div>
</div>
@endif

<div class="my-4 w-full px-4 lg:px-20 overflow-auto min-h-screen">
    <div class="flex flex-col gap-4 h-full">
        <!-- Header -->
        <div class="flex justify-between gap-3 items-start md:items-end flex-col md:flex-row">
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold">History JobSeeker</h1>
                <p class="text-sm lg:text-base mt-1">Selamat datang, {{ Auth::user()->username }}. Kamu bisa meilhat riwayat lamaran dan statusnya di sini.</p>
            </div>
        </div>

        <!-- Important Information -->
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md mb-4" role="alert">
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

        <!-- Cards -->
        <div class="flex flex-col gap-4">
            <!-- Card Template --> 
            @foreach ($data as $item)
            <div class="flex justify-between shadow-xl p-3 rounded-lg">
                <div class="flex gap-4">
                    <span class="flex flex-col gap-1">
                        <p class="text-xs">{{ $item->provinsi }}</p>
                        <p class="text-base">{{ $item->alamat_mengajar }}</p>
                        <p class="text-lg font-bold">{{ $item->mata_pelajaran }}</p>
                        <a href="{{ route('tutor-history-detail', ['id_history_lowongan' => $item->kode]) }}" class=" text-blue-600">Detail Informasi</a>
                    </span>
                </div>
                <div class="flex justify-center items-center">
                    @if ($item->status == 'Disetujui')                        
                    <span class="bg-green-600 rounded-full py-1 px-8">
                        <p class="text-white font-medium text-lg">Diterima</p>
                    </span>
                    @elseif($item->status == 'Ditolak')
                    <span class="bg-red-600 rounded-full py-1 px-8">
                        <p class="text-white font-medium text-lg">Ditolak</p>
                    </span>
                    <a href="{{ route('tutor-history-detail-hapus', ['id_history_lowongan' => $item->kode_lamaran]) }}" class="bg-red-600 text-white px-4 py-2 rounded-lg ml-4 hover:bg-red-700">Batalkan</a>
                    @else
                    <span class="bg-gray-600 rounded-full py-1 px-8">
                        <p class="text-white font-medium text-lg">Menunggu Persetujuan</p>
                    </span>
                    <a href="{{ route('tutor-history-detail-hapus', ['id_history_lowongan' => $item->kode_lamaran]) }}" class="bg-red-600 text-white px-4 py-2 rounded-lg ml-4 hover:bg-red-700">Batalkan</a>
                    @endif
                </div>
            </div>
            @endforeach
            <!-- Add more cards as needed -->
            <!-- ... -->
        </div>

        <!-- Pagination -->
        <div class="flex justify-between md:flex-row flex-col gap-3 md:items-center mt-6">
            {{ $data->links() }}
        </div>
    </div>
</div>

<script>
    if (document.getElementById('alertMessage')) {
        setTimeout(function() {
            document.getElementById('alertMessage').style.display = 'none';
        }, 5000); // Menghilangkan pesan setelah 5 detik (5000 milidetik)
    }
</script>

@endsection
