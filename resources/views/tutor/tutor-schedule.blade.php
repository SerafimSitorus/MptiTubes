@extends('tutor.layout.maintutor')
@section('title','Tutor - Jadwal')
@section('content')
<div class="w-full my-4 mr-10 lg:mr-20 overflow-auto flex flex-col">
    <h1 class="flex-col text-xl lg:text-3xl font-bold">Jadwal Tutor</h1>

    <div class="border rounded-lg shadow p-4 mt-4 bg-white">
        <h2 class="text-lg font-bold mb-2">Informasi Jadwal</h2>
        <div id="schedule-info">
            <!-- Template Informasi Jadwal -->
            @foreach ($kerja as $data)    
            <div class="mb-4 p-4 border rounded-lg shadow-sm">
                <h3 class="text-md font-semibold mb-2">{{ $data->alamat_mengajar }}</h3>
                <ul class="list-disc pl-5">
                    <li class="mb-2">{{ $data->jam }} : {{ $data->mata_pelajaran }}</li>
                    <p class="mb-2 font-semibold">{{ $data->hari }}</p>
                </ul>
            </div>
            @endforeach
            <!-- Tambahkan jadwal lain sesuai kebutuhan -->
        </div>
    </div>
</div>

@endsection