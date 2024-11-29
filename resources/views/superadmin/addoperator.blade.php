@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Add Operator')

@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const nikInput = document.getElementById('nik');

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        const nikRegex = /^\d{16}$/;

        emailInput.addEventListener('input', function () {
            validateInput(emailInput, emailRegex, "Mohon masukkan email yang valid", "Email valid");
        });

        passwordInput.addEventListener('input', function () {
            validateInput(passwordInput, passwordRegex, "Password harus mengandung min. 8 karakter dengan kombinasi huruf besar, huruf kecil, dan angka", "Password cukup kuat");
        });

        nikInput.addEventListener('input', function () {
            validateInput(nikInput, nikRegex, "NIK harus terdiri dari 16 angka", "NIK valid");
        });

        function validateInput(inputElement, regex = null, errorMessage = "Invalid input", validMessage = "Input is valid") {
            const value = inputElement.value.trim();
            const isValid = !regex || regex.test(value);

            if (isValid) {
                inputElement.classList.remove('border-red-500');
                inputElement.classList.add('border-green-500');
                removeErrorLabel(inputElement);
                const validMessageElement = inputElement.parentElement.querySelector('.valid-message');
                if (validMessageElement) {
                    validMessageElement.textContent = validMessage;
                } else {
                    const newValidMessage = document.createElement('small');
                    newValidMessage.textContent = validMessage;
                    newValidMessage.classList.add('text-green-500', 'valid-message');
                    inputElement.parentElement.appendChild(newValidMessage);
                }
                inputElement.setCustomValidity('');
            } else {
                inputElement.classList.remove('border-green-500');
                inputElement.classList.add('border-red-500');
                showErrorLabel(inputElement, errorMessage);
                inputElement.setCustomValidity(errorMessage);
                const validMessageElement = inputElement.parentElement.querySelector('.valid-message');
                if (validMessageElement) {
                    inputElement.parentElement.removeChild(validMessageElement);
                }
            }
        }

        function showErrorLabel(inputElement, message) {
            const errorLabel = inputElement.parentElement.querySelector('.error-label');
            if (errorLabel) {
                errorLabel.textContent = message;
            } else {
                const newErrorLabel = document.createElement('small');
                newErrorLabel.textContent = message;
                newErrorLabel.classList.add('text-red-500', 'error-label');
                inputElement.parentElement.appendChild(newErrorLabel);
            }
        }

        function removeErrorLabel(inputElement) {
            const errorLabel = inputElement.parentElement.querySelector('.error-label');
            if (errorLabel) {
                inputElement.parentElement.removeChild(errorLabel);
            }
        }
    });
</script>

<div class="my-6 w-full px-6 lg:px-20">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl lg:text-4xl font-bold text-gray-800">Tambah Operator</h1>
            <p class="text-sm lg:text-base text-gray-600">Isi formulir di bawah ini untuk menambahkan operator baru.</p>
        </div>
    </div>
    <div class="bg-white shadow-md rounded-lg p-8">
        <form action="{{ route('superadmin/operator/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-gray-700 font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Masukkan username" required>
                    @error('username')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" id="email" name="email" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="contoh@email.com" required>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Masukkan password" required>
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- NIK -->
                <div>
                    <label for="nik" class="block text-gray-700 font-semibold">NIK</label>
                    <input type="text" id="nik" name="nik" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Masukkan NIK (16 digit)" required>
                    @error('nik')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Operator -->
                <div>
                    <label for="nama_operator" class="block text-gray-700 font-semibold">Nama Operator</label>
                    <input type="text" id="nama_operator" name="nama_operator" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Masukkan nama operator" required>
                    @error('nama_operator')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label for="jenis_kelamin" class="block text-gray-700 font-semibold">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" required>
                        <option value="L">Pria</option>
                        <option value="P">Wanita</option>
                    </select>
                </div>

                <!-- Tempat Lahir -->
                <div>
                    <label for="tempat_lahir" class="block text-gray-700 font-semibold">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Masukkan tempat lahir" required>
                    @error('tempat_lahir')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="alamat_domisili" class="block text-gray-700 font-semibold">Alamat Domisili</label>
                    <input type="text" id="alamat_domisili" name="alamat_domisili" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Masukkan tempat lahir" required>
                    @error('alamat_domisili')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label for="tanggal_lahir" class="block text-gray-700 font-semibold">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" required>
                    @error('tanggal_lahir')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Provinsi Naungan -->
                <div>
                    <label for="provinsi_naungan" class="block text-gray-700 font-semibold">Provinsi Naungan</label>
                    <select id="provinsi_naungan" name="provinsi_naungan" class="mt-2 block w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" required>
                        @foreach ($provinsilist as $provinsi)
                        <option value="{{ $provinsi }}">{{ $provinsi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Tombol -->
            <div class="sm:col-span-2 flex justify-end gap-4 mt-6">
                <a type="button" href="{{ route('superadmin/dashboard') }}" class="py-2 px-6 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600"> Batal </a>
                <button type="submit" class="py-2 px-6 rounded-md bg-blue-700 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600"> Tambah </button>
            </div>
        </form>
    </div>
</div>
@endsection
