@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Tutor List')

@section('content')

<div class="my-6 w-full px-4 lg:px-10">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold text-gray-800">Manajemen Tutor</h1>
            <p class="text-sm lg:text-base text-gray-600">Data Semua Tutor</p>
        </div>
    </div>

    <form action="{{ route('superadmin/search-tutor-list') }}" method="GET" class="my-4">
        <div class="flex gap-2">
            <input 
                type="text" 
                name="search" 
                class="py-2 px-4 border border-gray-300 rounded-md w-full lg:w-1/3"
                value="{{ request('search') }}" 
                placeholder="Cari data Nik atau Nama dari tutor">
            <button 
                type="submit" 
                class="py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-800">
                Cari
            </button>
        </div>
    </form>

    <!-- Table Section -->
    <!-- Table Section -->
<div class="overflow-x-auto bg-white rounded-lg shadow-md border border-yellow-300 mt-6">
    @if ((isset($result) && $result->count() > 0) || (isset($tutor) && $tutor->count() > 0))
        <table class="min-w-full divide-y divide-yellow-300">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Nama Tutor</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Provinsi</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">No HP</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Status</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-yellow-300">
                @if (isset($result) && $result->count() > 0)
                    @foreach ($result as $item)
                    <tr>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->nama_tutor }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->provinsi_naungan }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->no_hp }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->status }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                            <a href="{{ route('superadmin/tutor/detail', ['id' => $item->nik]) }}" 
                            class="text-blue-600 hover:underline">Detail | </a>
                            <a href="{{ route('superadmin/tutor/edit', ['id' => $item->nik]) }}" class="text-green-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                @elseif (isset($tutor) && $tutor->count() > 0)
                    @foreach ($tutor as $item)
                    <tr>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->nama_tutor }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->provinsi_naungan }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->no_hp }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->status }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                            <a href="{{ route('superadmin/tutor/detail', ['id' => $item->nik]) }}" 
                            class="text-blue-600 hover:underline">Detail | </a>
                            <a href="{{ route('superadmin/tutor/edit', ['id' => $item->nik]) }}" class="text-green-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    @else
        <!-- Display "Belum Ada Data" -->
        <div class="flex items-center justify-center h-64">
            <h1 class="text-2xl lg:text-4xl font-bold text-gray-500">Belum Ada Data</h1>
        </div>
    @endif
</div>


@if (isset($tutor))    
<div class="flex justify-between items-center mt-6">
    @if ($tutor->total() > 0)
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan {{ $tutor->firstItem() }} sampai {{ $tutor->lastItem() }} dari {{ $tutor->total() }} data.
    </p>
    @else
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan 0 data.
    </p>
    @endif
    <div class="flex gap-2">
        <a href="{{ $tutor->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $tutor->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}">
            &lt;
        </a>
        <a href="{{ $tutor->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$tutor->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}">
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
