<?php

namespace App\Http\Controllers;

use App\Services\Auth\LoginServices;
use Illuminate\Http\RedirectResponse;
use App\Services\Auth\LogoutServices;
use App\Services\Auth\RegisterServices;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $loginServices;
    protected $registerServices;
    protected $logoutServices;

    public function __construct(
        LoginServices $loginServices,
        RegisterServices $registerServices,
        LogoutServices $logoutServices
    ) {
        $this->loginServices = $loginServices;
        $this->registerServices = $registerServices;
        $this->logoutServices = $logoutServices;
    }

    public function login()
    {
        $credentials = $this->loginServices->validateCredentials();

        $redirectRoute = $this->loginServices->login($credentials);

        if ($redirectRoute) {
            return redirect()->route($redirectRoute)->with('success', 'You are logged in successfully.');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(): RedirectResponse
    {
        $data = $this->registerServices->validateRegistrationData();

        $this->registerServices->register($data);

        return redirect()->route('profile.create')->with('success', 'Registration successful. Please complete your profile.');
    }

    public function logout(): RedirectResponse
    {
        return $this->logoutServices->logoutAndRedirect();
    }
}
