    @extends('parents.layout.main-parent')

    @section('title', 'Edit Profile') 

    @section('content')

    <div class="flex flex-col p-4">
            <div class="mb-8 text-center">
                <h1 class="text-xl lg:text-3xl font-bold">Edit Profil</h1>
                <p class="text-sm lg:text-base">Perbaharui Profil anda</p>
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
                <form action="parentsinsertedit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="flex flex-col items-center mb-8">
                        <div class="relative w-[212px] h-[212px] rounded-full overflow-hidden">
                            <img id="previewImage" src="{{ $parents->image ? asset($parents->image) : asset('images/profiluser.jpg') }}" alt="Profile Picture" class="w-full h-full object-cover">
                            <label for="file-upload" class="absolute inset-0 flex items-center justify-center bg-gray-400 bg-opacity-50 hover:bg-opacity-75 cursor-pointer">
                                <input id="file-upload" name="image" type="file" class="sr-only" onchange="previewFile()">
                                <img src="{{asset('images/camera.png')}}" alt="camera" class="w-1/3 h-1/3 object-cover">
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label for="nik" class="block text-lg font-medium text-gray-700">Nomor Induk Kependudukan</label>
                            <input type="text" id="nik" name="nik" maxlength="16" value="{{ old('nik', $parents->nik) }}" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                        </div>
                        <div>
                            <label for="nama_parents" class="block text-lg font-medium text-gray-700">Nama Orang Tua</label>
                            <input type="text" id="nama_parents" name="nama_parents" maxlength="150" value="{{ old('nama_parents', $parents->nama_parents) }}" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block text-lg font-medium text-gray-700">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                                <option value="L" {{ old('jenis_kelamin', $parents->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('jenis_kelamin', $parents->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="tempat_lahir" class="block text-lg font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" maxlength="100" value="{{ old('tempat_lahir', $parents->tempat_lahir) }}"  class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-lg font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $parents->tanggal_lahir) }}" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                        </div>
                        <div>
                            <label for="no_hp" class="block text-lg font-medium text-gray-700">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp" maxlength="14" value="{{ old('no_hp', $parents->no_hp) }}" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                        </div>
                        <div>
                            <label for="provinsi" class="block text-lg font-medium text-gray-700">Provinsi</label>
                            <select id="provinsi" name="provinsi" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                                @foreach ($provinsiList as $provinsi)
                                    <option value="{{ $provinsi }}" {{ old('provinsi', $parents->provinsi) == $provinsi ? 'selected' : '' }}>{{ $provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label for="alamat_domisili" class="block text-lg font-medium text-gray-700">Alamat Domisili</label>
                            <input type="text" id="alamat_domisili" name="alamat_domisili" maxlength="250" value="{{ old('alamat_domisili', $parents->alamat_domisili) }}" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-2" required>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center space-x-4">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-bold">Submit</button>
                        <a href="parentsprofile" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Kembali</a>
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
        
