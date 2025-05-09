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

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-700/50">
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400">
                            Patient
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400">
                            Doctor
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400">
                            Date & Time
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400">
                            Status
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse ($appointments as $appointment)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                        <td class="p-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center text-blue-600 dark:text-blue-400 font-medium text-sm">
                                    {{ substr($appointment->patient->user->first_name ?? 'U', 0, 1) }}
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-slate-900 dark:text-white">{{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}</div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400">ID: {{ $appointment->patient->patient_identifier }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-white">Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">{{ $appointment->doctor->specialization->name }}</div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-white">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('g:i A') }}</div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            @php
                            $statusClass = match($appointment->status) {
                            'pending' => 'bg-amber-100 dark:bg-amber-900/40 text-amber-800 dark:text-amber-300',
                            'confirmed' => 'bg-blue-100 dark:bg-blue-900/40 text-blue-800 dark:text-blue-300',
                            'completed' => 'bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-300',
                            'cancelled_patient', 'cancelled_clinic' => 'bg-red-100 dark:bg-red-900/40 text-red-800 dark:text-red-300',
                            default => 'bg-slate-100 dark:bg-slate-700 text-slate-800 dark:text-slate-300'
                            };

                            $statusLabel = match($appointment->status) {
                            'pending' => 'Pending',
                            'confirmed' => 'Confirmed',
                            'completed' => 'Completed',
                            'cancelled_patient' => 'Cancelled (Patient)',
                            'cancelled_clinic' => 'Cancelled (Clinic)',
                            default => ucfirst($appointment->status)
                            };
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </td>
                        <td class="p-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                @if($appointment->status === 'pending')
                                <flux:modal.trigger name="confirm-appointment-{{ $appointment->id }}">
                                    <flux:button variant="ghost" size="sm" icon="check" tooltip="Approve"
                                        x-data @click.prevent="$dispatch('open-modal', 'confirm-appointment-{{ $appointment->id }}')">
                                        <span class="sr-only">Approve</span>
                                    </flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="cancel-appointment-{{ $appointment->id }}">
                                    <flux:button variant="ghost" size="sm" icon="x-mark" tooltip="Cancel"
                                        x-data @click="$dispatch('open-modal', 'cancel-appointment-{{ $appointment->id }}')">
                                        <span class="sr-only">Cancel</span>
                                    </flux:button>
                                </flux:modal.trigger>
                                @endif

                                <flux:modal.trigger name="reschedule-appointment-{{ $appointment->id }}">
                                    <flux:button variant="ghost" size="sm" icon="pencil-square" tooltip="Edit"
                                        x-data @click="$dispatch('open-modal', 'reschedule-appointment-{{ $appointment->id }}')">
                                        <span class="sr-only">Reschedule</span>
                                    </flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="view-appointment-{{ $appointment->id }}">
                                    <flux:button variant="ghost" size="sm" icon="eye" tooltip="View Details"
                                        x-data @click="$dispatch('open-modal', 'view-appointment-{{ $appointment->id }}')">
                                        <span class="sr-only">View</span>
                                    </flux:button>
                                </flux:modal.trigger>

                                @if($appointment->status === 'confirmed')
                                <flux:modal.trigger name="complete-appointment-{{ $appointment->id }}">
                                    <flux:button variant="ghost" size="sm" icon="check-circle" tooltip="Mark as Complete"
                                        x-data @click="$dispatch('open-modal', 'complete-appointment-{{ $appointment->id }}')">
                                        <span class="sr-only">Complete</span>
                                    </flux:button>
                                </flux:modal.trigger>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500 dark:text-slate-400">
                            No appointments found.
                            <flux:button variant="link" x-data @click="$dispatch('open-modal', 'schedule-appointment')">
                                Schedule one now
                            </flux:button>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

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