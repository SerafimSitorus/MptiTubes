@extends('parents.layout.main-parent')

@section('title', 'Edit Password') 

@section('content')

<div class="flex flex-col p-4">
    <div class="mb-8 text-center">
        <h1 class="text-2xl lg:text-4xl font-bold">Edit Password</h1>
        <p class="text-sm lg:text-base mt-2">Update your password below</p>
    </div>
    <div class="max-w-2xl mx-auto bg-white p-12 rounded-lg shadow-lg">
        <!-- Flash messages for success and errors -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form for password update -->
        <form id="passwordForm" action="parentsinserteditpassword" method="post">
            @csrf
            <div class="mb-6">
                <label for="current_password" class="block text-lg font-medium text-gray-700">Current Password</label>
                <div class="relative">
                    <input type="password" id="current_password" name="current_password" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 cursor-pointer" onclick="togglePasswordVisibility('current_password')">
                        <svg id="current_password_icon" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="eye-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 3a5 5 0 1 0 0-10 5 5 0 0 0 0 10z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mb-6">
                <label for="new_password" class="block text-lg font-medium text-gray-700">New Password</label>
                <input type="password" id="new_password" name="new_password" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                <p id="newPasswordError" class="text-red-500 mt-2 hidden">Password must be at least 8 characters.</p>
            </div>
            <div class="mb-6">
                <label for="confirm_password" class="block text-lg font-medium text-gray-700">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-4" required>
                <p id="confirmPasswordError" class="text-red-500 mt-2 hidden">Passwords do not match.</p>
                <p id="confirmPasswordSuccess" class="text-green-500 mt-2 hidden">Passwords match.</p>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-bold">Submit</button>
                <a href="parentsprofile" class="px-8 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg font-bold">kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('passwordForm').addEventListener('submit', function(event) {
        var newPassword = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        // Reset state
        document.getElementById('new_password').classList.remove('border-red-500', 'border-green-500');
        document.getElementById('confirm_password').classList.remove('border-red-500', 'border-green-500');
        document.getElementById('newPasswordError').classList.add('hidden');
        document.getElementById('confirmPasswordError').classList.add('hidden');
        document.getElementById('confirmPasswordSuccess').classList.add('hidden');

        // Validasi regex minimal 8 karakter
        var passwordRegex = /^.{8,}$/;
        if (!passwordRegex.test(newPassword)) {
            document.getElementById('new_password').classList.add('border-red-500');
            document.getElementById('newPasswordError').classList.remove('hidden');
            event.preventDefault();
            return;
        }

        // Periksa apakah password baru dan konfirmasi password sama
        if (newPassword !== confirmPassword) {
            document.getElementById('new_password').classList.add('border-red-500');
            document.getElementById('confirm_password').classList.add('border-red-500');
            document.getElementById('confirmPasswordError').classList.remove('hidden');
            event.preventDefault();
        } else {
            document.getElementById('new_password').classList.add('border-green-500');
            document.getElementById('confirm_password').classList.add('border-green-500');
            document.getElementById('confirmPasswordSuccess').classList.remove('hidden');
        }
    });

    document.getElementById('new_password').addEventListener('input', validatePasswords);
    document.getElementById('confirm_password').addEventListener('input', validatePasswords);

    function validatePasswords() {
        var newPassword = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        // Reset state
        document.getElementById('new_password').classList.remove('border-red-500', 'border-green-500');
        document.getElementById('confirm_password').classList.remove('border-red-500', 'border-green-500');
        document.getElementById('newPasswordError').classList.add('hidden');
        document.getElementById('confirmPasswordError').classList.add('hidden');
        document.getElementById('confirmPasswordSuccess').classList.add('hidden');

        // Validasi regex minimal 8 karakter
        var passwordRegex = /^.{8,}$/;
        if (!passwordRegex.test(newPassword)) {
            document.getElementById('new_password').classList.add('border-red-500');
            document.getElementById('newPasswordError').classList.remove('hidden');
            return;
        }

        // Periksa apakah password baru dan konfirmasi password sama
        if (newPassword !== confirmPassword) {
            document.getElementById('new_password').classList.add('border-red-500');
            document.getElementById('confirm_password').classList.add('border-red-500');
            document.getElementById('confirmPasswordError').classList.remove('hidden');
        } else {
            document.getElementById('new_password').classList.add('border-green-500');
            document.getElementById('confirm_password').classList.add('border-green-500');
            document.getElementById('confirmPasswordSuccess').classList.remove('hidden');
        }
    }

    function togglePasswordVisibility(inputId) {
        var input = document.getElementById(inputId);
        var icon = document.getElementById(inputId + '_icon');
        if (input.type === "password") {
            input.type = "text";
            icon.innerHTML = '<path id="eye-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 3a5 5 0 1 0 0-10 5 5 0 0 0 0 10z" />';
        } else {
            input.type = "password";
            icon.innerHTML = '<path id="eye-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 3a5 5 0 1 0 0-10 5 5 0 0 0 0 10z" />';
        }
    }
</script>
@endsection
    
