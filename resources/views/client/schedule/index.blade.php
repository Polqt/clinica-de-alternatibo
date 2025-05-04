@props([
'title' => 'Schedule | MediCare',
]);

@extends('layouts.client')
@section('content')

<div class="container mx-auto px-4 py-6">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Schedule</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400">Manage your upcoming clinic appointments</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <flux:button variant="outline" icon="calendar" data-calendar-today>Today</flux:button>
            <flux:modal.trigger name="create_appointment">
                <flux:button variant="primary" icon="plus">New Appointment</flux:button>
            </flux:modal.trigger>
        </div>
    </div>

    <div class="mb-4 flex space-x-2">
        <button type="button" data-calendar-view="dayGridMonth" class="px-3 py-1.5 rounded-md bg-primary-50 text-primary-600 dark:bg-primary-900/50 dark:text-primary-400 text-sm font-medium">
            Month
        </button>
        <button type="button" data-calendar-view="timeGridWeek" class="px-3 py-1.5 rounded-md text-slate-600 dark:text-slate-400 text-sm font-medium">
            Week
        </button>
        <button type="button" data-calendar-view="listWeek" class="px-3 py-1.5 rounded-md text-slate-600 dark:text-slate-400 text-sm font-medium">
            List
        </button>
    </div>

    <div class="mb-4 bg-white dark:bg-slate-900 rounded-lg p-3 border border-slate-200 dark:border-slate-700 flex flex-wrap gap-3">
        <p class="text-xs text-slate-500 dark:text-slate-400 mr-2 self-center">Appointment Status:</p>
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

    <div class="bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-6 overflow-hidden">
        <div id="calendar"
            class="p-4"
        </div>
    </div>

    @if(empty(json_decode($calendarEvents)))
    <div class="text-center mt-4">
        <div class="flex justify-center mb-4">
            <flux:icon.calendar class="w-16 h-16 text-slate-300 dark:text-slate-600" />
        </div>
        <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">No Appointments Yet</h3>
        <p class="text-slate-500 dark:text-slate-400 mt-2 max-w-md mx-auto">You don't have any scheduled appointments. Click "New Appointment" to schedule your first appointment with our clinic.</p>
        @endif
    </div>
</div>

@include('client.schedule.create')
@include('client.schedule.edit')
@include('client.schedule.delete')

<script>
    const calendarEvents = @json($calendarEvents);
</script>

@endsection