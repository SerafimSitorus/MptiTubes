@extends('tutor.layout.maintutor')

@section('title','Tutor - Profil')

@section('content')

<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-xl lg:text-3xl font-bold">Edit Profil</h1>
        <p class="text-sm lg:text-base">Perbaharui Profil Anda</p>
    </div>
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-lg shadow-lg">
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
        <form action="tutor-insertedit-profil" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="flex flex-col items-center mb-8">
                <div class="relative w-[212px] h-[212px] rounded-full overflow-hidden">
                    <img id="previewImage"
                        src="{{ $tutors->image ? asset($tutors->image) : asset('images/profiluser.jpg') }}"
                        alt="Profile Picture" class="w-full h-full object-cover">
                    <label for="file-upload"
                        class="absolute inset-0 flex items-center justify-center bg-gray-400 bg-opacity-50 hover:bg-opacity-75 cursor-pointer">
                        <input id="file-upload" name="image" type="file" class="sr-only" onchange="previewFile()">
                        <img src="{{asset('images/camera.png')}}" alt="camera" class="w-1/3 h-1/3 object-cover">
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="nik" class="block text-lg font-medium text-gray-700">Nomor Induk Kependudukan</label>
                    <input type="text" id="nik" name="nik" maxlength="16" value="{{ old('nik', $tutors->nik) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div>
                    <label for="nama_tutor" class="block text-lg font-medium text-gray-700">Nama:</label>
                    <input type="text" id="nama_tutor" name="nama_tutor" maxlength="150"
                        value="{{ old('nama_tutor', $tutors->nama_tutor) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div>
                    <label for="jenis_kelamin" class="block text-lg font-medium text-gray-700">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                        <option value="L" {{ old('jenis_kelamin', $tutors->jenis_kelamin) == 'L' ? 'selected' : ''
                            }}>Laki-Laki</option>
                        <option value="P" {{ old('jenis_kelamin', $tutors->jenis_kelamin) == 'P' ? 'selected' : ''
                            }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="tempat_lahir" class="block text-lg font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" maxlength="100"
                        value="{{ old('tempat_lahir', $tutors->tempat_lahir) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-lg font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $tutors->tanggal_lahir) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div>
                    <label for="no_hp" class="block text-lg font-medium text-gray-700">No. HP</label>
                    <input type="text" id="no_hp" name="no_hp" maxlength="14" value="{{ old('no_hp', $tutors->no_hp) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div>
                    <label for="provinsi_naungan"
                        class="block text-lg font-medium text-gray-700">Provinsi_naungan</label>
                    <select id="provinsi_naungan" name="provinsi_naungan"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                        @foreach ($provinsiList as $provinsi)
                        <option value="{{ $provinsi }}" {{ old('provinsi_naungan', $tutors->provinsi_naungan) ==
                            $provinsi ?
                            'selected'
                            : '' }}>{{ $provinsi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="alamat_domisili" class="block text-lg font-medium text-gray-700">Alamat Domisili</label>
                    <input type="text" id="alamat_domisili" name="alamat_domisili" maxlength="250"
                        value="{{ old('alamat_domisili', $tutors->alamat_domisili) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div>
                    <label for="jenjang_pendidikan" class="block text-lg font-medium text-gray-700">Jenjang
                        Pendidikan</label>
                    <select id="jenjang_pendidikan" name="jenjang_pendidikan"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4"
                        required>
                        @foreach (['S3', 'S2', 'S1', 'SMA', 'SMK'] as $jenjang)
                        <option value="{{ $jenjang }}" {{ old('jenjang_pendidikan', $tutors->jenjang_pendidikan) ==
                            $jenjang ? 'selected' : '' }}>
                            {{ $jenjang }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="md:col-span-2">
                    <label for="universitasorsekolah"
                        class="block text-lg font-medium text-gray-700">Universitas/Sekolah</label>
                    <input type="text" id="universitasorsekolah" name="universitasorsekolah" maxlength="250"
                        value="{{ old('universitasorsekolah', $tutors->universitasorsekolah) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div class="md:col-span-2">
                    <label for="jurusan" class="block text-lg font-medium text-gray-700">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" maxlength="250"
                        value="{{ old('jurusan', $tutors->jurusan) }}"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2"
                        required>
                </div>
                <div><label for="status" class="block text-lg font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4"
                        required>
                        @foreach (['Aktif', 'Tidak Aktif', 'Diberhentikan'] as $status)
                        <option value="{{ $status }}" {{ old('status', $tutors->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="col-span-1 lg:col-span-2">
                    <label for="cv" class="block text-sm font-medium leading-6">Curriculum Vitae</label>
                    <div class="mt-2">
                        <input type="file" name="cv" id="cv" autocomplete="cv"
                            class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-bold">Submit</button>
                <a href="javascript:history.back()"
                    class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script>
    function previewFile() {
        const preview = document.getElementById('previewImage');
        const fileInput = document.getElementById('file-upload').files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (fileInput) {
            reader.readAsDataURL(fileInput);
        } else {
            preview.src = "{{ asset('images/profiluser.jpg') }}";
        }
    }

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