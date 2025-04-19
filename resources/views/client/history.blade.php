@props([
'title' => 'Medical History | MediCare',
])

@extends('layouts.client')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Medical History</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400">Your complete medical record and past visit</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <flux:dropdown position="bottom" align="center">
                <flux:button variant="outline" icon="document-arrow-down">Export</flux:button>
                <flux:menu>
                    <flux:menu.item icon="document-text">Export as PDF</flux:menu.item>
                    <flux:menu.item icon="table-cells">Export as CSV</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 flex items-center">
            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-slate-500 dark:Text-slate-400">Total Visits</p>
                <!-- TODO: Update with actual data -->
                <p class="text-xl font-bold text-slate-900 dark:text-white">24</p>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 flex items-center">
            <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Last Checkup</p>
                <!-- TODO: Update with actual data -->
                <p class="text-xl font-bold text-zinc-900 dark:text-white">Mar 15, 2025</p>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 flex items-center">
            <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Ongoing Treatments</p>
                <!-- TODO: Update with actual data -->
                <p class="text-xl font-bold text-zinc-900 dark:text-white">2</p>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-4 mb-6 shadow-sm border border-slate-200 dark:border-slate-700">
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <div class="flex-1">
                <flux:input class="w-full" icon="magnifying-glass" aria-placeholder="Search by doctor, condition, or treatment..." />
            </div>
            <div class="flex space-x-3">
                <flux:dropdown position="bottom" align="center">
                    <flux:button variant="outline" icon="funnel" class="w-full md:w-auto">
                        Filter By
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>All Records</flux:menu.item>
                        <flux:menu.item>Doctor Visits</flux:menu.item>
                        <flux:menu.item>Lab Results</flux:menu.item>
                        <flux:menu.item>Prescriptions</flux:menu.item>
                        <flux:menu.item>Treatments</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6"></div>
</div>

@endsection