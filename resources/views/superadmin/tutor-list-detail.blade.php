@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Tutor List')

@section('content')

    <div class="my-4 w-full mr-10 md:mr-20 overflow-auto">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-xl lg:text-3xl font-bold">Manajemen Tutor</h1>
                <p class="text-sm lg:text-base">Kamu dapat melihat info detail mengenai tutor pada halaman ini</p>

                <h2 class="mt-6 text-lg lg:text-xl font-semibold">Detail Tutor</h2>
            </div>
        </div>

        <div class="flex flex-col gap-3 mt-3">
            <div class="flex justify-between items-center">
                <p>NIK</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block"
                        value="{{ $tutor->nik }}"></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Nama Tutor</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->nama_tutor }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Jenis Kelamin</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text"
                        value="@if ($tutor->jenis_kelamin == 'L')Laki-Laki
                    @else
Perempuan @endif"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Tempat Lahir</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->tempat_lahir }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Tanggal Lahir</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->tanggal_lahir }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>No Hp</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->no_hp }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Provinsi</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->provinsi_naungan }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Alamat</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->alamat_domisili }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Universitas/Sekolah</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->universitas_sekolah }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Jenjang Pendidikan</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->jenjang_pendidikan }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Jurusan</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->jurusan }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block" ></input>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p>Status</p>
                <div class="flex items-center gap-2">
                    <span> : </span>
                    <input type="text" value="{{ $tutor->status }}"
                        class="text-black py-1 px-4 rounded-md border border-yellow-500 w-40 md:w-56 lg:w-[440px] block"></input>
                </div>
            </div>
        </div>
        <h2 class="my-6 text-xl font-semibold">Jadwal Tutor</h2>
        <div class="mt-4 w-full mx-auto">
            <div class="bg-white border border-[#555555] rounded-lg overflow-hidden">
                <div class="grid grid-cols-7 gap-2 p-4" id="calendar">
                    @foreach ($schedules as $schedule)
                        <div class="border p-2">
                            <p class="text-center">{{ $schedule->title }}</p>
                            <p>{{ \Carbon\Carbon::parse($schedule->start_date)->format('d M h:m') }} - {{ \Carbon\Carbon::parse($schedule->end_date)->format('d M h:m') }}</p>
                        </div>
                    @endforeach
                </div>
                <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
                    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>

                    <div class="modal-container bg-white w-11/12 mdmax-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Selected Date</p>
                                <button id="closeModal"
                                    class="modal-close px-3 py-1 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring">✕</button>
                            </div>
                            <div id="modalDate" class="text-xl font-semibold"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('superadmin/tutor') }}"
                class="border border-blue-700 rounded-md text-blue font-semibold py-2 px-4 mt-4">Kembali</a>
        </div>
    </div>

@endsection
