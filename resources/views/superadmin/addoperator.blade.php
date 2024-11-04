@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Add Operator')

@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const nikInput = document.getElementById('nik');

  
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    const nikRegex = /^\d{16}$/;

    
    emailInput.addEventListener('input', function() {
        validateInput(emailInput, emailRegex, "Mohon masukkan email yang valid", "Email valid");
    });
  
    passwordInput.addEventListener('input', function() {
        validateInput(passwordInput, passwordRegex, "Password harus mengandung min. 8 karakter dengan kombinasi huruf besar, huruf kecil, dan angka", "Password cukup kuat");
    });
  
    nikInput.addEventListener('input', function() {
        validateInput(nikInput, nikRegex, "NIK harus terdiri dari 16 angka", "NIK valid");
    });
  
    function validateInput(inputElement, regex = null, errorMessage = "Invalid input", validMessage = "Input is valid") {
        const value = inputElement.value.trim();
        const isValid = !regex || regex.test(value);
  
        if (isValid) {
            inputElement.classList.remove('border-red-500');
            inputElement.classList.add('border-green-500');
            removeErrorLabel(inputElement);
            // Tambahkan pesan validasi khusus
            const validMessageElement = inputElement.parentElement.querySelector('.valid-message');
            if (validMessageElement) {
                validMessageElement.textContent = validMessage;
            } else {
                const newValidMessage = document.createElement('small');
                newValidMessage.textContent = validMessage;
                newValidMessage.classList.add('text-green-500', 'valid-message');
                inputElement.parentElement.appendChild(newValidMessage);
            }
            // Menghilangkan pesan kesalahan kustom jika ada
            inputElement.setCustomValidity('');
        } else {
            inputElement.classList.remove('border-green-500');
            inputElement.classList.add('border-red-500');
            showErrorLabel(inputElement, errorMessage);
            // Mengatur pesan kesalahan kustom
            inputElement.setCustomValidity(errorMessage);
            // Menghapus pesan validasi jika ada
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
    <div class="my-4 w-full px-4 lg:px-20">
        <div class="flex justify-between items-end mb-4">
            <div>
                <h1 class="text-xl lg:text-3xl font-bold">Tambah Operator</h1>
                <p class="text-sm lg:text-base">Kamu dapat menambahkan operator pada halaman ini</p>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('superadmin/operator/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username" class="label">Username</label>
                        <input type="text" id="username" name="username" class="input-field" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="label">Email</label>
                        <input type="email" id="email" name="email" class="input-field" required>
                        <span id="email-error" class="text-red-500 text-sm"></span>
                        <!--
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        -->
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="label">Password</label>
                        <input type="password" id="password" name="password" class="input-field" required>
                        <span id="password-error" class="text-red-500 text-sm"></span>
                        <!--
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        -->
                    </div>

                    <!-- NIK -->
                    <div class="form-group">
                        <label for="nik" class="label">Nomor Induk Kependudukan</label>
                        <input type="text" id="nik" name="nik" class="input-field" required>
                        <span id="nik-error" class="text-red-500 text-sm"></span>
                        <!--
                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        -->
                    </div>

                    <!-- Operator Name -->
                    <div class="form-group">
                        <label for="nama_operator" class="label">Nama Operator</label>
                        <input type="text" id="nama_operator" name="nama_operator" class="input-field" required>
                        @error('nama_operator')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label for="jenis_kelamin" class="label">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="input-field" required>
                            <option value="L">Pria</option>
                            <option value="P">Wanita</option>
                        </select>
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="form-group">
                        <label for="tempat_lahir" class="label">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="input-field" required>
                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group">
                        <label for="tanggal_lahir" class="label">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="input-field"
                            placeholder="yyyy-mm-dd" required>
                            @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Province -->
                    <div class="form-group">
                        <label for="provinsi" class="label">Provinsi Naungan</label>
                        <select id="provinsi" name="provinsi" class="input-field" required>
                            <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Riau">Riau</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Bangka Belitung">Bangka Belitung</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Banten">Banten</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                            <option value="Bali">Bali</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Tengah">Papua Tengah</option>
                            <option value="Papua Pegunungan">Papua Pegunungan</option>
                            <option value="Papua Selatan">Papua Selatan</option>
                            <option value="Papua Barat Daya">Papua Barat Daya</option>
                        </select>
                    </div>

                    <!-- Alamat Domisili -->
                    <div class="form-group">
                        <label for="alamat_domisili" class="label">Alamat Domisili</label>
                        <input type="text" id="alamat_domisili" name="alamat_domisili" class="input-field" required>
                        @error('alamat_domisili')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Jenjang Pendidikan -->
                    <div class="form-group">
                        <label for="jenjang_pendidikan" class="label">Jenjang Pendidikan</label>
                        <select id="jenjang_pendidikan" name="jenjang_pendidikan" class="input-field" required>
                            <option value="S3">S3</option>
                            <option value="S2">S2</option>
                            <option value="S1">S1</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                        </select>
                    </div>

                    <!-- Jurusan -->
                    <div class="form-group">
                        <label for="jurusan" class="label">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" class="input-field" required>
                        @error('jurusan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="label">Status</label>
                        <select id="status" name="status" class="input-field" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif'</option>
                            <option value="Diberhentikan">Diberhentikan</option>
                        </select>
                    </div>
                    <!-- Image -->
                    <div class="form-group">
                        <label for="image" class="label">Gambar</label>
                        <input type="file" id="image" name="image" class="input-field" required>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button"
                        class="py-2 px-4 rounded-md border border-blue-700 hover:bg-slate-400">Batal</button>
                    <button type="submit"
                        class="py-2 px-4 rounded-md bg-blue-700 text-white hover:bg-blue-600">Tambah</button>
                </div>
            </form>
        </div>
    </div>

 

@endsection

