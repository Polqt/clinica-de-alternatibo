@props([
'title' => 'Medical History | MediCare',
])

@extends('layouts.client')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Medical History</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Your complete medical records and past visits</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-2">
            <flux:input icon="magnifying-glass" placeholder="Search records..." size="sm" class="w-48" />
            <flux:dropdown position="bottom" align="end">
                <flux:button variant="outline" icon="funnel" size="sm">
                    Filter
                </flux:button>
                <flux:menu>
                    <flux:menu.item>All Records</flux:menu.item>
                    <flux:menu.item>Doctor Visits</flux:menu.item>
                    <flux:menu.item>Lab Results</flux:menu.item>
                    <flux:menu.item>Treatments</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>
    </div>


    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Medical Timeline</h2>
        </div>

        <div class="p-6">
            <div class="relative">
                <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-slate-200 dark:bg-slate-700"></div>

                @if(isset($appointments) && $appointments->isNotEmpty())
                @foreach($appointments as $appointment)
                <div class="relative pl-12 pb-8">
                    <div class="absolute left-1.5 top-1 w-6 h-6 bg-blue-500 border-4 border-white dark:border-slate-800 rounded-full"></div>
                    <div class="bg-slate-50 dark:bg-slate-700/30 p-4 rounded-lg border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                </span>
                                <span class="ml-2 text-xs text-slate-500 dark:text-slate-400">
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('h:i A') }}
                                </span>
                            </div>
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-{{ $appointment->status_color }}-100 text-{{ $appointment->status_color }}-800 dark:bg-{{ $appointment->status_color }}-900/70 dark:text-{{ $appointment->status_color }}-200 rounded">
                                {{ $appointment->status }}
                            </span>
                        </div>

                        <h3 class="text-md font-medium text-slate-900 dark:text-white mb-1">
                            {{ $appointment->title ?? 'Appointment' }}
                        </h3>

                        @if(isset($appointment->doctor))
                        <div class="flex items-center text-sm text-slate-600 dark:text-slate-300 mb-3">
                            <flux:icon.user-circle class="h-4 w-4 mr-1" />
                            Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
                            @if(isset($appointment->doctor->specialization))
                            <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                            <flux:icon.building-office class="h-4 w-4 mr-1" />
                            {{ $appointment->doctor->specialization->name ?? 'General Practice' }}
                            @endif
                        </div>
                        @endif

                        @if(isset($appointment->clinic_notes))
                        <div class="p-3 rounded-md bg-blue-50 dark:bg-slate-700/70 border border-blue-100 dark:border-slate-600 mb-3">
                            <p class="text-sm text-slate-700 dark:text-slate-300">{{ $appointment->clinic_notes }}</p>
                        </div>
                        @endif

                        <div class="mt-4 flex items-center gap-2">
                            <flux:button size="xs" variant="outline" icon="document-text">
                                View Details
                            </flux:button>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="relative pl-12 pb-8 pt-4">
                    <div class="text-center p-6">
                        <flux:icon.calendar class="w-12 h-12 text-slate-300 dark:text-slate-600 mx-auto mb-3" />
                        <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-1">No appointment history</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">You don't have any past appointment records</p>
                    </div>
                </div>
                @endif

                <div class="relative pl-12 text-center py-4">
                    <flux:button variant="outline" icon="chevron-down" class="w-full">
                        View More History
                    </flux:button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.users class="w-5 h-5 text-blue-500 mr-2" />
                Preferred Doctors
            </h3>

            <ul class="space-y-3">
                @if(isset($preferredDoctors) && count($preferredDoctors) > 0)
                @foreach($preferredDoctors as $doctor)
                <li class="flex items-center justify-between text-sm p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                        <span class="text-slate-700 dark:text-slate-300">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</span>
                    </div>
                    @if(isset($doctor->specialization))
                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $doctor->specialization->name }}</span>
                    @endif
                </li>
                @endforeach
                @else
                <li class="flex items-center justify-center text-sm p-6 rounded-md bg-slate-50 dark:bg-slate-700/30">
                    <span class="text-slate-500 dark:text-slate-400">No preferred doctors yet</span>
                </li>
                @endif
            </ul>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.academic-cap class="w-5 h-5 text-green-500 mr-2" />
                Recent Specialties Visited
            </h3>

            <ul class="space-y-3">
                @if(isset($recentSpecialties) && count($recentSpecialties) > 0)
                @foreach($recentSpecialties as $specialty)
                <li class="p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-medium text-slate-900 dark:text-white">{{ $specialty->name }}</span>
                        <span class="inline-block px-2 py-0.5 text-xs bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 rounded">
                            {{ $specialty->visit_count }} visits
                        </span>
                    </div>
                    @if(isset($specialty->last_visit_date))
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Last visit: {{ $specialty->last_visit_date }}</p>
                    @endif
                </li>
                @endforeach
                @else
                <li class="p-6 rounded-md bg-slate-50 dark:bg-slate-700/30 text-center">
                    <span class="text-slate-500 dark:text-slate-400">No specialty visits recorded</span>
                </li>
                @endif
            </ul>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.calendar class="w-5 h-5 text-green-500 mr-2" />
                Upcoming Appointments
            </h3>

            <ul class="space-y-3">
                @if(isset($scheduleAppointments) && $scheduleAppointments->isNotEmpty())
                @foreach($scheduleAppointments as $appointment)
                <li class="p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="inline-block px-2 py-0.5 text-xs bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 rounded">
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                        </span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('h:i A') }}
                        </span>
                    </div>
                    <p class="font-medium text-slate-900 dark:text-white mb-1">{{ $appointment->title ?? 'Appointment' }}</p>
                    @if(isset($appointment->doctor))
                    <div class="flex items-center text-xs text-slate-600 dark:text-slate-300 mb-2">
                        <flux:icon.user-circle class="h-3 w-3 mr-1" />
                        Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
                        @if(isset($appointment->doctor->specialization))
                        <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                        <flux:icon.building-office class="h-3 w-3 mr-1" />
                        {{ $appointment->doctor->specialization->name ?? 'General Practice' }}
                        @endif
                    </div>
                    @endif
                    <div class="flex gap-2">
                    </div>
                </li>
                @endforeach
                @else
                <li class="p-6 rounded-md bg-slate-50 dark:bg-slate-700/30 text-center">
                    <span class="text-slate-500 dark:text-slate-400">No upcoming appointments</span>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection