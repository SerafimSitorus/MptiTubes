@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Operator List')

@section('content')

<div class="my-4 w-full px-4 lg:px-10 overflow-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">Manajemen Operator</h1>
            <p class="text-sm lg:text-base ">Kamu dapat mengatur operator setiap provinsi di halaman ini.</p>
            <h2 class="mt-4 text-lg lg:text-xl font-semibold">Daftar Operator:</h2>
        </div>
    </div>

    <!-- Filter Section -->
    <form id="filter-form" action="{{ route('superadmin/operator-province') }}" method="GET" class="mb-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
            <label for="role" class="text-sm lg:text-base font-medium ">Filter berdasarkan provinsi:</label>
            <select name="province" id="province" 
                    class="py-2 px-4 border border-yellow-400 rounded-md text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                    onchange="document.getElementById('filter-form').submit();">
                <option value="" disabled selected>Pilih Provinsi</option>
                @foreach ($provinsilist as $provinsi)
                <option value="{{ $provinsi }}" {{ request('province') == $provinsi ? 'selected' : '' }}>
                    {{ $provinsi }}
                </option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="overflow-x-auto mt-6 rounded-lg shadow-md border border-yellow-300">
        @if ((isset($result) && $result->count() > 0) || (isset($operator) && $operator->count() > 0))
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Nama Operator</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Provinsi Naungan</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Status</th>
                    <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-yellow-300">
                @if (isset($operator) && $operator->count() > 0)                    
                    @foreach ($operator as $item)
                    <tr>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">{{ $item->nama_operator }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">{{ $item->provinsi_naungan }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">{{ $item->status }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                            <a href="{{ route('superadmin/operator/detail', ['id' => $item->nik]) }}" class="text-blue-600 hover:underline">Detail</a> |
                            <a href="{{ route('superadmin/operator/edit', ['id' => $item->nik]) }}" class="text-green-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                @elseif(isset($result) && $result->count() > 0)
                    @foreach ($result as $item)
                    <tr>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">{{ $item->nama_operator }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">{{ $item->provinsi_naungan }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">{{ $item->status }}</td>
                        <td class="px-4 lg:px-6 py-3 text-sm lg:text-base">
                            <a href="{{ route('superadmin/operator/detail', ['id' => $item->nik]) }}" class="text-blue-600 hover:underline">Detail</a> |
                            <a href="{{ route('superadmin/operator/edit', ['id' => $item->nik]) }}" class="text-green-600 hover:underline">Edit</a>
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

    @if (isset($operator))    
    <!-- Pagination Section -->
    <div class="flex justify-between items-center mt-6">
        @if ($operator->total() > 0)    
        <div>
            <p class="text-sm lg:text-base">Menampilkan {{ $operator->firstItem() }} sampai {{ $operator->lastItem() }} dari {{ $operator->total() }} data</p>
        </div>
        @else
        <div>
            <p class="text-sm lg:text-base">Menampilkan 0 data</p>
        </div>
            
        @endif
        <div class="flex space-x-4">
            <!-- Prev Button -->
            <a href="{{ $operator->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $operator->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}" onclick="{{ !$operator->hasMorePages() ? 'event.preventDefault();' : '' }}">&lt;</a>
            <!-- Next Button -->
            <a href="{{ $operator->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$operator->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}" onclick="{{ !$operator->hasMorePages() ? 'event.preventDefault();' : '' }}">&gt;</a>
        </div>
    </div>
    @endif

    @if (isset($result))    
    <!-- Pagination Section -->
    <div class="flex justify-between items-center mt-6">
        <div>
            @if ($result->total() > 0)
            <p class="text-sm lg:text-base">Menampilkan {{ $result->firstItem() }} sampai {{ $result->lastItem() }} dari {{ $result->total() }} data</p>
            
            @else
            <p class="text-sm lg:text-base">Menampilkan 0 data</p>
                
            @endif
        </div>
        <div class="flex space-x-4">
            <!-- Prev Button -->
            <a href="{{ $result->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $result->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}" {{ $result->onFirstPage() ? 'disabled' : '' }}>&lt;</a>
            <!-- Next Button -->
            <a href="{{ $result->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$result->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}" {{ !$result->hasMorePages() ? 'disabled' : '' }}>&gt;</a>
        </div>
    </div>
    @endif
</div>

@endsection
