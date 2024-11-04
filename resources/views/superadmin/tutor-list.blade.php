@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Tutor List')

@section('content')

<div class="my-4 w-full overflow-x-auto">
    <div class="flex justify-between items-end flex-col md:flex-row">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">Tutor Management</h1>
            <p class="text-sm lg:text-base">You can manage all sections related to private tutor here</p>
            <h2 class="mt-6 text-lg lg:text-xl font-semibold">Tutor List</h2>
        </div>
        <div class="flex flex-col gap-2 mt-4 md:mt-0">
            <label for="role" class="text-sm lg:text-base">Filter by province</label>
            <select class="py-2 px-3 border border-yellow-500 text-black rounded-md bg-white" name="role" id="role">
                <option value="Admin">Sumatera Utara</option>
                <option value="Parents">Jawa Tengah</option>
                <option value="Job seeker">Kalimantan</option>
                <option value="Superadmin">Bali</option>
            </select>
        </div>
    </div>
    <div class="overflow-x-auto mt-6">
        <table class="min-w-full">
            <thead class="bg-blue-800 rounded-xl border border-blue-800">
                <tr>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">NIK</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Nama Operator</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Jenis Kelamin</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Jenjang Pendidikan</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Jurusan</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Alamat Domisili</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Provinsi</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">No Hp</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Status</th>
                    <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutor as $item)
                    <tr class="border border-yellow-500">
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->nik }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->nama_tutor }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">
                            @if ($item->jenis_kelamin == 'L')
                                Laki-Laki
                            @else
                                Perempuan
                            @endif
                        </td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->jenjang_pendidikan }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->jurusan }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->alamat_domisili }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->provinsi_naungan }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->no_hp }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->status }}</td>
                        <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">
                            <a href="{{ route('superadmin/tutor/detail', ['id' => $item->nik]) }}" class="underline text-blue-700">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-between flex-col md:flex-row gap-3 md:items-center mt-6">
        <div>
            <label for="rows">Rows per page</label>
            <select class="py-2 px-3 bg-yellow-100 rounded-md text-black" name="rows" id="rows">
                <option value="1">1</option>
            </select>
        </div>
        <div class="flex gap-2 items-center">
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"><</span>
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black">1</span>
            <span>/ 1</span>
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black">></span>
        </div>
    </div>
</div>
@endsection
