<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Tutor;
use App\Models\Parents;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'size:16', 'unique:tutors,nik', 'unique:parents,nik'], // Validasi NIK
            'no_hp' => ['required', 'string', 'max:14'],
            'provinsi' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'in:L,P'],
            'tanggal_lahir' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');

        // Simpan NIK, No HP, dan Provinsi ke tabel yang sesuai berdasarkan peran
        if ($validatedData['role'] === 'tutor') {
            Tutor::create([
                'nik' => $request->nik,
                'user_id' => $user->id,
                'nama_tutor' => $request->username,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => '',
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp' => $request->no_hp,
                'provinsi_naungan' => $request->provinsi,
                'alamat_domisili' => '',
                'universitasorsekolah' => '',
                'jurusan' => '',
                'status' => 'Aktif',
            ]);
        } elseif ($validatedData['role'] === 'parents') {
            Parents::create([
                'nik' => $request->nik,
                'user_id' => $user->id,
                'nama_parents' => $request->username,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => '',
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp' => $request->no_hp,
                'provinsi' => $request->provinsi,
                'alamat_domisili' => '',
            ]);
        }

        Toastr::success('Berhasil daftar akun', 'success');
        return redirect()->route('login');
    }
}
