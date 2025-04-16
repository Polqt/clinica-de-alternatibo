@props([
'title' => 'Profile | Medicare'
])

@extends('layouts.client')
@section('content')
<div class="max-w-8xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
    <div class="rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-6 relative">
            <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-cyan-100 dark:bg-cyan-900/30 opacity-80"></div>
            <div class="absolute top-12 right-24 w-16 h-16 rounded-full bg-teal-100 dark:bg-teal-900/30 opactiy-70"></div>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 relative z-10">
                <div class="w-28 h-28 rounded-xl overflow-hidden bg-gradient-to-br from-cyan-500 to-teal-400 dark:from-cyan-600 dark:to-teal-500 p-1">
                    <div class="w-full h-full rounded-lg overflow-hidden">
                        @if ($profile_picture)
                        <flux:avatar src="{{ $profile_picture }}" class="w-full h-full object-cover" />
                        @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-slate-600 dark:text-slate-300">{{ substr($first_name, 0, 1) . substr($last_name, 0, 1) }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="flex-1">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $first_name }} {{ $last_name }}</h1>
                            <div class="flex-items center mt-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-cyan-100 text-cyan-800 dark:bg-cyan-900/40 dark:text-cyan-300">
                                    Email
                                </span>
                                <span class="ml-1 text-sm text-zinc-500 dark:text-zinc-400">{{ $email }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="px-4 py-2 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                            <div class="text-xs font-medium text-slate-500 dark:text-slate-400">Blood Type</div>
                            <div class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $blood_type ?: 'N/A' }}</div>
                        </div>
                        <div class="px-4 py-2 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                            <div class="text-xs font-medium text-slate-500 dark:text-slate-400">Age</div>
                            <div class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $date_of_birth ? \Carbon\Carbon::parse($date_of_birth)->age : 'N/A' }}</div>
                        </div>
                        <div class="px-4 py-2 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                            <div class="text-xs font-medium text-slate-500 dark:text-slate-400">Gender</div>
                            <div class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $gender ?: 'N/A' }}</div>
                        </div>
                        <div class="px-4 py-2 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                            <div class="text-xs font-medium text-slate-500 dark:text-slate-400">Phone Number</div>
                            <div class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $phone_number ?: 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-900 rounded-xl shadow border border-slate-200 dark:border-slate-700 p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Personal Details</h2>
                        <flux:modal.trigger name="edit-profile">
                            <flux:button>Edit profile</flux:button>
                        </flux:modal.trigger>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Full Name</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $first_name }} {{ $last_name }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Email Address</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $email }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Gender</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $gender }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Blood Type</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $blood_type }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Phone Number</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $phone_number }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Date of Birth</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $date_of_birth }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">City</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $city }} </p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Address</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 dark:from-cyan-600 dark:to-cyan-700 rounded-xl shadow p-5 text-white">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-white/20">
                                <flux:icon.calendar-plus />
                            </div>
                            <h3 class="ml-3 text-lg font-semibold">Appointment</h3>
                        </div>
                        <p class="text-white/80 text-sm mt-2">Schedule a visit with our doctors</p>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 dark:from-emerald-600 dark:to-emerald-700 rounded-xl shadow p-5 text-white">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-white/20">
                                <flux:icon.history />
                            </div>
                            <h3 class="ml-3 text-lg font-semibold">History</h3>
                        </div>
                        <p class="text-white/80 text-sm mt-2">Check out your medical history</p>
                    </div>
                    <div class="bg-gradient-to-br from-amber-500 to-amber-600 dark:from-amber-600 dark:to-amber-700 rounded-xl shadow p-5 text-white">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-white/20">
                                <flux:icon.pill />
                            </div>
                            <h3 class="ml-3 text-lg font-semibold">Prescriptions</h3>
                        </div>
                        <p class="text-white/80 text-sm mt-2">Manage your medications</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-xl shadow border border-slate-200 dark:border-slate-700 overflow-hidden mb-6">
                    <div class="border-b border-slate-200 dark:border-slate-700 p-5">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Upcoming Appointments</h2>
                            <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                <flux:icon.plus variant="micro" class="mr-1 " />
                                New
                            </button>
                        </div>
                    </div>

                    <div class="p-6 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 mb-4">
                        </div>
                        <h3 class="text-lg font-medium text-slate-900 dark:text-slate-100">No upcoming appointments</h3>
                        <p class="mt-1 text-slate-500 dark:text-slate-400 max-w-sm mx-auto">Schedule your next appointment with one of our doctors for a check up</p>
                        <div class="mt-4">
                            <flux:button variant="primary" href="" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Schedule Appointment</flux:button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<flux:modal name="edit-profile" class="md:w-96">
    <form method="PUT" action="{{ route('profile.update') }}">
        @csrf
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>

            <flux:input name="first_name" label="First Name" placeholder="Your first name" value="{{ $first_name }}" />
            <flux:input name="last_name" label="Last Name" placeholder="Your last name" value="{{ $last_name }}" />
            <flux:input name="phone_number" label="Phone Number" placeholder="Your phone number" value="{{ $phone_number }}" />
            <flux:input name="date_of_birth" label="Date of birth" type="date" value="{{ $date_of_birth }}" />

            <flux:select name="gender" label="Gender">
                <option value="Male" {{ $gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $gender == 'Other' ? 'selected' : '' }}>Other</option>
            </flux:select>

            <flux:select name="blood_type" label="Blood Type">
                @foreach(\App\Enums\BloodType::values() as $bloodType)
                <option value="{{ $bloodType }}" {{ $blood_type == $bloodType ? 'selected' : '' }}>{{ $bloodType }}</option>
                @endforeach
            </flux:select>

            <flux:input name="address" label="Address" placeholder="Your address" value="{{ $address }}" />
            <flux:input name="city" label="City" placeholder="Your city" value="{{ $city }}" />

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </form>
</flux:modal>
@endsection