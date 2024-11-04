@extends('parents.layout.main-parent')

@section('title', 'Tutor Review') 

@section('content')

<div class="flex flex-col p-4 ">
    <div>
        <h1 class="text-xl lg:text-3xl font-bold">Tutor Payment</h1>
        <p class="text-sm lg:text-base">Berikan Berikan Tagihan Untuk tutor anda</p>
        <h2 class="mt-6 text-lg lg:text-xl font-semibold">List Tutor</h2>
    </div>
    <div class="flex flex-wrap gap-4 justify-center">
        <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden shadow-lg">
            <div class="flex justify-center">
                <img class=" w-64 h-64 rounded-full content-center" src="{{ asset('images/satria.jpg') }}" alt="Satria">
            </div>
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Kesatria Kegelapan</div>
            <p class=" text-base">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </p>
          </div>
          <div class="flex justify-end px-6 pt-4 pb-2">
            <a href="parentspayment" class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-bold text-white mr-2 mb-2 items-end hover:bg-blue-600">Bayar</a>
          </div>
        </div>
      
        <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden shadow-lg">
            <div class="flex justify-center">
                <img class=" w-64 h-64 rounded-full content-center" src="{{ asset('images/satria.jpg') }}" alt="Satria">
            </div>
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Kesatria Kegelapan</div>
            <p class=" text-base">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </p>
          </div>
          <div class=" flex justify-end px-6 pt-4 pb-2">
            <div class="inline-block bg-green-500 rounded-full px-3 py-1 text-sm font-bold text-white mr-2 mb-2 items-end">Sudah Dibayar</div>
          </div>
        </div>
    
        <div class="max-w-sm w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 rounded overflow-hidden shadow-lg">
            <div class="flex justify-center">
                <img class=" w-64 h-64 rounded-full content-center" src="{{ asset('images/satria.jpg') }}" alt="Satria">
            </div>
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Kesatria Kegelapan</div>
            <p class=" text-base">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </p>
          </div>
          <div class="flex justify-end px-6 pt-4 pb-2">
            <button class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-bold text-white mr-2 mb-2 items-end hover:bg-blue-600">Berikan Review</button>
          </div>
        </div>
    </div>
</div>

@endsection