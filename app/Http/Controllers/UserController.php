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

    public function help()
    {
        return view('client.help');
    }

    public function profile()
    {

        return view('client.profile.index');
    }

    public function schedule()
    {
        return view('client.schedule.index');
    }

    public function history()
    {
        return view('client.history.index');
    }

    public function appointments() {
        return view('client.appointments.index');
    }
}
