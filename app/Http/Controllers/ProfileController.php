<?php

namespace App\Http\Controllers;

use App\Enums\BloodType;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function create()
    {

        if (Auth::user()->profile) {
            return redirect()->route('dashboard');
        }

        return view('profile.create',[
            'bloodTypes' => BloodType::values(),
            'genders' => ['Male', 'Female', 'Other']
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'phone_number' => 'required|string|max:12',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'blood_type' => ['required', new Enum(BloodType::class)],
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        /** @var User $user */
        $user = Auth::user();

        if (!$user) {
            abort(401);
        }

        // Create the profile
        $user->profile()->create($data);

        // TODO: diretso sa user dashboard

        return redirect()->route('/login')->with('success', 'Profile created successfully.');
    }

    public function edit()
    {
        return view('profile.edit', ['profile' => Auth::user()->profile]);
    }

    public function update(Request $request){
        $data = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:12',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'blood_type' => ['required', new Enum(BloodType::class)],
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!$user || !$user->profile) {
            abort(401);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile->profile_picture) {
                // Delete the old profile picture
                Storage::disk('public')->delete($user->profile->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        $user->profile->update($data);

        if (isset($data['first_name']) && isset($data['last_name'])) {
            $user->name = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
            $user->save();
        }

        return redirect()->route('client.profile')->with('success', 'Profile updated successfully.');

    }
}
