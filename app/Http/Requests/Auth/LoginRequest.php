<?php

namespace App\Http\Requests\Auth;
use App\Models\User;
use App\Models\operator;
use App\Models\tutor;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $user = User::where('email', $this->input('email'))->first();

    if (!$user) {
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    // Check if the user is an operator or tutor and their status is "diberhentikan"
    if ($user->role === 'operator' && Operator::where('user_id', $user->id)->first()->status === 'Diberhentikan') {
        throw ValidationException::withMessages([
            'email' => trans('Akun ini telah diberhentikan'),
        ]);
    }

    if ($user->role === 'tutor' && Tutor::where('user_id', $user->id)->first()->status === 'Diberhentikan') {
        throw ValidationException::withMessages([
            'email' => trans('Akun ini telah diberhentikan'),
        ]);
    }

    // If the user passes the checks, authenticate them
    if (! Auth::attempt(['email' => $this->input('email'), 'password' => $this->input('password')], $this->boolean('remember'))) {
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }
    
        $this->ensureIsNotRateLimited();
/*
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
*/
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
