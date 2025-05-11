@props([
'title' => 'Appointments | Medicare',
])

@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Appointment Management</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">View and manage all clinic appointments</p>
        </div>
        <div class="mt-4 md:mt-0 space-x-2">
            <flux:button icon="plus" x-data @click="$dispatch('open-modal', 'schedule-appointment')">
                New Appointment
            </flux:button>
        </div>
    </div>

    <div class="mb-6">
        <div class="border-b border-slate-200 dark:border-slate-700">
            <nav class="flex -mb-px overflow-x-auto">
                <a href="{{ route('admin.appointments') }}" class="{{ !request('status') ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300' }} py-3 px-4 text-sm font-medium">
                    All
                    <span class="ml-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 py-0.5 px-2 rounded-full text-xs">
                        {{ $statusCounts['all'] }}
                    </span>
                </a>
                <a href="{{ route('admin.appointments', ['status' => 'pending']) }}" class="{{ request('status') == 'pending' ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300' }} py-3 px-4 text-sm font-medium">
                    Pending
                    <span class="ml-1 bg-amber-100 dark:bg-amber-900/40 text-amber-800 dark:text-amber-300 py-0.5 px-2 rounded-full text-xs">
                        {{ $statusCounts['pending'] }}
                    </span>
                </a>
                <a href="{{ route('admin.appointments', ['status' => 'confirmed']) }}" class="{{ request('status') == 'confirmed' ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300' }} py-3 px-4 text-sm font-medium">
                    Confirmed
                    <span class="ml-1 bg-blue-100 dark:bg-blue-900/40 text-blue-800 dark:text-blue-300 py-0.5 px-2 rounded-full text-xs">
                        {{ $statusCounts['confirmed'] }}
                    </span>
                </a>
                <a href="{{ route('admin.appointments', ['status' => 'completed']) }}" class="{{ request('status') == 'completed' ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300' }} py-3 px-4 text-sm font-medium">
                    Completed
                    <span class="ml-1 bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-300 py-0.5 px-2 rounded-full text-xs">
                        {{ $statusCounts['completed'] }}
                    </span>
                </a>
                <a href="{{ route('admin.appointments', ['status' => 'cancelled']) }}" class="{{ request('status') == 'cancelled' ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300' }} py-3 px-4 text-sm font-medium">
                    Cancelled
                    <span class="ml-1 bg-red-100 dark:bg-red-900/40 text-red-800 dark:text-red-300 py-0.5 px-2 rounded-full text-xs">
                        {{ $statusCounts['cancelled'] }}
                    </span>
                </a>
            </nav>
        </div>
    </div>

    <div class="space-y-4">
        @forelse ($appointments as $appointment)
        @php
        $statusConfig = match($appointment->status) {
        'pending' => [
        'bg' => 'bg-amber-50 dark:bg-amber-900/10',
        'border' => 'border-amber-200 dark:border-amber-800',
        'icon' => 'clock',
        'iconClass' => 'text-amber-600 dark:text-amber-400',
        'label' => 'Pending'
        ],
        'confirmed' => [
        'bg' => 'bg-blue-50 dark:bg-blue-900/10',
        'border' => 'border-blue-200 dark:border-blue-800',
        'icon' => 'calendar',
        'iconClass' => 'text-blue-600 dark:text-blue-400',
        'label' => 'Confirmed'
        ],
        'completed' => [
        'bg' => 'bg-green-50 dark:bg-green-900/10',
        'border' => 'border-green-200 dark:border-green-800',
        'icon' => 'check-circle',
        'iconClass' => 'text-green-600 dark:text-green-400',
        'label' => 'Completed'
        ],
        'cancelled_patient', 'cancelled_clinic' => [
        'bg' => 'bg-red-50 dark:bg-red-900/10',
        'border' => 'border-red-200 dark:border-red-800',
        'icon' => 'x-circle',
        'iconClass' => 'text-red-600 dark:text-red-400',
        'label' => str_contains($appointment->status, 'patient') ? 'Cancelled (Patient)' : 'Cancelled (Clinic)'
        ],
        default => [
        'bg' => 'bg-slate-50 dark:bg-slate-800',
        'border' => 'border-slate-200 dark:border-slate-700',
        'icon' => 'calendar',
        'iconClass' => 'text-slate-600 dark:text-slate-400',
        'label' => ucfirst($appointment->status)
        ]
        };
        @endphp

        <div class="rounded-lg shadow-sm border {{ $statusConfig['border'] }} {{ $statusConfig['bg'] }} transition-all hover:shadow-md">
            <div class="p-4 sm:p-5">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                            <img src="{{ asset('storage/' . ($appointment->patient->user->profile->profile_picture ?? '')) }}" class="h-full w-full object-cover">
                        </div>

                        <div>
                            <div class="flex items-center space-x-2">
                                <h3 class="font-medium text-slate-900 dark:text-white">{{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}</h3>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ str_replace('bg', 'bg', $statusConfig['bg']) }} {{ str_replace('text-', 'text-', $statusConfig['iconClass']) }}">
                                    <flux:icon name="{{ $statusConfig['icon'] }}" class="w-3 h-3 mr-1" />
                                    {{ $statusConfig['label'] }}
                                </span>
                            </div>

                            <div class="mt-1 flex items-center space-x-4 text-sm">
                                <div class="flex items-center text-slate-500 dark:text-slate-400">
                                    <flux:icon name="user-circle" class="w-4 h-4 mr-1" />
                                    <span>ID: {{ $appointment->patient->patient_identifier }}</span>
                                </div>
                                <div class="flex items-center text-slate-500 dark:text-slate-400">
                                    <flux:icon name="stethoscope" class="w-4 h-4 mr-1" />
                                    <span>Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</span>
                                </div>
                            </div>

                            <div class="mt-2 flex items-center space-x-4 text-sm">
                                <div class="flex items-center text-slate-500 dark:text-slate-400">
                                    <flux:icon name="calendar" class="w-4 h-4 mr-1" />
                                    <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center text-slate-500 dark:text-slate-400">
                                    <flux:icon name="clock" class="w-4 h-4 mr-1" />
                                    <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('g:i A') }}</span>
                                </div>
                                <div class="flex items-center text-slate-500 dark:text-slate-400">
                                    <flux:icon name="tag" class="w-4 h-4 mr-1" />
                                    <span>{{ $appointment->doctor->specialization->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mt-4 md:mt-0">
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" @click.away="open = false" class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <flux:icon name="ellipsis-vertical" class="w-5 h-5 text-slate-600 dark:text-slate-300" />
                            </button>

                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white dark:bg-slate-800 ring-1 ring-black ring-opacity-5 z-10"
                                style="display: none;">

                                <flux:modal.trigger name="view-appointment-{{ $appointment->id }}"
                                    class="flex items-center w-full px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700">
                                    <flux:icon name="eye" class="mr-2 h-4 w-4" />
                                    View Details
                                </flux:modal.trigger>

                                @if($appointment->status === 'pending')
                                <flux:modal.trigger name="confirm-appointment-{{ $appointment->id }}"
                                    class="flex items-center w-full px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700">
                                    <flux:icon name="check" class="mr-2 h-4 w-4 text-green-600" />
                                    Confirm
                                </flux:modal.trigger>

                                <flux:modal.trigger name="cancel-appointment-{{ $appointment->id }}"
                                    class="flex items-center w-full px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700">
                                    <flux:icon name="x" class="mr-2 h-4 w-4 text-red-600" />
                                    Cancel
                                </flux:modal.trigger>
                                @endif

                                @if($appointment->status === 'confirmed')
                                <flux:modal.trigger name="complete-appointment-{{ $appointment->id }}"
                                    class="flex items-center w-full px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700">
                                    <flux:icon name="check-circle" class="mr-2 h-4 w-4 text-green-600" />
                                    Complete
                                </flux:modal.trigger>
                                @endif

                                @if(in_array($appointment->status, ['pending', 'confirmed']))
                                <flux:modal.trigger name="edit-appointment-{{ $appointment->id }}"
                                    class="flex items-center w-full px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700">
                                    <flux:icon name="calendar-plus" class="mr-2 h-4 w-4 text-blue-600" />
                                    Reschedule
                                </flux:modal.trigger>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-8 text-center">
            <div class="inline-flex rounded-full bg-slate-100 dark:bg-slate-700 p-3 mb-4">
                <flux:icon name="calendar-x" class="h-6 w-6 text-slate-500 dark:text-slate-400" />
            </div>
            <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-2">No appointments found</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">There are no appointments matching your criteria.</p>
            <flux:button x-data @click="$dispatch('open-modal', 'schedule-appointment')" icon="plus">
                Schedule an appointment
            </flux:button>
        </div>
        @endforelse
    </div>
    <div class="mt-6">
        <x-pagination :paginator="$appointments" />
    </div>
</div>

@foreach ($appointments as $appointment)
@include('admin.appointments.view', ['appointment' => $appointment])
@include('admin.appointments.reschedule', ['appointment' => $appointment, 'doctors' => $doctors])
@include('admin.appointments.cancel', ['appointment' => $appointment])
@include('admin.appointments.confirm', ['appointment' => $appointment])
@include('admin.appointments.complete', ['appointment' => $appointment])
@endforeach

@endsection