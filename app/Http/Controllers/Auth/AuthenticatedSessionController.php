<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\operator;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        $iduser = $user->id;
        $operator = operator::where('user_id', $iduser)->first();

        // Redirect berdasarkan role user
        if ($user->role === 'superadmin') {
            return redirect()->route('superadmin/dashboard');
        } elseif ($user->role === 'operator') {
            if ($operator->status === 'Aktif') {
                return redirect()->route('operator/dashboard');
            } else {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => ['Maaf Akun Anda Sudah Tidak Aktif.'],
                ]);
            }
        } elseif ($user->role === 'tutor') {
            return redirect()->route('tutor/dashboard');
        } elseif ($user->role === 'parents') {
            return redirect()->route('parent/dashboard-parents');
        } elseif ($user->role === 'job_seeker') {
            return redirect()->route('jobseeker/dashboard');
        }else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
