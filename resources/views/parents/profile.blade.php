@extends('parents.layout.main-parent')

@section('title', 'Parent - Dashboard') 

@section('content')

@if (session('success'))
<div id="alertMessage" class="bg-green-100 rounded-md p-3 flex absolute">
    <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
        viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2 4-4" />
    </svg>

    <div class="text-green-700">
        <div class="font-bold text-xl">Perubahan Berhasil Tersimpan!</div>
        <div>Perubahan Pada Profil anda Berhasil Tersimpan</div>
    </div>
</div>
@endif

@if (session('success_editemail'))
<div id="alertMessage" class="bg-green-100 rounded-md p-3 flex absolute">
    <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
        viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2 4-4" />
    </svg>

    <div class="text-green-700">
        <div class="font-bold text-xl">Perubahan Berhasil Tersimpan!</div>
        <div>{{ session('success_editemail') }}</div>
    </div>
</div>
@endif

@if (session('success_editpassword'))
<div id="alertMessage" class="bg-green-100 rounded-md p-3 flex absolute">
    <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
        viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2 4-4" />
    </svg>

    <div class="text-green-700">
        <div class="font-bold text-xl">Perubahan Berhasil Tersimpan!</div>
        <div>{{ session('success_editpassword') }}</div>
    </div>
</div>
@endif


<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-xl lg:text-3xl font-bold">Profil Pengguna</h1>
    </div>
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-lg shadow-lg">
        <div class="flex flex-col items-center mb-8">
            <div class="relative w-[212px] h-[212px] rounded-full overflow-hidden mb-4">
                <img src="{{ $parents->image ? asset($parents->image) : asset('images/profiluser.jpg') }}" alt="profiluser.jpg" class="w-full h-full object-cover">
            </div>
            <a href="parentsedit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none">Edit Profil</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-lg font-medium text-gray-700">Email</label>
                <p class="mt-2 mb-4 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ Auth::user()->email }}</p>
                <a href="parentseditemail" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Edit Email</a>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Password</label>
                <p class="mt-2 mb-4 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">********</p>
                <a href="parentseditpassword" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Edit Password</a>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Username</label>
                <p class="mt-2 mb-4 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ Auth::user()->username }}</p>
                <a href="parentseditusername" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Edit Username</a>
            </div>
            <div> 
                <label class="block text-lg font-medium text-gray-700">Nomor Induk Kependudukan (NIK)</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ $parents->nik }}</p>
            </div>
            <div> 
                <label class="block text-lg font-medium text-gray-700">Nama Orang Tua:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ $parents->nama_parents }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Jenis Kelamin:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">
                    @if($parents->jenis_kelamin == 'P')
                        Perempuan
                    @elseif($parents->jenis_kelamin == 'L')
                        Laki-laki
                    @else
                        Tidak diketahui
                    @endif
                </p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Tempat Lahir:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ $parents->tempat_lahir }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Tanggal Lahir:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ $parents->tanggal_lahir }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">No. HP:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ $parents->no_hp }}</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Provinsi:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ $parents->provinsi }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium text-gray-700">Alamat Domisili:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 bg-gray-100">{{ $parents->alamat_domisili }}</p>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="dashboard-parents" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
    
