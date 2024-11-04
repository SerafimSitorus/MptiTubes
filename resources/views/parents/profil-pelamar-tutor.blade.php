@extends('parents.layout.main-parent')

@section('title', 'Tutor Review') 

@section('content')

<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-xl lg:text-3xl font-bold">Profil Pelamar</h1>
    </div>
    <div class="max-w-4xl mx-auto p-10 rounded-lg shadow-lg">
        <div class="flex flex-col items-center mb-8">
            <div class="relative w-[212px] h-[212px] rounded-full overflow-hidden mb-4">
                <img src="images/profiluser.jpg" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-lg font-medium ">Email</label>
                <p class="mt-2 mb-4 block w-full  shadow-sm sm:text-lg p-2 0">user@example.com</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Nama Job Seeker:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">John Doe</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Jenis Kelamin:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">Laki-Laki</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Tempat Lahir:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">Jakarta</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Tanggal Lahir:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">2000-01-01</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">No. HP:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">08123456789</p>
            </div>
            <div>
                <label class="block text-lg font-medium ">Provinsi:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">Jawa Barat</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium ">Alamat Domisili:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">Jl. Merdeka No. 123, Bandung, Jawa Barat</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium ">Universitas/Sekolah:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">Univeristas Sumatera Utara</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium ">Jurusan:</label>
                <p class="mt-2 block w-full  shadow-sm sm:text-lg p-2  ">Pendidikan Bahasa Inggris</p>
            </div>
            <div class="md:col-span-2">
                <h2 class="text-xl lg:text-2xl font-bold mb-4">Curriculum Vitae</h2>
                <a href="{{ asset('cv/cv_ganteng.pdf') }}" target="cv_ganteng.pdf" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                    Lihat CV
                </a>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="javascript:history.back()" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Kembali</a>
            </div>
        </div>
    </div>
</div>


@endsection