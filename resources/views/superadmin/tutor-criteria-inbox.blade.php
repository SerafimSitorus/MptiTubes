@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Tutor Criteria Inbox')

@section('content')

<div class="my-6 w-full px-4 lg:px-10">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold text-gray-800">Manajemen Tutor</h1>
            <p class="text-sm lg:text-base text-gray-600">Kelola semua kriteria tutor di sini</p>
            <h2 class="mt-6 text-lg lg:text-xl font-semibold text-gray-700">Tutor Criteria Inbox</h2>
        </div>
    </div>

 <!-- Search Bar Section -->
 <form action="{{ route('superadmin/tutor-criteria-cari') }}" method="GET" class="my-4">
    <div class="flex gap-2">
        <input 
            type="text" 
            name="search" 
            class="py-2 px-4 border border-gray-300 rounded-md w-full lg:w-1/3"
            value="{{ request('search') }}" 
            placeholder="Cari data Nik atau Nama Parents">
        <button 
            type="submit" 
            class="py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-800">
            Cari
        </button>
    </div>
</form>

<!-- Table Section -->
<div class="overflow-x-auto bg-white rounded-lg shadow-md border border-yellow-300 mt-6">
  @if ((isset($result) && $result->count() > 0) || (isset($criteria) && $criteria->count() > 0))
  <table class="min-w-full divide-y divide-gray-300">
      <thead class="bg-blue-800 text-white">
          <tr>
              <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Nama Parent</th>
              <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Criteria Submit</th>
              <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Provinsi Lowongan</th>
              <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Tanggal dibuat</th>
              <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Aksi</th>
          </tr>
      </thead>
      <tbody class="divide-y divide-yellow-300"> 
          @if (isset($criteria) && $criteria->count() > 0)      
          @foreach ($criteria as $data)
          <tr>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $data->parent_name }}</td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                  <a href="{{ route('superadmin/tutor-criteria/detail', ['id_lowongan' => $data->id]) }}" class="text-blue-600 hover:underline">Lihat detail</a>
              </td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $data->provinsi }}</td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ \Carbon\Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta')->translatedFormat('d F Y H:i') }}</td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                  <div class="flex items-center gap-2">
                      @if ($data->status == 'Disetujui')
                          <span class="py-1 px-3 bg-green-600 text-white rounded-md">Diterima</span>
                      @elseif($data->status == 'Ditolak')
                          <span class="py-1 px-3 bg-red-600 text-white rounded-md">Ditolak</span>
                      @else
                          <a href="{{ route('tutor_criteria_inbox_terima', ['id_lowongan' => $data->id]) }}" class="py-1 px-3 bg-green-500 text-white rounded-md hover:bg-green-700">Terima</a>
                          <a href="{{ route('tutor_criteria_inbox_tolak', ['id_lowongan' => $data->id]) }}" class="py-1 px-3 bg-red-500 text-white rounded-md hover:bg-red-700">Tolak</a>
                      @endif
                  </div>
              </td>
          </tr>
          @endforeach
          @elseif(isset($result) && $result->count() > 0)
          @foreach ($result as $data)
          <tr>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $data->parent_name }}</td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                  <a href="{{ route('superadmin/tutor-criteria/detail', ['id_lowongan' => $data->id]) }}" class="text-blue-600 hover:underline">Lihat detail</a>
              </td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $data->provinsi }}</td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ \Carbon\Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta')->translatedFormat('d F Y H:i') }}</td>
              <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                  <div class="flex items-center gap-2">
                      @if ($data->status == 'Disetujui')
                          <span class="py-1 px-3 bg-green-600 text-white rounded-md">Diterima</span>
                      @elseif($data->status == 'Ditolak')
                          <span class="py-1 px-3 bg-red-600 text-white rounded-md">Ditolak</span>
                      @else
                          <a href="{{ route('superadmin/tutor-criteria/detail/terima', ['id_lowongan' => $data->id]) }}" class="py-1 px-3 bg-green-500 text-white rounded-md hover:bg-green-700">Terima</a>
                          <a href="{{ route('superadmin/tutor-criteria/detail/tolak', ['id_lowongan' => $data->id]) }}" class="py-1 px-3 bg-red-500 text-white rounded-md hover:bg-red-700">Tolak</a>
                      @endif
                  </div>
              </td>
          </tr>
          @endforeach
          @endif
      </tbody>
  </table>
  @else
  <div class="flex items-center justify-center h-64">
      <h1 class="text-2xl lg:text-4xl font-bold text-gray-500">Belum Ada Data</h1>
  </div>
  @endif
</div>

  @if (isset($criteria))    
  <div class="flex justify-between items-center mt-6">
    @if ($criteria->total() > 0)
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan {{ $criteria->firstItem() }} sampai {{ $criteria->lastItem() }} dari {{ $criteria->total() }} data.
    </p>
    @else
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan 0 data.
    </p>
    @endif
      <div class="flex gap-2">
          <a href="{{ $criteria->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $criteria->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}">
              &lt;
          </a>
          <a href="{{ $criteria->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$criteria->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}">
              &gt;
          </a>
      </div>
  </div>
  @endif

  @if (isset($result))    
  <div class="flex justify-between items-center mt-6">
    @if ($result->total() > 0)
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan {{ $result->firstItem() }} sampai {{ $result->lastItem() }} dari {{ $result->total() }} data.
    </p>
    @else
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan 0 data.
    </p>
        
    @endif
      <div class="flex gap-2">
          <a href="{{ $result->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $result->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}">
              &lt;
          </a>
          <a href="{{ $result->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$result->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}">
              &gt;
          </a>
      </div>
  </div>
  @endif
</div>

@endsection
