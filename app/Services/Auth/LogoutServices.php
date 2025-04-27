<?php

namespace App\Services\Auth;
use Illuminate\Support\Facades\Auth;

class LogoutServices
{
    /**
     * Create a new class instance.
     */
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
