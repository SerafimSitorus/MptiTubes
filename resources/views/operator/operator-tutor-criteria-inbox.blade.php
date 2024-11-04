@extends('operator.layout.main-operator')

@section('title', 'Operator - Tutor Criteria Inbox') 

@section('content')
@if (session('success_terima'))
<div id="alertMessage" class="bg-green-100 rounded-md p-3 flex absolute">
    <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
        viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2 4-4" />
    </svg>

    <div class="text-green-700">
        <div class="font-bold text-xl">Perubahan Berhasil Tersimpan!</div>
        <div>{{ session('success_terima') }}</div>
    </div>
</div>
@endif
@if (session('success_tolak'))
<div id="alertMessage" class="bg-green-100 rounded-md p-3 flex absolute">
    <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
        viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2 4-4" />
    </svg>

    <div class="text-green-700">
        <div class="font-bold text-xl">Perubahan Berhasil Tersimpan!</div>
        <div>{{ session('success_tolak') }}</div>
    </div>
</div>
@endif
<div class="my-4 w-full px-4 lg:px-20 overflow-auto">
  <div class="flex justify-between md:items-end flex-col md:flex-row">
      <div>
          <h1 class="text-xl lg:text-3xl font-bold">Tutor Management</h1>
          <p class="text-sm lg:text-base">You can manage all section related to private tutor here</p>
          <h2 class="mt-6 text-lg lg:text-xl font-semibold">Tutor Criteria Inbox</h2>
      </div>
      <h1 class="mt-6 text-lg lg:text-xl font-semibold">{{ $operator->provinsi_naungan }}</h1>
  </div>
  <div class="overflow-x-auto mt-6">
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
  </div>
  <div class="flex justify-between flex-col md:flex-row gap-3 md:items-center mt-6">
      <div>
          <label for="role">Rows per page</label>
          <select class="py-2 px-3 bg-yellow-100 text-black rounded-md" name="role" id="role">
              <option value="1">1</option>
          </select>
      </div>
      <div class="flex gap-2 flex-row items-center">
          <button class="py-2 px-4 bg-yellow-100 rounded-md text-black">&lt;</button>
          <span class="py-2 px-4 bg-yellow-100 rounded-md text-black">1</span>
          <span>/ 1</span>
          <button class="py-2 px-4 bg-yellow-100 rounded-md text-black">&gt;</button>
      </div>
  </div>
</div>

<script>
    if (document.getElementById('alertMessage')) {
        setTimeout(function() {
            document.getElementById('alertMessage').style.display = 'none';
        }, 5000); // Menghilangkan pesan setelah 5 detik (5000 milidetik)
    }
</script>

@endsection
    