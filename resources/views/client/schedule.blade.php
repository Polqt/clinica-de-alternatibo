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

    <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-4 mb-6 shadow-sm border border-slate-200 dark:border-slate-700">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="flex items-center space-x-4 mb-4 lg:mb-0">
                <div class="flex items-center">
                    <flux:button variant="subtle" icon="chevron-left" aria-label="Previous month" class="text-slate-500"></flux:button>
                    <h2 class="text-lg font-medium text-slate-900 dark:text-white px-2">April 2025</h2>
                    <flux:button variant="subtle" icon="chevron-right" aria-label="Next month" class="text-slate-500"></flux:button>
                </div>
                <div class="flex space-x-2">
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
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm overflow-hidden border border-slate-200 dark:border-slate-700">
        <div class="grid grid-cols-8 border-b border-zinc-200 dark:border-zinc-700">
            <div class="p-4 text-center border-r border-zinc-200 dark:border-zinc-700">
                <p class="text-xs font-medium text-zinc-500 dark:text-zinc-400">TIME</p>
            </div>
            @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $index => $day)
            <div class="p-4 text-center {{ $index == 1 ? 'bg-blue-50 dark:bg-blue-900/20' : '' }}">
                <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300">{{ $day }}</p>
                <p class="text-xl font-bold {{ $index == 1 ? 'text-blue-600 dark:text-blue-400' : 'text-zinc-900 dark:text-white' }}">{{ $index + 15 }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-8">
        <div class="border-r border-slate-200 dark:border-slate-700">
            @foreach ( ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00' ] as $time)
            <div class="h-20 p-2 border-b border-slate-200 dark:border-slate-700">
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400">{{ $time }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection