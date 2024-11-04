@extends('operator.layout.main-operator')

@section('title', 'Operator - Tutor Status') 

@section('content')
<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-xl lg:text-3xl font-bold">Profil Operator</h1>
    </div>
    <div class="max-w-4xl mx-auto  p-10 rounded-lg shadow-lg">
        <div class="flex flex-col items-center mb-8">
            <div class="relative w-[212px] h-[212px] rounded-full overflow-hidden mb-4">
                <img src="images/profiluser.jpg" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <a href="operator-edit-profile" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none">Edit Profil</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-lg font-medium text-gray-700">Email</label>
                <p class="mt-2 mb-4 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">user@example.com</p>
                <a href="parentseditemail" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Edit Email</a>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Password</label>
                <p class="mt-2 mb-4 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">********</p>
                <a href="parentseditpassword" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Edit Password</a>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Username</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">John Doe</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">nama operator</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">joni</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">NIK</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">123456789012345</p>
            </div>
            
            <div>
                <label class="block text-lg font-medium text-gray-700">Jenis Kelamin:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">Laki-Laki</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Tempat Lahir:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">Jakarta</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Tanggal Lahir:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">2000-01-01</p>
            </div>
            <div>
                <label class="block text-lg font-medium text-gray-700">Provinsi:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">Jawa Barat</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium text-gray-700">Alamat Domisili:</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">Jl. Merdeka No. 123, Bandung, Jawa Barat</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium text-gray-700">Jenjang Pendidikan</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">S1</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-lg font-medium text-gray-700">Jurusan</label>
                <p class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm sm:text-lg p-2 ">Teknologi Informasi
                </p>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="dashboard-parents" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Cancel</a>
            </div>
        </div>
    </div>
</div>

@endsection