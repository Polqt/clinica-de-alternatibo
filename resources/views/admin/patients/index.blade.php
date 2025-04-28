@props([
'title' => 'Patients | Medicare',
])

@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Patients Management</h1>
            <p class="text-sm text-slate-900 dark:text-slate-400 mt-1">Monitor and manage registered patients.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                    <flux:icon.users class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Patients</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $totalPatients ?? '' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mr-3">
                    <flux:icon.calendar-days class="w-6 h-6 text-amber-600 dark:text-amber-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Appointments Today</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $appointmentsToday ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <flux:input
                    icon="magnifying-glass"
                    aria-placeholder="Search by patient name, email, or appointment ID..." />
            </div>
            <div class="flex flex-wrap gap-2">
                <flux:dropdown position="bottom" align="start">
                    <flux:button variant="outline" icon="funnel">
                        Status
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>All Patients</flux:menu.item>
                        <flux:menu.separator />
                        <flux:menu.item>Active</flux:menu.item>
                        <flux:menu.item>Inactive</flux:menu.item>
                        <flux:menu.item>New Patients</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>

                <flux:dropdown position="bottom" align="start">
                    <flux:button variant="outline" icon="calendar-days">
                        Last Visit
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>Any Time</flux:menu.item>
                        <flux:menu.item>This Week</flux:menu.item>
                        <flux:menu.item>This Month</flux:menu.item>
                        <flux:menu.item>Never Visited</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8 overflow-hidden">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white ">Patient Directory</h2>
            <div class="flex items-center space-x-2">
                <flux:button variant="ghost">
                    Grid
                </flux:button>
                <flux:button variant="ghost">
                    List
                </flux:button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-700/50">
                    <tr>
                        <th class="px-4 py-3 font-medium">
                            <div class="flex items-center">
                                Patient
                            </div>
                        </th>
                        <th class="px-4 py-3 font-medium">Contact</th>
                        <th class="px-4 py-3 font-medium">Last Visit</th>
                        <th class="px-4 py-3 font-medium">Total Visits</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Loop through patients here -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                        <flux:icon.user class="w-5 h-5 text-purple-600 dark:text-purple-400" />
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-slate-900 dark:text-white">Jepoy Hidalgo</div>
                                    <div class="text-slate-500 dark:text-slate-400 text-xs">1</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="font-medium text-slate-900 dark:text-white">poyhidalgo@gmail.com</div>
                            <div class="text-slate-500 dark:text-slate-400 text-xs">Patient ID</div>
                        </td>
                        <td class="p-4 text-slate-300">
                            April 17, 2004
                        </td>
                        <td class="p-4 text-slate-300">
                            4
                        </td>
                        <td class="p-4">
                            <!-- TODO: Added status here -->
                        </td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <flux:dropdown position="bottom" align="end">
                                    <flux:button variant="ghost" size="sm" icon="ellipsis-vertical">

                                    </flux:button>
                                    <flux:menu>
                                        <flux:menu.item icon="clock">View History</flux:menu.item>
                                        <flux:menu.item icon="pencil">Edit Profile</flux:menu.item>
                                        <flux:menu.separator />
                                        <flux:menu.item icon="document-text">Medical Records</flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination here -->
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Recently Added Patients</h2>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-slate-50 dark:bg-slate-700/50 rounded-lg p-4 hover:shadow-md transition-all">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0 w-12 h-12">
                        <div class="w-12 h-12 rounded-full bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center">
                            <flux:icon.user class="w-6 h-6 text-cyan-600 dark:text-cyan-400" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 dark:text-white truncate">
                            Stal Guard
                        </p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Joined today.
                        </p>
                    </div>
                    <flux:button variant="ghost" size="sm" icon="arrow-up"></flux:button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white flex items-center mb-4">
                <flux:icon.chart-bar class="w-5 h-5 text-cyan-500 mr-2" />
                Patient Demographics
            </h3>
            <div class="h-64 flex justify-center items-center">
                <!-- Replace with a chart or graph -->
                <div class="text-center text-slate-500 dark:text-slate-400">
                    <flux:icon.chart-pie class="w-16 h-16 mx-auto mb-2 text-slate-400 dark:text-slate-500" />
                    <p class="">Age Distribution Chart</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white flex items-center mb-4">
                <flux:icon.chart-bar class="w-5 h-5 text-purple-500 mr-2" />
                Visit Frequency
            </h3>
            <div class="h-64 flex items-center justify-center">
                <!-- Replace with a chart or graph -->
                <div class="text-center text-slate-500 dark:text-slate-400">
                    <flux:icon.chart-line class="w-16 h-16 mx-auto mb-2 text-slate-400 dark:text-slate-500" />
                    <p>Visit Frequency Chart</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white flex items-center mb-4">
                <flux:icon.clock class="w-5 h-5 text-rose-500 mr-2" />
                Appointment Analytics
            </h3>
            <div class="h-64 flex items-center justify-center">
                <!-- Replace with a chart or graph -->
                <div class="text-center text-slate-500 dark:text-slate-400">
                    <flux:icon.chart-spline class="w-16 h-16 mx-auto mb-2 text-slate-400 dark:text-slate-500" />
                    <p>Appointment Analytics Chart</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
        <div class="flex items-center justify-center mb-4">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white flex items-center">
                <flux:icon.bell-ring class="w-5 h-5 text-amber-500 mr-2" />
                Patient Related Tasks
            </h3>
            <flux:button variant="outline" size="sm">

            </flux:button>
        </div>
    </div>
</div>
@endsection