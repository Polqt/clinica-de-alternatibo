<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {


        return view('client.dashboard');
    }

    public function profile()
    {

        return view('client.profile');
    }

    public function schedule()
    {
        return view('client.schedule');
    }

    public function history()
    {
        return view('client.history');
    }

    public function help()
    {
        return view('client.help');
    }
}
