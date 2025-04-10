<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }

        $user->load('profile');

        $profile_picture = null;

        if ($user->profile && $user->profile->profile_picture) {
            $profile_picture = asset('storage/' . $user->profile->profile_picture);
        }

        return view('user.dashboard', [
            'user' => $user,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'profile_picture' => $profile_picture,
        ]);
    }
}
