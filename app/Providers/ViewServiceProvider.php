<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {

                /** @var \App\Models\User $user */

                $user = Auth::user();
                $user->load('profile');

                $profile_picture = null;
                if ($user->profile && $user->profile->profile_picture) {
                    $profile_picture = asset('storage/' . $user->profile->profile_picture);
                }

                $view->with([
                    'user' => $user,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'profile_picture' => $profile_picture,
                    'phone_number' => $user->profile?->phone_number,
                    'address' => $user->profile?->address,
                    'postal_code' => $user->profile?->postal_code,
                    'city' => $user->profile?->city,
                    'date_of_birth' => $user->profile?->date_of_birth,
                    'gender' => $user->profile?->gender,
                    'blood_type' => $user->profile?->blood_type,
                ]);
            }
        });
    }
}
