@props([
'title' => 'Dashboard | MediCare',
])
@extends('layouts.client')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Welcome back, {{ $user->first_name }}!</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Your health overview and upcoming appointments</p>
        </div>
        <div class="mt-4 md:mt-0">
            <flux:button href="{{ route('client.schedule') }}" icon="calendar-plus" variant="primary">
                Book New Appointment
            </flux:button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-4">
                    <flux:icon.clock class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Visits</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalVisits ?? 0 }}</p>
                </div>
            </div>
            <div class="mt-4 h-1 w-full bg-slate-100 dark:bg-slate-700 rounded">
                <div class="h-1 bg-blue-500 rounded" style="width: {{ isset($recentVisitsPercentage) ? "{$recentVisitsPercentage}%" : '25%' }}"></div>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2">
                {{ $recentVisits->count() }} visits in the last 90 days
            </p>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-4">
                    <flux:icon.calendar class="h-6 w-6 text-green-600 dark:text-green-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Last Checkup</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $lastCheckup ?? 'None' }}</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    @if(isset($daysSinceLastCheckup))
                    <span class="font-medium text-green-600 dark:text-green-400">{{ $daysSinceLastCheckup }} days ago</span>
                    @endif
                    @if(isset($appointments) && $appointments->isNotEmpty() && isset($appointments->first()->doctor))
                    with Dr. {{ $appointments->first()->doctor->last_name }}
                    @endif
                </p>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-4">
                    <flux:icon.calendar-days class="h-6 w-6 text-purple-600 dark:text-purple-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Upcoming Appointments</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $upcomingAppointments ?? 0 }}</p>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="inline-block w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                <span class="text-xs text-slate-700 dark:text-slate-300">
                    Next appointment: {{ $nextAppointment ?? 'None scheduled' }}
                </span>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mr-4">
                    <flux:icon.user-group class="h-6 w-6 text-amber-600 dark:text-amber-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Doctors Seen</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">
                        {{ isset($preferredDoctors) ? count($preferredDoctors) : 0 }}
                    </p>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="inline-block w-2 h-2 bg-amber-500 rounded-full mr-2"></span>
                <span class="text-xs text-slate-700 dark:text-slate-300">
                    Most visited:
                    @if(isset($preferredDoctors) && count($preferredDoctors) > 0)
                    Dr. {{ $preferredDoctors[0]->first_name }} {{ $preferredDoctors[0]->last_name }}
                    @else
                    No preferred doctors
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Upcoming Appointments</h2>
                <flux:button href="{{ route('client.schedule') }}" variant="ghost" size="sm">
                    View All
                </flux:button>
            </div>

            <div class="p-5">
                @if(isset($scheduleAppointments) && $scheduleAppointments->isNotEmpty())
                @foreach($scheduleAppointments as $appointment)
                <div class="bg-slate-50 dark:bg-slate-700/30 p-4 rounded-lg border border-slate-200 dark:border-slate-700 mb-4 last:mb-0 transition-all hover:shadow-sm">
                    <div class="flex justify-between items-center mb-2">
                        <span class="inline-block px-2 py-0.5 text-xs bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 rounded">
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                        </span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('h:i A') }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-slate-900 dark:text-white">
                                @if(isset($appointment->doctor))
                                Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
                                @else
                                Appointment
                                @endif
                            </p>
                            @if(isset($appointment->doctor->specialization))
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                {{ $appointment->doctor->specialization->name ?? 'General Practice' }}
                            </p>
                            @endif
                        </div>
                        <flux:button variant="outline" size="sm" icon="document-text">
                            Details
                        </flux:button>
                    </div>
                </div>
                @endforeach
                @else
                <div class="text-center p-6">
                    <flux:icon.calendar class="w-12 h-12 text-slate-300 dark:text-slate-600 mx-auto mb-3" />
                    <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-1">No upcoming appointments</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Book your first appointment with our trusted doctors
                    </p>
                    <div class="mt-4">
                        <flux:button href="{{ route('client.schedule') }}" variant="primary">
                            Book Appointment
                        </flux:button>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.academic-cap class="w-5 h-5 text-green-500 mr-2" />
                Recent Specialties
            </h3>

            <ul class="space-y-3">
                @if(isset($recentSpecialties) && count($recentSpecialties) > 0)
                @foreach($recentSpecialties as $specialty)
                <li class="p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-medium text-slate-900 dark:text-white">
                            {{ $specialty->name }}
                        </span>
                        <span class="inline-block px-2 py-0.5 text-xs bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 rounded">
                            {{ $specialty->visit_count }} visits
                        </span>
                    </div>
                    @if(isset($specialty->last_visit_date))
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Last visit: {{ $specialty->last_visit_date }}
                    </p>
                    @endif
                </li>
                @endforeach
                @else
                <li class="p-6 rounded-md bg-slate-50 dark:bg-slate-700/30 text-center">
                    <span class="text-slate-500 dark:text-slate-400">
                        No specialty visits recorded
                    </span>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection