@props([
'title' => 'Admin Profile | Medicare'
])

@extends('layouts.admin')
@section('content')
<div class="max-w-8xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
    <div class="rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="p-6 relative">
            <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-indigo-100 dark:bg-indigo-900/30 opacity-80"></div>
            <div class="absolute top-12 right-24 w-16 h-16 rounded-full bg-purple-100 dark:bg-purple-900/30 opacity-70"></div>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 relative z-10">
                <div class="relative">
                    <div class="w-28 h-28 rounded-xl overflow-hidden bg-gradient-to-br from-indigo-500 to-purple-400 dark:from-indigo-600 dark:to-purple-500 p-1">
                        <div class="w-full h-full rounded-lg overflow-hidden">
                            @if ($profile_picture)
                            <flux:avatar src="{{ $profile_picture }}" class="w-full h-full object-cover" />
                            @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-2xl font-bold text-slate-100">{{ substr($first_name, 0, 1) . substr($last_name, 0, 1) }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="absolute -bottom-2 -right-2 bg-amber-500 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg">
                        ADMIN
                    </div>
                </div>

                <div class="flex-1">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $first_name }} {{ $last_name }}</h1>
                            <div class="flex items-center mt-2 space-x-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/40 dark:text-indigo-300">
                                    Admin Account
                                </span>
                                <span class="text-sm text-zinc-500 dark:text-zinc-400">{{ $email }}</span>
                            </div>
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
                        <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Account Details</h2>
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
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Phone Number</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $phone_number ?: 'Not provided' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Date of Birth</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $date_of_birth ?: 'Not provided' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Office Location</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $city ?: 'Not specified' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-slate-500 dark:text-slate-400">Address</h3>
                            <p class="mt-1 text-sm text-slate-900 dark:text-slate-100">{{ $address ?: 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 dark:from-indigo-600 dark:to-indigo-700 rounded-xl shadow p-5 text-white">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-white/20">
                                <flux:icon.users />
                            </div>
                            <h3 class="ml-3 text-lg font-semibold">Users</h3>
                        </div>
                        <p class="text-white/80 text-sm mt-2">Manage patient accounts</p>
                        <div class="mt-4">
                            <a href="" class="inline-flex items-center text-xs font-medium text-white hover:underline">
                                View all users
                                <flux:icon.arrow-right variant="micro" class="ml-1" />
                            </a>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 dark:from-purple-600 dark:to-purple-700 rounded-xl shadow p-5 text-white">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-white/20">
                                <flux:icon.clipboard-list />
                            </div>
                            <h3 class="ml-3 text-lg font-semibold">Appointments</h3>
                        </div>
                        <p class="text-white/80 text-sm mt-2">Manage scheduled visits</p>
                        <div class="mt-4">
                            <a href="{{ route('admin.appointments') }}" class="inline-flex items-center text-xs font-medium text-white hover:underline">
                                View calendar
                                <flux:icon.arrow-right variant="micro" class="ml-1" />
                            </a>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-fuchsia-500 to-fuchsia-600 dark:from-fuchsia-600 dark:to-fuchsia-700 rounded-xl shadow p-5 text-white">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-white/20">
                                <flux:icon.chart-bar />
                            </div>
                            <h3 class="ml-3 text-lg font-semibold">Reports</h3>
                        </div>
                        <p class="text-white/80 text-sm mt-2">Access system analytics</p>
                        <div class="mt-4">
                            <a href="" class="inline-flex items-center text-xs font-medium text-white hover:underline">
                                View reports
                                <flux:icon.arrow-right variant="micro" class="ml-1" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-xl shadow border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div class="border-b border-slate-200 dark:border-slate-700 p-5">
                        <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">System Overview</h2>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-lg">
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Active Users</div>
                                <div class="mt-1 flex items-baseline">
                                    <div class="text-2xl font-semibold text-slate-900 dark:text-slate-100">1,254</div>
                                    <span class="ml-2 text-xs text-green-600 dark:text-green-400">+5%</span>
                                </div>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-lg">
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Today's Appointments</div>
                                <div class="mt-1 flex items-baseline">
                                    <div class="text-2xl font-semibold text-slate-900 dark:text-slate-100">32</div>
                                </div>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-lg">
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">New Patients</div>
                                <div class="mt-1 flex items-baseline">
                                    <div class="text-2xl font-semibold text-slate-900 dark:text-slate-100">18</div>
                                    <span class="ml-2 text-xs text-green-600 dark:text-green-400">+12%</span>
                                </div>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-lg">
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Support Tickets</div>
                                <div class="mt-1 flex items-baseline">
                                    <div class="text-2xl font-semibold text-slate-900 dark:text-slate-100">5</div>
                                    <span class="ml-2 text-xs text-amber-600 dark:text-amber-400">Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection