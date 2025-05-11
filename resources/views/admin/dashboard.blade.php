@props([
'title' => 'Dashboard | Medicare',
])

@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h1 class="texxt-3xl font-bold text-slate-900 dark:text-white">Admin Dashboard</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Overview of the clinic operations</p>
        </div>
        <div class="mt-4 md:mt-8">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Appointments</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalAppointments }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-green-500 dark:text-green-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 1%
                        </span>
                        <span class="text-slate-500 dark:Text-slate-400 ml-1">vs. last month</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                    <flux:icon.calendar-days class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Pending Approvals</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $pendingAppointments }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-amber-500 dark:text-amber-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 2%
                        </span>
                        <span class="text-slate-500 dark:text-slate-400 ml-1">needs attention</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center">
                    <flux:icon.clock class="w-6 h-6 text-amber-600 dark:text-amber-400" />
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Patients</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalPatients }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-green-500 dark:text-green-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 5%
                        </span>
                        <span class="text-slate-500 dark:text-slate-400 ml-1">new this month</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                    <flux:icon.users class="w-6 h-6 text-green-600 dark:text-green-400" />
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Doctors</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalDoctors }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-cyan-500 dark:text-cyan-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 2
                        </span>
                        <span class="text-slate-500 dark:text-slate-400 ml-1">specialties</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center">
                    <flux:icon.stethoscope class="w-6 h-6 text-cyan-600 dark:text-cyan-400" />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overhlow-hidden">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Appointment Analytics</h2>
                    <flux:dropdown position="bottom" align="end">
                        <flux:button variant="ghost">
                            Last 30 Days
                            <flux:icon.chevron-down class="w-4 h-4 ml-1" />
                        </flux:button>
                        <flux:menu>
                            <flux:menu.item>Last 7 Days</flux:menu.item>
                            <flux:menu.item>Last 30 Days</flux:menu.item>
                            <flux:menu.item>Last 90 Days</flux:menu.item>
                            <flux:menu.item>This Year</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </div>
            <div class="p-5">
                <div class="h-64">
                    <div class="flex items-center justify-center h-full text-sm text-slate-500 dark:text-slate-400">
                        <p>Appointment trend chart na di</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Approval Queue</h2>
                <form action="{{ route('admin.appointments') }}">
                    <flux:button variant="primary">
                        View All
                    </flux:button>
                </form>
            </div>
            <div class="p-4">
                <div class="space-y-4">
                    @forelse($approvalQueue as $appointment)
                    <div class="border border-slate-200 dark:border-slate-700 rounded-md p-3 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-slate-900 dark:text-white">
                                    {{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}
                                </p>
                                <div class="flex items-center text-sm text-slate-500 dark:text-slate-400 mt-1">
                                    <flux:icon.calendar class="w-4 h-4 mr-1" />
                                    {{ Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                    <span class="mx-1">•</span>
                                    <flux:icon.clock class="w-4 h-4 mr-1" />
                                    {{ Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                </div>
                                <div class="flex items-center text-sm text-slate-500 dark:text-slate-400 mt-1">
                                    <flux:icon.stethoscope class="w-4 h-4 mr-1" />
                                    Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
                                    <span class="mx-1">•</span>
                                    {{ $appointment->doctor->specialization->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-700/50 mb-4">
                            <flux:icon.clipboard-check class="w-8 h-8 text-slate-400 dark:text-slate-500" />
                        </div>
                        <p class="text-slate-500 dark:text-slate-400">No pending appointments to approve</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection