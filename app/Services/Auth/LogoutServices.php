<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class LogoutServices
{
    /**
     * @return bool
     */
    public function logout(): bool
    {
        try {
            if (!Auth::check()) {
                Log::warning('Logout attempted for non-authenticated user');
                return false;
            }
            $user = Auth::user();

            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            Log::info('User logged out successfully', [
                'user_id' => $user ? $user->id : 'N/A',
                'email' => $user ? $user->email : 'N/A'
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Logout failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return false;
        }
    }

    /**
     * @return RedirectResponse
     */
    public function logoutAndRedirect(): RedirectResponse
    {
        $logoutResult = $this->logout();

        if ($logoutResult) {
            return redirect()->route('login')->with('success', 'You have been logged out successfully.');
        }

        return redirect()->route('login')->with('error', 'An error occurred while logging out.');
    }
}
