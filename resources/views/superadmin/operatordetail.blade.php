@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Operator Detail')

@section('content')

<div class="my-4 w-full px-4 lg:px-20">
    <div class="flex justify-between items-end mb-4">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">Detail Operator</h1>
            <p class="text-sm lg:text-base">Kamu dapat melihat detail operator disini</p>
        </div>
    </div>
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{route('superadmin/operator/update', ['id'=>$operator->nik])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <!-- Username -->
                <div class="form-group">
                    <label for="user_id" class="label" style="color: black;">User ID</label>
                    <input type="text" id="user_id" name="user_id" class="input-field" style="color:black;" value="{{ $operator->user_id}}" readonly>
                </div>

                <!-- Email 
                <div class="form-group">
                    <label for="email" class="label">Email</label>
                    <input type="email" id="email" name="email" class="input-field" value="{{$operator->email}}" required>
                </div>
            -->
                <!-- Password 
                <div class="form-group">
                    <label for="password" class="label">Password</label>
                    <input type="password" id="password" name="password" class="input-field" value="" required>
                </div>
            -->
                <!-- NIK -->
                <div class="form-group">
                    <label for="nik" class="label" style="color: black;">Nomor Induk Kependudukan</label>
                    <input type="text" id="nik" name="nik" class="input-field" style="color:black;" value="{{$operator->nik}}" readonly>
                </div>

                <!-- Operator Name -->
                <div class="form-group">
                    <label for="nama_operator" class="label" style="color: black;">Nama Operator</label>
                    <input type="text" id="nama_operator" name="nama_operator" class="input-field" style="color:black;" value="{{$operator->nama_operator}}" readonly>
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-group">
                    <label for="jenis_kelamin" class="label" style="color: black;">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="input-field" style="color:black;" disabled>
                        <option value="L" {{ $operator->jenis_kelamin == 'L' ? 'selected' : '' }}>Pria</option>
                        <option value="P" {{ $operator->jenis_kelamin == 'P' ? 'selected' : '' }}>Wanita</option>
                    </select>
                     <!-- Elemen input tersembunyi untuk menyimpan nilai -->
                     <input type="hidden" name="jenis_kelamin" value="{{ $operator->jenis_kelamin }}">
                </div>

                <!-- Tempat Lahir -->
                <div class="form-group">
                    <label for="tempat_lahir" class="label" style="color: black;">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="input-field" style="color:black;" value="{{$operator->tempat_lahir}}" readonly>
                </div>

                <!-- Tanggal Lahir -->
                <div class="form-group">
                    <label for="tanggal_lahir" class="label" style="color: black;">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="input-field" style="color:black;" value="{{$operator->tanggal_lahir}}" placeholder="yyyy-mm-dd" readonly>
                </div>

                <!-- Province -->
                <div class="form-group">
                    <label for="provinsi_naungan" class="label" style="color: black;">Provinsi Naungan</label>
                    <select id="provinsi_naungan" name="provinsi_naungan" class="input-field" style="color:black;" disabled>
                        <option value="Nanggroe Aceh Darussalam" {{ $operator->provinsi_naungan == 'Nanggroe Aceh Darussalam' ? 'selected' : '' }}>Nanggroe Aceh Darussalam</option>
                        <option value="Sumatera Utara" {{ $operator->provinsi_naungan == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                        <option value="Sumatera Selatan" {{ $operator->provinsi_naungan == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                        <option value="Sumatera Barat" {{ $operator->provinsi_naungan == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                        <option value="Bengkulu" {{ $operator->provinsi_naungan == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                        <option value="Riau" {{ $operator->provinsi_naungan == 'Riau' ? 'selected' : '' }}>Riau</option>
                        <option value="Kepulauan Riau" {{ $operator->provinsi_naungan == 'Kepulauan Riau' ? 'selected' : '' }}>Kepulauan Riau</option>
                        <option value="Jambi" {{ $operator->provinsi_naungan == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                        <option value="Lampung" {{ $operator->provinsi_naungan == 'Lampung' ? 'selected' : '' }}>Lampung</option>
                        <option value="Bangka Belitung" {{ $operator->provinsi_naungan == 'Bangka Belitung' ? 'selected' : '' }}>Bangka Belitung</option>
                        <option value="Kalimantan Barat" {{ $operator->provinsi_naungan == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                        <option value="Kalimantan Timur" {{ $operator->provinsi_naungan == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                        <option value="Kalimantan Selatan" {{ $operator->provinsi_naungan == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                        <option value="Kalimantan Tengah" {{ $operator->provinsi_naungan == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                        <option value="Kalimantan Utara" {{ $operator->provinsi_naungan == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                        <option value="Banten" {{ $operator->provinsi_naungan == 'Banten' ? 'selected' : '' }}>Banten</option>
                        <option value="DKI Jakarta" {{ $operator->provinsi_naungan == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                        <option value="Jawa Barat" {{ $operator->provinsi_naungan == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                        <option value="Jawa Tengah" {{ $operator->provinsi_naungan == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                        <option value="Jawa Timur" {{ $operator->provinsi_naungan == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                        <option value="Daerah Istimewa Yogyakarta" {{ $operator->provinsi_naungan == 'Daerah Istimewa Yogyakarta' ? 'selected' : '' }}>Daerah Istimewa Yogyakarta</option>
                        <option value="Bali" {{ $operator->provinsi_naungan == 'Bali' ? 'selected' : '' }}>Bali</option>
                        <option value="Nusa Tenggara Timur" {{ $operator->provinsi_naungan == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                        <option value="Nusa Tenggara Barat" {{ $operator->provinsi_naungan == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                        <option value="Gorontalo" {{ $operator->provinsi_naungan == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                        <option value="Sulawesi Barat" {{ $operator->provinsi_naungan == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                        <option value="Sulawesi Tengah" {{ $operator->provinsi_naungan == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                        <option value="Sulawesi Utara" {{ $operator->provinsi_naungan == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                        <option value="Sulawesi Tenggara" {{ $operator->provinsi_naungan == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                        <option value="Sulawesi Selatan" {{ $operator->provinsi_naungan == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                        <option value="Maluku Utara" {{ $operator->provinsi_naungan == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                        <option value="Maluku" {{ $operator->provinsi_naungan == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                        <option value="Papua Barat" {{ $operator->provinsi_naungan == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                        <option value="Papua" {{ $operator->provinsi_naungan == 'Papua' ? 'selected' : '' }}>Papua</option>
                        <option value="Papua Tengah" {{ $operator->provinsi_naungan == 'Papua Tengah' ? 'selected' : '' }}>Papua Tengah</option>
                        <option value="Papua Pegunungan" {{ $operator->provinsi_naungan == 'Papua Pegunungan' ? 'selected' : '' }}>Papua Pegunungan</option>
                        <option value="Papua Selatan" {{ $operator->provinsi_naungan == 'Papua Selatan' ? 'selected' : '' }}>Papua Selatan</option>
                        <option value="Papua Barat Daya" {{ $operator->provinsi_naungan == 'Papua Barat Daya' ? 'selected' : '' }}>Papua Barat Daya</option>
                    </select>
                    <!-- Elemen input tersembunyi untuk menyimpan nilai -->
                    <input type="hidden" name="provinsi_naungan" value="{{ $operator->provinsi_naungan }}">
                </div>

                <!-- Alamat Domisili -->
                <div class="form-group">
                    <label for="alamat_domisili" class="label" style="color: black;">Alamat Domisili</label>
                    <input type="text" id="alamat_domisili" name="alamat_domisili" class="input-field" style="color:black;" value="{{ $operator->alamat_domisili}}" readonly>
                </div>

                <!-- Jenjang Pendidikan -->
                <div class="form-group">
                    <label for="jenjang_pendidikan" class="label" style="color: black;">Jenjang Pendidikan</label>
                    <select id="jenjang_pendidikan" name="jenjang_pendidikan" class="input-field" style="color:black;" readonly>
                        <option value="S3" {{ $operator->jenjang_pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                        <option value="S2" {{ $operator->jenjang_pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                        <option value="S1" {{ $operator->jenjang_pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                        <option value="SMA" {{ $operator->jenjang_pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="SMK" {{ $operator->jenjang_pendidikan == 'SMK' ? 'selected' : '' }}>SMK</option>
                    </select>
                </div>

                <!-- Jurusan -->
                <div class="form-group">
                    <label for="jurusan" class="label" style="color: black;">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" class="input-field" style="color:black;" value="{{$operator->jurusan}}" readonly>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status" class="label" style="color: black;">Status</label>
                    <select id="status" name="status" class="input-field" style="color:black;" readonly>
                        <option value="Aktif" {{ $operator->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ $operator->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif'</option>
                        <option value="Diberhentikan" {{ $operator->status == 'Diberhentikan' ? 'selected' : '' }}>Diberhentikan</option>
                    </select>
                </div>

                <!-- Image 
                <div class="form-group">
                    <label for="image" class="label">Image</label>
                    <input type="file" id="image" name="image" class="input-field">
                    @if($operator->image)
                        <img src="{{ asset('path/to/images/'.$operator->image) }}" alt="Operator Image" class="mt-2 w-32 h-32 object-cover">
                    @endif
                </div> -->
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('superadmin/operator') }}" class="py-2 px-4 rounded-md border border-blue-700 hover:bg-slate-400 text-black">Back</a>

                <!-- <button type="button" class="py-2 px-4 rounded-md border border-blue-700 hover:bg-slate-400 text-black">Back</button> -->
               
            </div>
        </form>
    </div>
</div>

@endsection
