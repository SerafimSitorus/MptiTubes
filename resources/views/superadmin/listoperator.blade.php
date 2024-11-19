@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Operator List')

@section('content')

    <div class="my-4 w-full mr-10 lg:mr-20 overflow-auto">
        <div class="flex justify-between md:items-end flex-col md:flex-row">
            <div>
                <h1 class="text-xl lg:text-3xl font-bold">Manajemen Operator</h1>
                <p class="text-sm lg:text-base">Kamu dapat mengatur operator setiap provinsi dihalaman ini</p>
                <h2 class="mt-6 text-lg lg:text-xl font-semibold">Daftar Operator</h2>
            </div>
        </div>
        {{-- <div class="overflow-x-auto mt-6">
            <table class="min-w-full  border border-gray-200">
                <thead class="bg-blue-800">
                    <tr>
                        <th class="text-white text-left px-3 lg:px-10 py-1 lg:py-3">Nama</th>
                        <th class="text-white text-left px-3 lg:px-10 py-1 lg:py-3">Criteria Submit</th>
                        <th class="text-white text-left px-3 lg:px-10 py-1 lg:py-3">Tanggal dibuat</th>
                        <th class="text-white text-left px-3 lg:px-10 py-1 lg:py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($criteria as $data)    
                  <tr class="border border-yellow-500">
                      <td class="px-3 py-1 lg:px-10 lg:py-3 text-left">{{ $data->parent_name }}</td>
                      <td class="px-3 py-1 lg:px-10 lg:py-3 text-left"><a href="{{ route('tutor_criteria_detail', ['id_lowongan' => $data->id]) }}" class="underline text-blue-700">See details</a></td>
                      <td class="px-3 py-1 lg:px-10 lg:py-3 text-left">{{ $data->created_at }}</td>
                      <td class="px-3 py-1 lg:px-10 lg:py-3 text-left">
                          <div class="flex items-center gap-2">
                              @if ($data->status == 'Disetujui')
                                  <div class="py-1 px-7 bg-green-600 text-white rounded-md">Diterima</div>
                              @elseif($data->status == 'Ditolak')
                                  <div class="py-1 px-7 bg-red-600 text-white rounded-md ">Ditolak</div>
                              @else
                              <a href="{{ route('tutor_criteria_inbox_terima', ['id_lowongan' => $data->id]) }}" class="py-1 px-3 bg-green-500 text-white rounded-md hover:bg-green-700">Terima</a>
                              <a href="{{ route('tutor_criteria_inbox_tolak', ['id_lowongan' => $data->id]) }}" class="py-1 px-3 bg-red-500 border text-white rounded-md hover:bg-red-700">Tolak</a>
                              @endif
      
                          </div>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div> --}}
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full  border border-gray-200">
                <thead class="bg-blue-800">
                    <tr class="rounded-md">
                        <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">NIK</th>
                        <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Nama Operator</th>
                        <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Jenis Kelamin</th>
                        <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Provinsi Naungan</th>
                        <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Status</th>
                        <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($operator as $item)
                        <tr class="border border-yellow-500">
                            <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->nik }}</td>
                            <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->nama_operator }}</td>
                            <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">
                                @if ($item->jenis_kelamin == 'L')
                                    Laki-Laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                            <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->provinsi_naungan }}</td>
                            <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">{{ $item->status }}</td>
                            <td class="lg:px-10 px-3 py-1 lg:py-3 text-left">
                                <a href="{{ route('superadmin/operator/detail', ['id' => $item->nik]) }}" class="underline text-blue-700">Detail</a> |
                                <a href="{{ route('superadmin/operator/edit', ['id' => $item->nik]) }}" class="underline text-green-700">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
        <div class="flex justify-between flex-col md:flex-row gap-3 md:items-center mt-6">
            <div>
                <label for="role">Rows per page</label>
                <select class="py-2 px-3 bg-yellow-100 rounded-md text-black" name="role" id="role">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="flex gap-2 flex-row items-center">
                <span class="py-2 px-4 bg-yellow-100 rounded-md text-black">
                    < </span>
                        <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> 1 </span>
                        <span>/ 1</span>
                        <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> > </span>
            </div>
        </div>
    </div>
@endsection
