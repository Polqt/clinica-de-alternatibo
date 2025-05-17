@props([
'title' => 'Patients | Medicare',
])

@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Patients Management</h1>
            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">Monitor and manage registered patients</p>
        </div>
        <div class="mt-4 md:mt-0">
            <flux:button icon="plus" class="bg-cyan-600 hover:bg-cyan-700">
                Add New Patient
            </flux:button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mr-4">
                    <flux:icon.users class="w-6 h-6 text-cyan-600 dark:text-cyan-400" />
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Patients</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ number_format($totalPatients ?? 0) }}</p>
                </div>
            </div>
        </div>

        <!-- New Patients Card -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center mr-4">
                    <flux:icon.user-plus class="w-6 h-6 text-emerald-600 dark:text-emerald-400" />
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">New Patients</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ number_format($newPatients ?? 0) }}</p>
                    <p class="text-xs text-emerald-600 dark:text-emerald-400">+{{ $newPatientsGrowth ?? 0 }}% this month</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mr-4">
                    <flux:icon.calendar-days class="w-6 h-6 text-amber-600 dark:text-amber-400" />
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Today's Appointments</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $appointmentsToday ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-4">
                    <flux:icon.clipboard-list class="w-6 h-6 text-purple-600 dark:text-purple-400" />
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Active Cases</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $activeCases ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <flux:input
                    icon="magnifying-glass"
                    placeholder="Search patients by name, email, or ID..."
                    class="w-full" />
            </div>
            <div class="flex flex-wrap gap-3">
                <flux:dropdown position="bottom" align="start">
                    <flux:button variant="outline" icon="funnel" class="text-slate-700 dark:text-slate-300">
                        Status
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>All Patients</flux:menu.item>
                        <flux:menu.separator />
                        <flux:menu.item>Active</flux:menu.item>
                        <flux:menu.item>Inactive</flux:menu.item>
                        <flux:menu.item>New Patients</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-700/50">
                    <tr>
                        <th class="px-6 py-3 font-medium">Patient</th>
                        <th class="px-6 py-3 font-medium">Patient ID</th>
                        <th class="px-6 py-3 font-medium">Doctor</th>
                        <th class="px-6 py-3 font-medium">Specialization</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @foreach ($patients as $patient)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden">
                                        @if($patient->user->profile && $patient->user->profile->profile_picture)
                                        <img src="{{ Storage::url($patient->user->profile->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                                        @else
                                        <flux:icon.user class="w-5 h-5 text-slate-600 dark:text-slate-400" />
                                        @endif
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-slate-900 dark:text-white">{{ $patient->user->first_name }} {{ $patient->user->last_name }}</div>
                                    <div class="text-sm text-slate-500 dark:text-slate-400">{{ $patient->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-700 dark:text-slate-300">{{ $patient->patient_identifier }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-700 dark:text-slate-300">
                                @if ($patient->latestAppointment && $patient->latestAppointment->doctor)
                                {{ $patient->latestAppointment->doctor->first_name }} {{ $patient->latestAppointment->doctor->last_name }}
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-700 dark:text-slate-300">
                                @if ($patient->latestAppointment && $patient->latestAppointment->doctor && $patient->latestAppointment->doctor->specialization)
                                {{ $patient->latestAppointment->doctor->specialization->name }}
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if ($patient->latestAppointment)
                            @php
                            $status = $patient->latestAppointment->status;
                            $statusClass = 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300';
                            if ($status === 'pending') {
                            $statusClass = 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400';
                            } elseif ($status === 'confirmed') {
                            $statusClass = 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400';
                            } elseif ($status === 'completed') {
                            $statusClass = 'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-400';
                            } elseif ($status === 'cancelled') {
                            $statusClass = 'bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-400';
                            }
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $statusClass }}">
                                {{ ucfirst($status) }}
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-200 dark:border-slate-700">
            <x-pagination :paginator="$patients" />
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-md font-semibold text-slate-900 dark:text-white flex items-center">
                    <flux:icon.chart-pie class="w-5 h-5 text-cyan-500 mr-2" />
                    Patient Demographics
                </h3>
                <flux:button variant="ghost" size="xs" icon="ellipsis-horizontal" class="text-slate-600 dark:text-slate-400"></flux:button>
            </div>
            <div class="h-64 flex justify-center items-center">
                <div class="text-center text-slate-500 dark:text-slate-400">
                    <flux:icon.chart-pie class="w-12 h-12 mx-auto mb-2 text-slate-300 dark:text-slate-600" />
                    <p>Age Distribution Chart</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-md font-semibold text-slate-900 dark:text-white flex items-center">
                    <flux:icon.chart-bar class="w-5 h-5 text-purple-500 mr-2" />
                    Visit Frequency
                </h3>
                <flux:button variant="ghost" size="xs" icon="ellipsis-horizontal" class="text-slate-600 dark:text-slate-400"></flux:button>
            </div>
            <div class="h-64 flex items-center justify-center">
                <div class="text-center text-slate-500 dark:text-slate-400">
                    <flux:icon.chart-bar class="w-12 h-12 mx-auto mb-2 text-slate-300 dark:text-slate-600" />
                    <p>Monthly Visit Frequency</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-md font-semibold text-slate-900 dark:text-white flex items-center">
                    <flux:icon.clock class="w-5 h-5 text-rose-500 mr-2" />
                    Appointment Analytics
                </h3>
                <flux:button variant="ghost" size="xs" icon="ellipsis-horizontal" class="text-slate-600 dark:text-slate-400"></flux:button>
            </div>
            <div class="h-64 flex items-center justify-center">
                <div class="text-center text-slate-500 dark:text-slate-400">
                    <flux:icon.chart-line class="w-12 h-12 mx-auto mb-2 text-slate-300 dark:text-slate-600" />
                    <p>Appointment Trends</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Recently Added Patients</h2>
            <flux:button variant="ghost" size="sm" class="text-cyan-600 dark:text-cyan-400">
                View All
            </flux:button>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($patients as $patient)
            <div class="bg-slate-50 dark:bg-slate-700/30 rounded-lg p-4 hover:shadow-md transition-all">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0 w-12 h-12">
                        <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden">
                            @if($patient->user->profile->profile_picture)
                            <img src="{{ Storage::url($patient->user->profile->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                            @else
                            <flux:icon.user class="w-6 h-6 text-slate-600 dark:text-slate-400" />
                            @endif
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 dark:text-white truncate">
                            {{ $patient->user->first_name }} {{ $patient->user->last_name }}
                        </p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Added {{ $patient->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <flux:button variant="ghost" size="sm" icon="chevron-right" class="text-slate-600 dark:text-slate-400"></flux:button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection