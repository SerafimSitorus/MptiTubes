@extends('tutor.layout.maintutor')
@section('title','Tutor - Alljob')

@section('content')
<div class="flex flex-col items-center p-4">
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-3xl font-bold">Cari Lowongan</h1>
        <p class="text-sm lg:text-base mt-2">Cari Lowongan untuk anda mengajar</p>
    </div>

    @if (session('gagal_lamar'))
    <div id="alertMessage" class="bg-red-100 rounded-md p-3 flex absolute">
        <svg class="stroke-2 stroke-current text-red-600 h-8 w-8 mr-2 flex-shrink-0"
            viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
            <path d="M0 0h24v24H0z" stroke="none" />
            <circle cx="12" cy="12" r="9" />
            <path d="M10 10l4 4m0-4l-4 4" /> <!-- Path for cross icon -->
        </svg>
    
        <div class="text-red-700">
            <div class="font-bold text-xl">Perubahan Gagal Tersimpan!</div> <!-- Updated text for error -->
            <div>{{ session('gagal_lamar') }}</div> <!-- Assuming this session variable holds error messages -->
        </div>
    </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('tutor.searchjob') }}" method="GET">
        <div class="w-full max-w-lg mb-8">
            <div class="relative flex items-center w-full h-12 rounded-full shadow-lg bg-white overflow-hidden">
                <input class="peer h-full w-full outline-none text-sm text-gray-700 pl-4 bg-transparent" name="search" type="text" placeholder="Search..." />
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4v16m8-8H4" />
                    </svg>
                </div>
                <button type="submit" class="grid place-items-center h-full px-4 bg-blue-500 hover:bg-blue-600 transition-colors duration-300 focus:outline-none">
                    Search
                </button>
            </div>
        </div>
    </form>

    <!-- Tutor Cards -->
    @if (isset($search))
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-3xl font-bold">Pencarian Untuk : {{ $search }}</h1>
    </div>
    @endif

    <div class="flex flex-wrap gap-4 justify-center">
        @if(isset($alljob) && $alljob->count() > 0)
            @foreach ($alljob as $item)
            <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ $item->cover_image ? asset($item->cover_image) : asset('images/cover_criteria/TutorCriteriaCover.png') }}" alt="Matematika">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $item->mata_pelajaran }}</div>
                    <span>
                        <p class="text-sm">{{ $item->jam }}</p>
                        <p class="text-sm">{{ $item->fee }}</p>
                        <p class="font-bold text-lg mb-2">{{ $item->provinsi }}</p>
                    </span>
                </div>
                <div class="flex justify-end px-6 pt-4 pb-2">
                    <a href="{{ route('tutor.lamar', ['id_lowongan' => $item->id]) }}" class="px-4 py-2 rounded-lg bg-cyan-500 shadow-md mr-4">Apply Job</a>
                    <a href="{{ route('tutor.detailjob', ['id_job' => $item->id]) }}" class="px-4 py-2 rounded-lg bg-white text-black shadow-md">Detail Job</a>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <div class="flex flex-wrap gap-4 justify-center">
        @if(isset($result) && $result->count() > 0)
            @foreach ($result as $item)
            <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ $item->cover_image ? asset($item->cover_image) : asset('images/cover_criteria/TutorCriteriaCover.png') }}" alt="Matematika">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $item->mata_pelajaran }}</div>
                    <span>
                        <p class="text-sm">{{ $item->jam }}</p>
                        <p class="text-sm">{{ $item->fee }}</p>
                        <p class="font-bold text-lg mb-2">{{ $item->alamat_mengajar }}</p>
                    </span>
                </div>
                <div class="flex justify-end px-6 pt-4 pb-2">
                    <a href="{{ route('tutor.lamar', ['id_lowongan' => $item->id]) }}" class="px-4 py-2 rounded-lg bg-cyan-500 shadow-md mr-4">Apply Job</a>
                    <a href="{{ route('tutor.detailjob', ['id_job' => $item->id]) }}" class="px-4 py-2 rounded-lg bg-white text-black shadow-md">Detail Job</a>
                </div>
            </div>
            @endforeach
        @else
        @endif
    </div>

    <!-- Pagination -->
    @if(isset($result))
    <!-- Pagination Section -->
    <div class="flex justify-between items-center mt-6">
        <div>
            @if ($result->total() > 0)
                <p class="text-sm lg:text-base">Menampilkan {{ $result->firstItem() }} ke {{ $result->lastItem() }} dari {{ $result->total() }} Keseluruhan</p>  
            @else    
                <p class="text-sm lg:text-base">Menampilkan 0 data</p>  
            @endif
        </div>
        <div class="flex space-x-4">
            <!-- Prev Button -->
            <a href="{{ $result->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $result->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }} {{ $result->onFirstPage() ? 'disabled' : '' }} mx-2">&lt;</a>
            <!-- Next Button -->
            <a href="{{ $result->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$result->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }} {{ !$result->hasMorePages() ? 'disabled' : '' }} mx-2">&gt;</a>
        </div>
    </div>
    @else
    <!-- Pagination Section -->
    <div class="flex justify-between items-center mt-6">
        <div>
            @if ($alljob->total() > 0)
                <p class="text-sm lg:text-base">Menampilkan {{ $alljob->firstItem() }} sampai {{ $alljob->lastItem() }} dari {{ $alljob->total() }} keseluruhan</p>    
            @else    
                <p class="text-sm lg:text-base">Menampilkan 0 data</p>    
            @endif
        </div>
        <div class="flex space-x-4">
            <!-- Prev Button -->
            <a href="{{ $alljob->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $alljob->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }} {{ $alljob->onFirstPage() ? 'disabled' : '' }} mx-2">&lt;</a>
            <!-- Next Button -->
            <a href="{{ $alljob->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$alljob->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }} {{ !$alljob->hasMorePages() ? 'disabled' : '' }} mx-2">&gt;</a>
        </div>
    </div>
    @endif
</div>

<script>
    if (document.getElementById('alertMessage')) {
        setTimeout(function() {
            document.getElementById('alertMessage').style.display = 'none';
        }, 5000); // Menghilangkan pesan setelah 5 detik (5000 milidetik)
    }
</script>
@endsection