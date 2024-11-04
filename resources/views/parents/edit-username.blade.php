@extends('parents.layout.main-parent')

@section('title', 'Edit Email') 

@section('content')

<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-4xl font-bold">Edit Email</h1>
        <p class="text-sm lg:text-base mt-2">Update your email address below</p>
    </div>
    <div class="max-w-2xl mx-auto bg-white p-12 rounded-lg shadow-lg">
        <form action="#" method="post">
            <div class="mb-6">
                <label for="current_email" class="block text-lg font-medium text-gray-700">Username</label>
                <input type="text" id="current_email" name="current_email" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
            </div>
            <div class="mb-6">
                <label for="new_email" class="block text-lg font-medium text-gray-700">New Username</label>
                <input type="email" id="new_email" name="new_email" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-bold">Submit</button>
                <a href="javascript:history.back()" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
    
