<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

class LoginServices
{
    /**
     * @param array $credentials
     * @return string|null The redirect route name or null if authentication fails
     */
    public function login(array $credentials)
    {
        // Attempt to authenticate with remember option
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation
            request()->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return 'admin.dashboard';
            }

            if ($user->role === 'user') {
                return 'client.dashboard';
            }
        }

        return null;
    }

    /**
     * @return array The validated credentials
     */

    public function validateCredentials() {
        return request()->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);
    }
}
