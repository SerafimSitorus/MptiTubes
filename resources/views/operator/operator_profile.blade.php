@extends('operator.layout.main-operator')

@section('title', 'Operator - Profil') 

@section('content')

<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-xl lg:text-3xl font-bold">Profil Pengguna</h1>
    </div>
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-lg shadow-lg">
        <div class="flex flex-col items-center mb-8">
            <div class="relative w-[212px] h-[212px] rounded-full overflow-hidden mb-4">
                <img src="{{ $operator->image ? asset($operator->image) : asset('images/profiluser.jpg') }}" alt="profiluser.jpg" class="w-full h-full object-cover">
            </div>
            <p class="mt-2 mb-4 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">Halo {{ $operator->nama_operator }} Ayo ganti passwordmu secara berkala untuk keamanan ekstra</p>
        </div>
        <div class="grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex-auto">
                <label class="block text-lg font-medium text-gray-700 text-center">Password</label>
                <p class="mt-2 mb-4 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100 content-center">********</p>
            </div>
            <div class="flex justify-center">
                <a href="operator-profil-edit-password" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none justify-end">Edit Password</a>
            </div>
        </div>
    </div>
</div>
@endsection
    