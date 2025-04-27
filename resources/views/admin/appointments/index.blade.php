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
        <div class="mt-4 md:mt-0 space-x-2"></div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <flux:input
                    icon="magnifying-glass"
                    aria-placeholder="Search by patient name, doctor, or appointment ID..." />
            </div>
            <div class="flex flex-wrap gap-2">
                <flux:dropdown position="bottom" align="start">
                    <flux:button variant="outline" icon="funnel">
                        Status
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>All Statuses</flux:menu.item>
                        <flux:menu.separator />
                        <flux:menu.item>Scheduled</flux:menu.item>
                        <flux:menu.item>Pending</flux:menu.item>
                        <flux:menu.item>Confirmed</flux:menu.item>
                        <flux:menu.item>Coompleted</flux:menu.item>
                        <flux:menu.item>Cancelled</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>

                <flux:dropdown position="bottom" align="start">
                    <flux:button variant="outline" icon="calendar-days">
                        Date Range
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>Today</flux:menu.item>
                        <flux:menu.item>This Week</flux:menu.item>
                        <flux:menu.item>This Month</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>

                <flux:dropdown position="bottom" align="start">
                    <flux:button variant="outline" icon="USER-CIRCLE">
                        Doctor
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>All Doctors</flux:menu.item>
                        <flux:menu.separator />
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 mt-3">
            <div class="inline-flex items-center bg-slate-100 dark:bg-slate-700 text-xs px-2 py-1 rounded">
                Status: Pending
                <!-- TODO: Change to dynamic status -->
                <button class="ml-1 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">
                    <flux:icon.x-mark class="h-3 w-3" />
                </button>
            </div>
            <div class="inline-flex items-center bg-slate-100 dark:bg-slate-700 text-xs px-2 py-1 rounded">
                Date: This Week
                <!-- TODO: Change to dynamic status -->
                <button class="ml-1 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">
                    <flux:icon.x-mark class="h-3 w-3" />
                </button>
            </div>
        </div>
    </div>


    <div class="mb-6">
        <div class="border-b border-slate-200 dark:border-slate-700">
            <nav class="flex -mb-px overflow-x-auto">
                <button class="text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400 py-3 px-4 text-sm font-medium">
                    All
                    <span class="ml-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 py-0.5 px-2 rounded-full text-xs">
                        128
                    </span>
                </button>
                <button class="text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300 py-3 px-4 text-sm font-medium">
                    Pending
                    <span class="ml-1 bg-amber-100 dark:bg-amber-900/40 text-amber-800 dark:text-amber-300 py-0.5 px-2 rounded-full text-xs">
                        24
                    </span>
                </button>
                <button class="text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300 py-3 px-4 text-sm font-medium">
                    Confirmed
                    <span class="ml-1 bg-blue-100 dark:bg-blue-900/40 text-blue-800 dark:text-blue-300 py-0.5 px-2 rounded-full text-xs">
                        42
                    </span>
                </button>
                <button class="text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300 py-3 px-4 text-sm font-medium">
                    Completed
                    <span class="ml-1 bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-300 py-0.5 px-2 rounded-full text-xs">
                        53
                    </span>
                </button>
                <button class="text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300 py-3 px-4 text-sm font-medium">
                    Cancelled
                    <span class="ml-1 bg-red-100 dark:bg-red-900/40 text-red-800 dark:text-red-300 py-0.5 px-2 rounded-full text-xs">
                        9
                    </span>
                </button>
            </nav>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-70//50">
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                            Patient
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                            Doctor
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                            Date & Time
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                            Service
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                            Status
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Replace with actual data  -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                        <td class="p-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center text-blue-600 dark:text-blue-400 font-medium text-sm">
                                    Jani
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-slate-900 dark:text-white">Jul Maps</div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400">ID: 1001-PT</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-white">Dr. Ed Pota</div>
                            <div class="text-sm text-slate-900 dark:text-white">Emergency Medicine</div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-white">April 17, 2025</div>
                            <div class="text-sm text-slate-900 dark:text-white">9:30 AM</div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-white">Regular Checkup</div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 dark:bg-amber-900/40 text-amber-800 dark:text-amber-300">Pending</span>
                        </td>
                        <td class="p-4 whitespce-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <flux:button variant="ghost" size="sm" icon="check" tooltip="Approve">
                                    <span class="sr-only">Approve</span>
                                </flux:button>
                                <flux:button variant="ghost" size="sm" icon="x-mark" tooltip="Cancel">
                                    <span class="sr-only">Cancel</span>
                                </flux:button>
                                <flux:button variant="ghost" size="sm" icon="pencil-square" tooltip="Edit">
                                    <span class="sr-only">Edit</span>
                                </flux:button>
                                <flux:button variant="ghost" size="sm" icon="eye" tooltip="View Details">
                                    <span class="sr-only">View</span>
                                </flux:button>
                            </div>
                        </td>
                    </tr>

                    <!-- <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-cols">
                        <td class="p-4 whitespace-nowrap">
                            <div class="flex items-center">

                            </div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>

        <!-- TODO: Add pagination soon kay wala pa appointments -->

    </div>
</div>

@endsection