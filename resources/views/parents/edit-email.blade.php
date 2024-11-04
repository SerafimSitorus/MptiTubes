@extends('parents.layout.main-parent')

@section('title', 'Edit Email') 

@section('content')

@if ($errors->any())
    <div id="alertMessage" class="bg-red-100  rounded-md p-3 flex absolute">
        <svg class="stroke-2 stroke-current text-red-600 h-8 w-8 mr-2 flex-shrink-0"
            viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
            <path d="M0 0h24v24H0z" stroke="none" />
            <circle cx="12" cy="12" r="9" />
            <path d="M8 8l8 8M8 16l8-8" />
        </svg>
    
        <div class="text-red-700">
            @foreach ($errors->all() as $error)
                <div class="font-bold text-xl">{{ $error }}</div>
        
                <div>Tolong Masukkan Email Awal yang Sesuai</div>
            @endforeach
        </div>
    </div>
@endif

<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-4xl font-bold">Edit Email</h1>
        <p class="text-sm lg:text-base mt-2">Update your email address below</p>
    </div>
    <div class="max-w-2xl mx-auto bg-white p-12 rounded-lg shadow-lg">
        <form action="parentsinserteditemail" method="post">
            @csrf
            <div class="mb-6">
                <label for="current_email" class="block text-lg font-medium text-gray-700">Current Email</label>
                <input type="email" id="current_email" name="current_email" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
            </div>
            <div class="mb-6">
                <label for="new_email" class="block text-lg font-medium text-gray-700">New Email</label>
                <input type="email" id="new_email" name="new_email" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-bold">Submit</button>
                <a href="parentsprofile" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection
    
