@extends('tutor.layout.maintutor')
@section('title','Tutor - Dasbor')

@section('content')

@if (session('success_lamar'))
<div id="alertMessage" class="bg-green-100 rounded-md p-3 flex absolute">
    <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
        viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2 4-4" />
    </svg>

    <div class="text-green-700">
        <div class="font-bold text-xl">{{ session('success_lamar') }}!</div>
        <div>Tunggu sampai orang tua menyetujui</div>
    </div>
</div>
@endif
<div class=" overflow-hidden">
    <div class="flex flex-col-reverse md:flex-row justify-end">
        <div class="flex flex-col gap-2 text-center md:text-left md:mx-auto mt-10 md:mt-40">
            <h1 class="text-4xl lg:text-7xl font-bold">Selamat Datang</h1>
            <p class="font-bold text-2xl mt-4">Kami di sini berperan sebagai perantara orang tua dan guru privat</p>
        </div>
        <div class="flex justify-center md:justify-end mt-10 md:mt-0">
            <img class="w-64 md:w-[446px] h-auto object-contain" src="{{ asset('images/guru.png') }}" alt="Guru" />
        </div>
    </div>

    <div class="text-center my-10">
        <h1 class="text-4xl font-bold">Aktivitas anda sejauh ini</h1>
    </div>
    <div class="container mx-auto p-5 rounded-lg shadow-lg">
        <div class="flex flex-col md:flex-row justify-around space-y-5 md:space-y-0 md:space-x-5">
            <div class="bg-gray-200 p-10 rounded-lg text-center flex-1 mx-3">
                <div class="flex justify-center my-4">
                    <img src="{{ asset('images/icon-books.png') }}" alt="" class="item-center w-12 h-12">
                </div>
                <h2 class="text-4xl text-black">{{ $data_setuju }}</h2>
                <p class="text-gray-600">Lowongan yang sedang dikerjakan</p>
            </div>
            <div class="bg-gray-200 p-10 rounded-lg text-center flex-1 mx-3">
                <div class="flex justify-center my-4">
                    <img src="{{ asset('images/icon-news.png') }}" alt="" class="item-center w-12 h-12">
                </div>
                <h2 class="text-4xl text-black">{{ $data_pending }}</h2>
                <p class="text-gray-600">Lowongan yang dilamar</p>
            </div> 
        </div>
    </div>
</div>

@endsection