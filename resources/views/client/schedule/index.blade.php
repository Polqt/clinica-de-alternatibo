@props([
'title' => 'Schedule | MediCare',
]);

@extends('layouts.client')
@section('content')

<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Schedule</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400">Manage your upcming clinic appointments</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <flux:button variant="outline" icon="calendar">Today</flux:button>
            <flux:button variant="primary" icon="plus">New Appointment</flux:button>
        </div>
    </div>

    <div class="bg-slate-50 dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-6">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700 flex flex-col lg:flex-row items-center justify-between">
            <div class="flex items-center space-x-4 mb-4 lg:mb-0">
                <div class="flex items-center">
                    <flux:button variant="subtle" icon="chevron-left" aria-label="Previous month" x-on:click="previousMonth()" class="text-slate-500"></flux:button>
                    <h2 class="text-lg font-medium text-slate-900 dark:text-white px-2" x-text="currentMonthName + '' + currentYear">April 2025</h2>
                    <flux:button variant="subtle" icon="chevron-right" aria-label="Next month" x-on:click="nextMonth()" class="text-slate-500"></flux:button>
                </div>
                <div class="flex space-x-2">
                    <flux:button variant="outline" size="sm" x-on:click="switchView('month')" x-bind:class="{ 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : currentView == 'month }">Month</flux:button>
                    <flux:button variant="outline" size="sm" x-on:click="switchView('week')" x-bind:class="{ 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : currentView == 'week }">Week</flux:button>
                    <flux:button variant="outline" size="sm" x-on:click="switchView('day')" x-bind:class="{ 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : currentView == 'day }">Day</flux:button>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <flux:dropdown position="bottom" align="center">
                    <flux:button variant="outline" icon="funnel" class="text-sm">Filter</flux:button>
                    <flux:menu>
                        <flux:menu.item icon="check">All Appointments</flux:menu.item>
                        <flux:menu.item>General Checkup</flux:menu.item>
                        <flux:menu.item>Specialist Visit</flux:menu.item>
                        <flux:menu.item>Lab Tests</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
                <flux:input class="hidden md:flex" aria-placeholder="Search appointments..." icon="magnifying-glass" />
            </div>
        </div>

        <!-- Full Calendar Implementation -->
        <div id="calendar" class="p-4"></div>
    </div>
</div>

@endsection