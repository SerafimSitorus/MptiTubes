@extends('parents.layout.main-parent')

@section('title', 'Cari Tutor') 

@section('content')



<div class="flex flex-col p-4">
    <div class=" mb-8">
        <h1 class="text-xl lg:text-3xl font-bold">Find Tutor</h1>
        <p class="text-sm lg:text-base">Cari tutor dengan kriteria yang anda inginkan dengan menekan tombol tambah di bawah</p>
    </div>
    <div class="flex flex-wrap gap-4 justify-center md:flex">
      @foreach ($lowongans as $lowongan)  
      <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden shadow-lg">
        <img class="w-full" src="{{ $lowongan->cover_image ? asset($lowongan->cover_image) : asset('images/cover_criteria/TutorCriteriaCover.png') }}" alt="Pelajaran">
        <div class="px-6 py-4">
          
          <div class="font-bold text-xl mb-2">{{ $lowongan->mata_pelajaran }}</div>
          <p class=" text-base">Untuk Mengajar : {{ $lowongan->student_level }}</p>
          <p class=" text-base"> Hari: {{ $lowongan->hari }}</p>
          <p class=" text-base"> Jam: {{ $lowongan->jam }}</p>
          <p class=" text-base"> Tagihan: {{ $lowongan->fee }}</p>
        </div>
        <div class="flex justify-end px-6 pt-4 pb-2">
          @if ($lowongan->status == 'Menunggu Persetujuan')
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Menunggu Persetujuan</span>
          @endif
          @if ($lowongan->status == 'Disetujui')
          <span class="inline-block bg-green-500 rounded-full px-3 py-1 text-sm font-bold text-white mr-2 mb-2 justify-end">Diterima</span>
          @endif
          @if ($lowongan->status == 'Ditolak')
          <span class="inline-block bg-red-600 rounded-full px-3 py-1 text-sm font-bold text-black mr-2 mb-2">Ditolak</span>
            <button class="inline-block bg-black rounded-full px-3 py-1 text-sm font-bold text-white mr-2 mb-2">Hapus</button>
          @endif
        </div>
      </div>
      @endforeach
      
        
          
          <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden content-center">
            <div class="w-full flex content-center justify-center">
                <a href="tutor-review-parent-tambahlowongan">
                    <button class=" rounded-full p-2 mt-5 mb-4 transition duration-500 ease-in-out hover:bg-yellow-400 transform hover:-translate-y-1 hover:scale-110">
                      <img src="{{ asset('images/tombol_tambah_cari_tutor.png') }}" alt="Tambah" class="w-20 h-20">
                    </button>
                </a>
            </div>
          </div>
    </div>
    <div class="flex justify-between items-center mt-6">
      <div>
          @if ($lowongans->total() > 0)
          <p class="text-sm lg:text-base">Menampilkan {{ $lowongans->firstItem() }} sampai {{ $lowongans->lastItem() }} dari {{ $lowongans->total() }} data</p>
      
          @else
          <p class="text-sm lg:text-base">Showing 0 data</p>
              
          @endif
      </div>
      <div class="flex space-x-4">
          <!-- Prev Button -->
          <a href="{{ $lowongans->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $lowongans->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}" {{ $lowongans->onFirstPage() ? 'disabled' : '' }}>&lt;</a>
          <!-- Next Button -->
          <a href="{{ $lowongans->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$lowongans->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}" {{ !$lowongans->hasMorePages() ? 'disabled' : '' }}>&gt;</a>
      </div>
  </div>
</div>




@endsection