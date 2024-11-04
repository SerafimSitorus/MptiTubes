@extends('parents.layout.main-parent')

@section('title', 'Cari Tutor')

@section('content')

<div class="container mx-auto p-4">
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-4xl font-bold">Form Review Tutor</h1>
    </div>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="nama_pengirim" class="block text-lg font-medium text-gray-700">Nama Pengirim</label>
                    <input type="text" id="nama_pengirim" name="nama_pengirim" maxlength="150" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                </div>
                <div>
                    <label for="nama_tutor" class="block text-lg font-medium text-gray-700">Tutor</label>
                    <input type="text" readonly id="nama_pengirim" name="nama_pengirim" maxlength="150" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                </div>
                <div>
                    <label for="alamat_mengajar" class="block text-lg font-medium text-gray-700">Alamat Mengajar</label>
                    <input type="text" id="alamat_mengajar" name="alamat_mengajar" maxlength="250" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                </div>
                <div>
                    <label for="student_level" class="block text-lg font-medium text-gray-700">Grade</label>
                    <select id="student_level" name="student_level" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                        <option value="S3">Very Good</option>
                        <option value="S2">Good</option>
                        <option value="S1">Bad</option>
                        <option value="SMA">Very Bad</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="additional_notes" class="block text-lg font-medium text-gray-700">Catatan Tambahan</label>
                    <textarea name="" id="" cols="30" rows="10" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4"></textarea>
                </div>
            </div>
            <div class="mt-8 flex justify-center">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-bold">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection
