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
        <h1 class="mt-6 text-lg lg:text-xl font-semibold">Sumatera Utara</h1>
    </div>
    <div class="overflow-x-auto mt-6">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-blue-800 rounded-xl">
                <tr class="rounded-md">
                    <th class="text-white text-left px-3 py-2 lg:px-10 lg:py-3">Username</th>
                    <th class="text-white text-left px-3 py-2 lg:px-10 lg:py-3">Mulai Mengajar</th>
                    <th class="text-white text-left px-3 py-2 lg:px-10 lg:py-3">Berhenti Mengajar</th>
                    <th class="text-white text-left px-3 py-2 lg:px-10 lg:py-3">Status</th>
                    <th class="text-white text-left px-3 py-2 lg:px-10 lg:py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)    
                <tr class="border border-yellow-500">
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">{{ $item->nama_tutor }}</td>
                    <td class="px-3 py-2 lg:px-10 lg:py-3 text-left">
                        <p>{{ $item->waktu }}</p>
                    </td>
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
            
            </tbody>
        </table>
    </div>

    <div class="flex justify-between flex-col md:flex-row gap-3 md:items-center mt-6">
        <div>
            <label for="role">Rows per page</label>
            <select class="py-2 px-3 bg-yellow-100 rounded-md text-black" name="role" id="role">
                <option value="1">1</option>
            </select>
        </div>
        <div class="flex gap-2 flex-row items-center">
            <button class="py-2 px-4 bg-yellow-100 rounded-md text-black">&lt;</button>
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black">1</span>
            <span>/ 1</span>
            <button class="py-2 px-4 bg-yellow-100 rounded-md text-black">&gt;</button>
        </div>
    </div>
</div>

@endsection