@extends('superadmin.layout.main-superadmin')

@section('title', 'Superadmin - Tutor Review')

@section('content')

<div class="my-4 w-full mr-10 lg:mr-20 overflow-auto">
    <div class="flex justify-between md:items-end md:flex-row flex-col">
        <div>
            <h1 class="text-xl lg:text-3xl font-bold">Tutor Management</h1>
            <p class="text-sm lg:text-base">You can manage all section related to private tutor here</p>

            <h2 class="mt-6 text-lg lg:text-xl font-semibold">Tutor Review</h2>
        </div>
        <div class="flex flex-col gap-2">
            <label for="role" class="text-sm lg:text-base">Filter by province</label>
            <select class="py-2 px-3 border border-yellow-500 text-black rounded-md bg-white" name="role" id="role">
                <option value="Admin">Sumatera Utara</option>
                <option value="Parents">Jawa tengah</option>
                <option value="Job seeker">Kalimantan</option>
                <option value="Superadmin">Bali</option>
            </select>
        </div>
    </div>
    <table class="mt-6 w-full">
      <thead class="bg-blue-800 rounded-xl border border-blue-800">
        <tr class="rounded-md">
          <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Name of the Sender</th>
          <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Name Tutor</th>
          <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Province</th>
          <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Address</th>
          <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Grade</th>
          <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Review</th>
          <th class="text-white text-left px-3 py-1 lg:px-10 lg:py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($review as $item)
        <tr class="border border-yellow-500">
          <td class="lg:px-10 lg:py-3 px-3 py-1 text-left">{{$item->parent->nama_parents}}</td>
          <td class="lg:px-10 lg:py-3 px-3 py-1 text-left">{{$item->tutors->nama_tutor}}</td>
          <td class="lg:px-10 lg:py-3 px-3 py-1 text-left">{{$item->provinsi}}</td>
          <td class="lg:px-10 lg:py-3 px-3 py-1 text-left">{{$item->alamat_mengajar}}</td>
          <td class="lg:px-10 lg:py-3 px-3 py-1 text-left">{{$item->grade}}</td>
          <td class="lg:px-10 lg:py-3 px-3 py-1 text-left">{{$item->review}}</td>
            <td class="lg:px-10 lg:py-3 px-3 py-1 text-left"><a href="{{route('superadmin/tutor-review/detail', ['id'=>$item->id])}}" class="underline text-blue-700">See details</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="flex justify-between gap-3 md:items-center mt-6 flex-col md:flex-row">
        <div>
            <label for="role">Rows per page</label>
            <select class="py-2 px-3 bg-yellow-100 rounded-md text-black" name="role" id="role">
                <option value="1">1</option>
            </select>
        </div>
        <div class="flex gap-2 flex-row items-center">
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> < </span>
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> 1 </span>
            <span>/ 1</span>
            <span class="py-2 px-4 bg-yellow-100 rounded-md text-black"> > </span>
        </div>
    </div>
</div>
@endsection
