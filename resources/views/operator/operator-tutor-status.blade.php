@extends('operator.layout.main-operator')

@section('title', 'Operator - Tutor Status')

@section('content')

<div class="my-4 w-full px-4 lg:px-20 overflow-auto">
    <div class="flex justify-between md:items-end flex-col md:flex-row">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">Tutor Management</h1>
            <p class="text-sm lg:text-base">You can manage all sections related to private tutors here</p>
            <h2 class="mt-6 text-lg lg:text-xl font-semibold">Tutor Status</h2>
        </div>
        <h1 class="mt-6 text-lg lg:text-xl font-semibold">{{ $provinsi }}</h1>
    </div>
    <form action="{{ route('search_status_tutor_mengajar') }}" method="GET" class="my-4">
        <div class="flex gap-2">
            <input 
                type="text" 
                name="search" 
                class="py-2 px-4 border border-gray-300 rounded-md w-full lg:w-1/3"
                value="{{ request('search') }}" 
                placeholder="Cari data Nik atau Nama dari utor">
            <button 
                type="submit" 
                class="py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-800">
                Cari
            </button>
        </div>
    </form>



     <!-- Table Section -->
 <div class="overflow-x-auto bg-white rounded-lg shadow-md border border-yellow-300 mt-6">
    @if ((isset($result) && $result->count() > 0) || (isset($data) && $data->count() > 0))
    <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-blue-800 text-white">
            <tr>
                <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Nama Tutor</th>
                <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Mulai Mengajar</th>
                <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Berhenti Mengajar</th>
                <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Status</th>
                <th class="px-4 lg:px-6 py-2 text-left text-sm lg:text-base font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-yellow-300"> 
            @if (isset($data) && $data->count() > 0)      
            @foreach ($data as $item)
            <tr>
                <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->nama_tutor }}</td>
                <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ \Carbon\Carbon::parse($item->waktu)->setTimezone('Asia/Jakarta')->translatedFormat('d F Y H:i') }}</td>
                @if ($item->waktu == $item->waktu_berakhir)
                        <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">Belum Berakhir</td>
                    @else      
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <p>{{ \Carbon\Carbon::parse($item->waktu_berakhir)->setTimezone('Asia/Jakarta')->translatedFormat('d F Y H:i') }}</p>
                    </td>
                @endif
                @if ($item->status_mengajar == 'Mengajar')            
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <p class="py-2 px-2 rounded-md text-sm bg-green-300 text-black text-center">On-going</p>
                    </td>
                @else
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <p class="py-2 px-2 rounded-md text-sm bg-red-300 text-black text-center">Stop</p>
                    </td>
                @endif
                @if ($item->status_mengajar == 'Mengajar')    
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <a href="{{ route('hentikan_tutor_mengajar', ['id_mengajar' => $item->id]) }}" class="text-white font-bold hover:bg-gray-600 bg-gray-500 rounded-md py-2 px-2">Berhentikan</a>
                    </td>
                @else
                        <td></td>
                @endif
            </tr>
            @endforeach
            @elseif(isset($result) && $result->count() > 0)
            @foreach ($result as $item)
            <tr>
                <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->nama_tutor }}</td>
                <td class="px-4 lg:px-6 py-3 text-sm lg:text-base text-gray-700">{{ $item->waktu }}</td>
                @if ($item->waktu == $item->waktu_berakhir)
                        <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">Belum Berakhir</td>
                    @else      
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <p>{{ $item->waktu_berakhir }}</p>
                    </td>
                @endif
                @if ($item->status_mengajar == 'Mengajar')            
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <p class="py-2 px-2 rounded-md text-sm bg-green-300 text-black text-center">On-going</p>
                    </td>
                @else
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <p class="py-2 px-2 rounded-md text-sm bg-red-300 text-black text-center">Stop</p>
                    </td>
                @endif
                @if ($item->status_mengajar == 'Mengajar')    
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <a href="{{ route('hentikan_tutor_mengajar', ['id_mengajar' => $item->id]) }}" class="text-white font-bold hover:bg-gray-600 bg-gray-500 rounded-md py-2 px-2">Berhentikan</a>
                    </td>
                @else
                        <td></td>
                @endif
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

@if (isset($data))    
<div class="flex justify-between items-center mt-6">
    @if ($data->total() > 0)
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari {{ $data->total() }} data.
    </p>
    
    @else
    <p class="text-sm lg:text-base text-gray-600">
        Menampilkan 0 data.
    </p>
    
    @endif
    <div class="flex gap-2">
        <a href="{{ $data->previousPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ $data->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}">
            &lt;
        </a>
        <a href="{{ $data->nextPageUrl() }}" class="py-2 px-4 bg-yellow-100 rounded-md text-gray-600 hover:bg-yellow-200 {{ !$data->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}">
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
</div>

@endsection