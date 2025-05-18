@props([
'title' => 'Schedule | MediCare',
])

@extends('layouts.client')
@section('content')

<div class="container mx-auto px-4 py-4 sm:py-6">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Schedule</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400">Manage your upcoming clinic appointments</p>
        </div>

        <div class="hidden sm:flex items-center gap-3">
            <flux:modal.trigger name="create_appointment">
                <flux:button variant="primary" icon="plus" class="text-sm">New Appointment</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="edit_appointment" data-flux-trigger="edit_appointment">
                <flux:button variant="outline" icon="pencil" class="text-sm">Edit</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="delete_appointment" data-flux-trigger="delete_appointment">
                <flux:button variant="outline" icon="trash" class="text-sm">Cancel</flux:button>
            </flux:modal.trigger>
        </div>

        <div class="sm:hidden grid grid-cols-2 gap-3">
            <flux:modal.trigger name="create_appointment" class="col-span-2">
                <flux:button variant="primary" icon="plus" class="w-full">New Appointment</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="edit_appointment" data-flux-trigger="edit_appointment">
                <flux:button variant="outline" icon="pencil" class="w-full">Edit</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="delete_appointment" data-flux-trigger="delete_appointment">
                <flux:button variant="outline" icon="trash" class="w-full">Cancel</flux:button>
            </flux:modal.trigger>
        </div>
    </div>

    <div class="mb-4 bg-white dark:bg-slate-900 rounded-lg p-2 sm:p-3 border border-slate-200 dark:border-slate-700">
        <div class="flex flex-wrap gap-2 sm:gap-3">
            <p class="text-xs text-slate-500 dark:text-slate-400 mr-1 sm:mr-2 self-center w-full sm:w-auto">Appointment Status:</p>
            <div class="flex flex-wrap gap-2 sm:gap-3">
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 rounded-full bg-blue-500 mr-1.5"></span>
                    <span class="text-xs text-slate-700 dark:text-slate-300">Scheduled</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 rounded-full bg-indigo-500 mr-1.5"></span>
                    <span class="text-xs text-slate-700 dark:text-slate-300">Confirmed</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 rounded-full bg-green-500 mr-1.5"></span>
                    <span class="text-xs text-slate-700 dark:text-slate-300">Completed</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 rounded-full bg-amber-500 mr-1.5"></span>
                    <span class="text-xs text-slate-700 dark:text-slate-300">Rescheduled</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 rounded-full bg-red-500 mr-1.5"></span>
                    <span class="text-xs text-slate-700 dark:text-slate-300">Cancelled</span>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-4 p-3 sm:p-4 bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded">
        <div class="flex">
            <div class="flex-shrink-0">
                <flux:icon.check-circle class="w-5 h-5 text-green-500" />
            </div>
            <div class="ml-3">
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="mb-4 p-3 sm:p-4 bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded">
        <div class="flex">
            <div class="flex-shrink-0">
                <flux:icon.x-circle class="w-5 h-5 text-red-500" />
            </div>
            <div class="ml-3">
                <p class="text-sm">{{ session('error') }}</p>
            </div>
        </div>
    </div>
    @endif

    <div class="bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-6 overflow-hidden">
        <div class="px-3 sm:px-4 py-2 sm:py-3 border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-1">
                <flux:heading size="sm" class="text-slate-900 dark:text-white">Your Appointments</flux:heading>
                <flux:text class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">Click on an appointment to edit or cancel</flux:text>
            </div>
        </div>
        <div id="calendar" class="p-2 sm:p-4 overflow-x-auto"></div>
    </div>

    @if(empty(json_decode($calendarEvents)))
    <div class="text-center m-4">
        <div class="flex justify-center mb-4">
            <flux:icon.calendar class="w-12 h-12 sm:w-16 sm:h-16 text-slate-300 dark:text-slate-600" />
        </div>
        <h3 class="text-base sm:text-lg font-semibold text-slate-700 dark:text-slate-300">No Appointments Yet</h3>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-2 max-w-md mx-auto">You don't have any scheduled appointments. Click "New Appointment" to schedule your first appointment with our clinic.</p>
    </div>
    @endif
</div>

@include('client.schedule.create')
@include('client.schedule.edit')
@include('client.schedule.delete')

<script>
    const calendarEvents = @json($calendarEvents);
</script>

@endsection