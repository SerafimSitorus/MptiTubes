@extends('parents.layout.main-parent')

@section('title', 'Cari Tutor')

@section('content')

<div class="container mx-auto p-4">
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-4xl font-bold">Form Pengisian Data</h1>
    </div>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        @if ($errors->any())
                    <div id="error-message" class="bg-red-500 text-white p-4 rounded-lg mb-6 relative">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button id="close-button" class="absolute top-0 right-0 mt-2 mr-2 text-white">×</button>
                    </div>
                @endif
        <form action="tutor-review-parent-tambahlowongan-insert" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="nik" value="{{ $nik }}">
            <input type="hidden" name="status" value="Menunggu Persetujuan">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="jenis_kelamin" class="block text-lg font-medium text-gray-700">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                        <option value="Both">Both</option>
                    </select>
                    <p class="text-sm italic text-gray-500 mt-1">Pilih Jenis Kelamin Pengajar, jika bebas pilih Both.</p>
                </div>
                <div>
                    <label for="provinsi" class="block text-lg font-medium text-gray-700">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                        @foreach ($provinsiList as $provinsi)
                            <option value="{{ $provinsi }}" {{ old('provinsi', $parent->provinsi) == $provinsi ? 'selected' : '' }}>{{ $provinsi }}</option>
                        @endforeach
                    </select>
                    <p class="text-sm italic text-gray-500 mt-1">Pilih provinsi lokasi tempat untuk diajar.</p>
                </div>
                <div>
                    <label for="alamat_mengajar" class="block text-lg font-medium text-gray-700">Alamat Mengajar</label>
                    <input type="text" id="alamat_mengajar" name="alamat_mengajar" maxlength="250" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                    <p class="text-sm italic text-gray-500 mt-1">Masukkan lokasi alamat tempat diajar.</p>
                </div>
                <div>
                    <label for="universitas_sekolah" class="block text-lg font-medium text-gray-700">Universitas/Sekolah</label>
                    <input type="text" id="universitas_sekolah" name="universitas_sekolah" maxlength="250" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                    <p class="text-sm italic text-gray-500 mt-1">Tempat yang diajar itu menempuh pendidikan.</p>
                </div>
                <div>
                    <label for="student_level" class="block text-lg font-medium text-gray-700">Tingkat Pendidikan</label>
                    <select id="student_level" name="student_level" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                        <option value="S3">S3</option>
                        <option value="S2">S2</option>
                        <option value="S1">S1</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="SMP">SMP</option>
                        <option value="SD">SD</option>
                        <option value="TK">TK</option>
                    </select>
                </div>
                <div>
                    <label for="jurusan" class="block text-lg font-medium text-gray-700">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" maxlength="100" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                    <p class="text-sm italic text-gray-500 mt-1">Masukkan jurusan, jika SMA/SMK isi jurusan yang sesuai, jika SD atau SMP isi SD atau SMP.</p>
                </div>
                <div>
                    <label for="mata_pelajaran" class="block text-lg font-medium text-gray-700">Mata Pelajaran</label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran" maxlength="25" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                    <p class="text-sm italic text-gray-500 mt-1">Pilih Mata Pelajaran apa yang ingin diajarkan.</p>
                </div>
                <div>
                    <label for="hari" class="block text-lg font-medium text-gray-700">Hari</label>
                    <div class="mt-2 grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="senin" name="hari[]" value="Senin" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="senin" class="ml-2 block text-lg text-gray-900">Senin</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="selasa" name="hari[]" value="Selasa" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="selasa" class="ml-2 block text-lg text-gray-900">Selasa</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="rabu" name="hari[]" value="Rabu" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="rabu" class="ml-2 block text-lg text-gray-900">Rabu</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="kamis" name="hari[]" value="Kamis" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="kamis" class="ml-2 block text-lg text-gray-900">Kamis</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="jumat" name="hari[]" value="Jumat" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="jumat" class="ml-2 block text-lg text-gray-900">Jumat</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="sabtu" name="hari[]" value="Sabtu" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="sabtu" class="ml-2 block text-lg text-gray-900">Sabtu</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="minggu" name="hari[]" value="Minggu" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="minggu" class="ml-2 block text-lg text-gray-900">Minggu</label>
                        </div>
                    </div>
                    <p class="text-sm italic text-gray-500 mt-1">Pilih hari untuk diajar (Bisa lebih dari satu hari).</p>
                </div>
                <div>
                    <label for="jam" class="block text-lg font-medium text-gray-700">Jam</label>
                    <input type="text" id="jam" name="jam" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                    <p class="text-sm italic text-gray-500 mt-1">Masukkan dengan format cth. 10:00 - 12:30 atau 20:00 - 22:00, WIB, WITA, atau WIT</p>
                </div>
                <div>
                    <label for="fee" class="block text-lg font-medium text-gray-700">Fee</label>
                    <input type="text" id="fee" name="fee" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                    <p class="text-sm italic text-gray-500 mt-1">Masukkan nominal tagihan dengan contoh format Rp 1.000.000,00 per bulan.</p>
                </div>
                <div class="md:col-span-2">
                    <label for="additional_notes" class="block text-lg font-medium text-gray-700">Catatan Tambahan</label>
                    <input type="text" id="additional_notes" name="additional_notes" maxlength="250" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4">
                    <p class="text-sm italic text-gray-500 mt-1">Masukkan Keterangan Tambahan.</p>
                </div>
                <div class="md:col-span-2">
                    <label for="cover_image" class="block text-lg font-medium text-gray-700">Cover Image</label>
                    <input type="file" id="cover_image" name="cover_image" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4">
                    <p class="text-sm italic text-gray-500 mt-1">Masukkan Gambar jika perlu.</p>
                </div>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-bold">Kirim</button>
                <a href="dashboard-parents" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const closeButton = document.getElementById('close-button');
        const errorMessage = document.getElementById('error-message');

        if (closeButton) {
            closeButton.addEventListener('click', () => {
                errorMessage.style.display = 'none';
            });
        }
    });
</script>


@endsection
