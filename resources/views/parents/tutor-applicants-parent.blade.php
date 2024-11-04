@extends('parents.layout.main-parent')

@section('title', 'Pelamar Tutor') 

@section('content')

<div class="my-4 mx-10 overflow-x-auto">
    <div class="flex justify-between md:items-end flex-col md:flex-row">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">List Pelamar Tutor</h1>
            <p class="text-sm lg:text-base">Anda bisa menyetujui atau tidak menyetujui tutor-tutor yang melamar di sini</p>
            <h2 class="mt-6 text-lg lg:text-xl font-semibold">List Tutor</h2>
        </div>
    </div>
    <table class="mt-6 w-full">
      <thead class="bg-blue-800 rounded-xl border border-blue-800">
        <tr class="rounded-md">
          <th class="text-white text-center px-3 py-1 lg:px-10 lg:py-3">Nama Tutor</th>
          <th class="text-white text-center px-3 py-1 lg:px-10 lg:py-3">Tanggal</th>
          <th class="text-white text-center px-3 py-1 lg:px-10 lg:py-3">Detail pengajar</th>
          <th class="text-white text-center px-3 py-1 lg:px-10 lg:py-3">Detail lowongan</th>
          <th class="text-white text-center px-3 py-1 lg:px-10 lg:py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr class="border border-yellow-500">
            <td class="lg:px-10 px-3 py-1 lg:py-3 text-center">{{ $item->tutor_name }}</td>
            <td class="lg:px-10 px-3 py-1 lg:py-3 text-center">{{ $item->waktu }}</td>
            <td class="lg:px-10 px-3 py-1 lg:py-3 text-center">
                <a href="{{ route('tutor-applicant-profil-detail', ['nik_lamaran' => $item->tutor_nik]) }}" class="underline text-blue-700">See details</a>
            </td>
            <td class="lg:px-10 px-3 py-1 lg:py-3 text-center">
                <a href="{{ route('tutor-applicant-lowongan-detail', ['id_lowongan' => $item->lowongan_tutor]) }}" class="underline text-blue-700">See details</a>
            </td>
            <td class="lg:px-10 px-3 py-1 lg:py-3 text-center">
                @if ($item->status_lamaransss == 'Disetujui')
                    <div class="text-white font-bold  bg-green-500 rounded-md py-2 px-2">Sudah Dilamar</div>
                @elseif($item->status_lamaransss == 'Ditolak')          
                    <div class="text-white font-bold  bg-red-500 rounded-md py-2 px-2">Ditolak</div>
                @else
                <div class="flex space-x-2 justify-center">
                    <a href="{{ route('tutor-applicant-terima', ['id_lamaran' => $item->lamaran_id]) }}" class="text-white font-bold hover:bg-green-600 bg-green-500 rounded-md py-2 px-2">Terima</a>
                    <a href="{{ route('tutor-applicant-tolak', ['id_lamaran' => $item->lamaran_id]) }}" class="text-white font-bold hover:bg-gray-600 bg-gray-500 rounded-md py-2 px-2">Tolak</a>
                </div>
                @endif
            </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    <div class="flex justify-between flex-col md:flex-row gap-3 md:items-center mt-6">
        <div>
            <label for="role">Rows per page</label>
            <select class="py-2 px-3 bg-yellow-100 rounded-md text-black" name="role" id="role">
                <option value="1">1</option>
            </select>
        </div>
        <div class="flex gap-2 flex-row items-center">
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> < </span>
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> 1 </span>
            <span>/ 1</span>
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> > </span>
        </div>
    </div>
</div>
</div>

@endsection