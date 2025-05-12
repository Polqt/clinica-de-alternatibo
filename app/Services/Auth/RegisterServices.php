<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterServices
{
    /**
     * @param array $data
     */
    public function register(array $data) 
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'user',
        ]);

        Auth::login($user);

        return $user;
    }

    /**
     * @return array
     */
    public function validateRegistrationData() {
        return request()->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'] // regex:/[a-z]/ regex:/[A-Z]/ regex:/[0-9]/
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
        ]);
    }
}
