@props([
'title' => 'Schedule | MediCare',
]);

@extends('layouts.client')
@section('content')

<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Schedule</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400">Manage your upcoming clinic appointments</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <flux:button variant="outline" icon="calendar">Today</flux:button>
            <flux:modal.trigger name="create_appointment">
                <flux:button variant="primary" icon="plus">New Appointment</flux:button>
            </flux:modal.trigger>
        </div>
    </div>

    <div class="bg-slate-50 dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-6">
        <div id="calendar" class="p-4"></div>
    </div>
</div>
</div>

@include('client.schedule.create')
@endsection