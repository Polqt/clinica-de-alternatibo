@props([
'title' => 'Profile | Medicare'
])
@extends('layouts.client')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Profile Header -->
    <div class="bg-zinc-50 dark:bg-zinc-900 rounded-xl shadow border border-zinc-200 dark:border-zinc-700 overflow-hidden">
        <!-- Cover Background -->
        <div class="h-32 bg-gradient-to-r from-blue-500 to-teal-400 dark:from-blue-600 dark:to-teal-500"></div>

        <div class="px-6 pb-6 relative">
            <!-- Avatar -->
            <div class="flex justify-center">
                <flux:avatar size="2xl" circle src="{{ $profile_picture }}" fallback="{{ substr($first_name, 0, 1) . substr($last_name, 0, 1) }}" class="-mt-12 border-4 border-white dark:border-zinc-800 shadow-md" />
            </div>

            <!-- Name and Basic Info -->
            <div class="mt-4 text-center">
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">{{ $first_name }} {{ $last_name }}</h1>
                <p class="text-zinc-500 dark:text-zinc-400">{{ $email }}</p>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Patient ID: {{ $email }}</p>
                <flux:button variant="outline" icon="pencil" class="mt-4">Edit Profile</flux:button>
            </div>
        </div>
    </div>

    <!-- Profile Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <!-- Personal Information -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-zinc-900 rounded-xl shadow border border-zinc-200 dark:border-zinc-700 p-6">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-4">Personal Information</h2>

                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-blue-100 dark:bg-blue-900/30">
                            <flux:icon name="phone" class="h-5 w-5 text-blue-500 dark:text-blue-400" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Phone Number</p>
                            <p class="text-zinc-900 dark:text-zinc-100">{{ $phone_number ?: 'Not provided' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-green-100 dark:bg-green-900/30">
                            <flux:icon name="calendar" class="h-5 w-5 text-green-500 dark:text-green-400" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Date of Birth</p>
                            <p class="text-zinc-900 dark:text-zinc-100">{{ $date_of_birth ?: 'Not provided' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-purple-100 dark:bg-purple-900/30">
                            <flux:icon name="map-pin" class="h-5 w-5 text-purple-500 dark:text-purple-400" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Address</p>
                            <p class="text-zinc-900 dark:text-zinc-100">{{ $address ?: 'Not provided' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-amber-100 dark:bg-amber-900/30">
                            <flux:icon name="mail-check" class="h-5 w-5 text-amber-500 dark:text-amber-400" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Postal Code</p>
                            <p class="text-zinc-900 dark:text-zinc-100">{{ $postal_code ?: 'Not provided' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-red-100 dark:bg-red-900/30">
                            <flux:icon name="heart-pulse" class="h-5 w-5 text-red-500 dark:text-red-400" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Blood Type</p>
                            <p class="text-zinc-900 dark:text-zinc-100">{{ $blood_type ?: 'Not provided' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-indigo-100 dark:bg-indigo-900/30">
                            <flux:icon name="user" class="h-5 w-5 text-indigo-500 dark:text-indigo-400" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Gender</p>
                            <p class="text-zinc-900 dark:text-zinc-100">{{ $gender ?: 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Information -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-zinc-900 rounded-xl shadow border border-zinc-200 dark:border-zinc-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100">Medical Information</h2>
                    <flux:tabs variant="segmented">
                        <flux:tab>Medical History</flux:tab>
                        <flux:tab>Appointments</flux:tab>
                        <flux:tab>Documents</flux:tab>
                    </flux:tabs>
                </div>

                <!-- Tab content placeholder -->
                <div class="bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6 text-center">
                    <flux:icon name="clipboard-list" class="h-12 w-12 mx-auto text-zinc-400 dark:text-zinc-500 mb-4" />
                    <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100 mb-2">Medical History</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 mb-4">Your medical history appears to be empty</p>
                    <flux:button variant="filled" icon="plus" size="sm">Add Medical History</flux:button>
                </div>
            </div>

            <!-- Upcoming Appointments -->
            <div class="mt-6 bg-white dark:bg-zinc-900 rounded-xl shadow border border-zinc-200 dark:border-zinc-700 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100">Upcoming Appointments</h2>
                    <flux:button variant="ghost" size="sm" icon="plus-circle">Schedule New</flux:button>
                </div>

                <!-- Empty appointments placeholder -->
                <div class="bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-dashed border-zinc-300 dark:border-zinc-600 p-6 text-center">
                    <flux:icon name="calendar" class="h-12 w-12 mx-auto text-zinc-400 dark:text-zinc-500 mb-4" />
                    <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100 mb-2">No upcoming appointments</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 mb-4">Schedule your next appointment with one of our specialists</p>
                    <flux:button variant="filled" icon="calendar-plus" size="sm">Book Appointment</flux:button>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Settings -->
    <div class="mt-6 bg-white dark:bg-zinc-900 rounded-xl shadow border border-zinc-200 dark:border-zinc-700 p-6">
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-6">Account Settings</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <flux:card variant="outline" class="hover:border-blue-400 dark:hover:border-blue-500 transition-colors">
                <div class="flex flex-col items-center py-2">
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900/30 mb-3">
                        <flux:icon name="shield" class="h-6 w-6 text-blue-500 dark:text-blue-400" />
                    </div>
                    <h3 class="text-zinc-900 dark:text-zinc-100 font-medium text-lg">Privacy</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 text-sm text-center mt-1">Manage your privacy settings</p>
                </div>
            </flux:card>

            <flux:card variant="outline" class="hover:border-green-400 dark:hover:border-green-500 transition-colors">
                <div class="flex flex-col items-center py-2">
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100 dark:bg-green-900/30 mb-3">
                        <flux:icon name="bell" class="h-6 w-6 text-green-500 dark:text-green-400" />
                    </div>
                    <h3 class="text-zinc-900 dark:text-zinc-100 font-medium text-lg">Notifications</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 text-sm text-center mt-1">Set your notification preferences</p>
                </div>
            </flux:card>

            <flux:card variant="outline" class="hover:border-purple-400 dark:hover:border-purple-500 transition-colors">
                <div class="flex flex-col items-center py-2">
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-purple-100 dark:bg-purple-900/30 mb-3">
                        <flux:icon name="lock" class="h-6 w-6 text-purple-500 dark:text-purple-400" />
                    </div>
                    <h3 class="text-zinc-900 dark:text-zinc-100 font-medium text-lg">Security</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 text-sm text-center mt-1">Update your security settings</p>
                </div>
            </flux:card>

            <flux:card variant="outline" class="hover:border-amber-400 dark:hover:border-amber-500 transition-colors">
                <div class="flex flex-col items-center py-2">
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-amber-100 dark:bg-amber-900/30 mb-3">
                        <flux:icon name="credit-card" class="h-6 w-6 text-amber-500 dark:text-amber-400" />
                    </div>
                    <h3 class="text-zinc-900 dark:text-zinc-100 font-medium text-lg">Billing</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 text-sm text-center mt-1">Manage your payment methods</p>
                </div>
            </flux:card>
        </div>
    </div>
</div>

@endsection