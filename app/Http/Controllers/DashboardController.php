<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index(): View
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        $user->load('profile');


        return view('dashboard', compact('user'));
    }
}
