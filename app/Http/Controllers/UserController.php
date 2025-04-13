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
}
