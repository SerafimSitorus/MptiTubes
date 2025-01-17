@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Edit Operator')

@section('content')

<div class="my-4 w-full px-4 lg:px-20">
    <div class="flex flex-col lg:flex-row lg:justify-between items-start lg:items-end mb-8">
        <div>
            <h1 class="text-2xl lg:text-4xl font-extrabold text-gray-800">Edit Operator</h1>
            <p class="text-sm lg:text-base text-gray-600 mt-2">Perbarui detail operator di halaman ini.</p>
        </div>
        <div class="mt-4 lg:mt-0">
            <a href="javascript:history.back()" 
               class="py-2 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 transition duration-200">
               &larr; Kembali ke Daftar Operator
            </a>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8">
        <form action="{{ route('superadmin/operator/update', ['id' => $operator->nik]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Operator -->
            <div class="mb-6">
                <label for="nama_operator" class="block text-lg font-medium text-gray-700">Nama Operator</label>
                <input type="text" id="nama_operator" name="nama_operator" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-not-allowed" 
                       value="{{ $operator->nama_operator }}" readonly>
            </div>

            <!-- Provinsi Naungan -->
            <div class="mb-6">
                <label for="provinsi_naungan" class="block text-lg font-medium text-gray-700">Provinsi Naungan</label>
                <select id="provinsi_naungan" name="provinsi_naungan" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        required>
                    @foreach ($provinsilist as $provinsi)
                        <option value="{{ $provinsi }}" {{ old('provinsi', $operator->provinsi_naungan) == $provinsi ? 'selected' : '' }}>
                            {{ $provinsi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-lg font-medium text-gray-700">Status</label>
                <select id="status" name="status" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        required>
                    <option value="Aktif" {{ $operator->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ $operator->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <!-- Button Actions -->
            <div class="flex justify-end gap-4 mt-8">
                <button type="submit" 
                        class="py-2 px-6 rounded-lg bg-blue-600 text-white hover:bg-blue-500 transition duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
