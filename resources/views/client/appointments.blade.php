@props([
'title' => 'Appointments | MediCare',
])

@extends('layouts.client')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">My Appointments</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Manage your scheduled appointments and book new visits</p>
        </div>
        <div class="mt-4 md:mt-0 space-x-2">
            <flux:button variant="outline" icon="calendar">
                View Calendar
            </flux:button>
            <flux:button variant="outline" icon="list-bullet">
                List View
            </flux:button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                    <flux:icon.calendar class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Upcoming Appointments</p>
                    <!-- Replace with actual data of upcoming appointments -->
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $upcomingCount ?? 2 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-3">
                    <flux:icon.check-circle class="w-5 h-5 text-green-600 dark:text-green-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Completed</p>
                    <!-- Replace with actual data of completed appointments -->
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $completedCount ?? 2 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mr-3">
                    <flux:icon.clock class="h-5 w-5 text-amber-600 dark:text-amber-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Pending</p>
                    <!-- Replace with actual data of pending appointments -->
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $pendingCount ?? 1 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-4 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mr-3">
                    <flux:icon.x-circle class="h-5 w-5 text-red-600 dark:text-red-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Cancelled</p>
                    <!-- Replace with actual data of cancelled appointments -->
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $cancelledCount ?? 2 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar Component -->
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8 overflow-hidden">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Appointment Calendar</h2>
            <div class="flex items-center justify-center space-x-2">
                <flux:button variant="ghost" size="sm" id="prev-month">
                    <flux:icon.chevron-left class="h-4 w-4" />
                </flux:button>
                <span class="text-sm font-medium text-slate-700 dark:text-slate-300" id="calendar-title">April 2025</span>
                <flux:button variant="ghost" size="sm" id="next-month">
                    <flux:icon.chevron-right class="h-4 w-4" />
                </flux:button>
            </div>
        </div>

        <div class="p-4">
            <!-- Calendar will be rendered here -->
            <div id="appointment-calendar" class="h-96"></div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Upcoming Appointments</h2>
            <flux:dropdown position="bottom" align="end">
                <flux:button variant="ghost" size="sm" icon="funnel">
                    Filter
                </flux:button>
                <flux:menu>
                    <flux:menu.item>All Appointments</flux:menu.item>
                    <flux:menu.item>This Week</flux:menu.item>
                    <flux:menu.item>This Month</flux:menu.item>
                    <flux:menu.separator />
                    <flux:menu.item icon="users">By Doctor</flux:menu.item>
                    <flux:menu.item icon="building-office">By Clinic</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>

        <div class="divide-y divide-slate-200 dark:divide-slate-700">
            <!-- Replace with actual appointment data in a loop -->

            <div class="p-5 hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center shrink-0">
                            <flux:icon.calendar-days class="w-6 h-6 text-blue-600 dark:Text-blue-400" />
                        </div>
                        <div>
                            <div class="flex flex-wrap items-center gap-2 mb-1">
                                <h3 class="text-md font-medium text-slate-900 dark:text-white">Regular Check-up</h3>
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">
                                    <!-- Replace with actual data of appointment status -->
                                    Scheduled
                                </span>
                            </div>
                            <div class="flex flex-wrap items-center text-sm text-slate-600 dark:text-slate-300 gap-3 mb-2">
                                <div class="flex items-center">
                                    <flux:icon.user-circle class="w-4 h-4 mr-1" />
                                    <!-- Replace with actual data of doctor name -->
                                    Dr. Jani Junard
                                </div>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="flex items-center text-slate-700 dark:text-slate-300">
                                    <flux:icon.calendar class="w-4 h-4 mr-1" />
                                    <!-- Replace with actual data of appointment date -->
                                    April 17, 2004
                                </div>
                                <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                                <div class="flex items-center text-slate-700 dark:text-slate-300">
                                    <flux:icon.clock class="w-4 h-4 mr-1" />
                                    <!-- Replace with actual data of appointment time -->
                                    10:30 AM
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 md:justify-end">
                        <flux:button variant="outline" size="sm" icon="map-pin">
                            Directions
                        </flux:button>
                        <flux:button variant="outline" size="sm" icon="pencil">
                            Reschedule
                        </flux:button>
                        <flux:button variant="outline" size="sm" icon="x-mark" class="text-red-600 dark:text-red-400">
                            Cancel
                        </flux:button>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 text-center">
            <flux:button variant="ghost" class="w-full sm:w-auto" icon="chevron-down">
                Load More
            </flux:button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.clock-fading class="w-5 h-5 text-blue-500 mr-2" />
                Recent Appointments
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-700/50">
                        <tr>
                            <th class="px-4 py-3 font-medium">Date</th>
                            <th class="px-4 py-3 font-medium">Type</th>
                            <th class="px-4 py-3 font-medium">Doctor</th>
                            <th class="px-4 py-3 font-medium">Status</th>
                            <th class="px-4 py-3 font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:Divide-slate-700">
                        <!-- Replace with actual appointment history data -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors">
                            <td class="px-4 py-3 text-slate-900 dark:text-white">
                                <!-- Replace with actual data of appointment date -->
                                April 17, 2004
                            </td>
                            <td class="px-4 py-3 text-slate-700 dark:text-slate-300">Blood Test</td>
                            <td class="px-4 py-3 text-slate-700 dark:text-white">
                                <!-- Replace with actual data of doctor -->
                                Dr. Jani Junard
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 rounded">
                                    <!-- Replace with actual data of appointment status -->
                                    Completed
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2">
                                    <flux:button variant="ghost" size="xs" icon="document-text">
                                        Notes
                                    </flux:button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 border-t border-slate-200 dark:border-slate-700 text-center">
                <flux:button variant="ghost" class="w-full sm:w-auto" icon="chevron-down">
                    View History
                </flux:button>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5">
            <div class="mb-6">
                <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-3 flex items-center">
                    <flux:icon.user-group class="w-5 h-5 text-blue-500 mr-2" />
                    Your Doctors
                </h3>

                <div class="space-y-3">
                    <div class="flex items-center p-3 bg-slate-50 dark:bg-slate-700/30 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                            <!-- Replace with actual profile picture -->
                            <flux:icon.user class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-slate-900 dark:text-white truncate">
                                <!-- Replace with doctor's actual name from doctors table -->
                                Dr. Jani Junard
                            </p>
                        </div>
                        <flux:button variant="ghost" size="xs" icon="calendar-days">
                            Book
                        </flux:button>
                    </div>
                </div>
                <div class="mt-3">
                    <flux:button variant="ghost" size="sm" class="w-full text-blue-600 dark:text-blue-400" icon="arrow-right">
                        View All Doctors
                    </flux:button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-3 flex items-center">
            <flux:icon.bell-alert class="w-5 h-5 text-purple-500 mr-2" />
            Health Reminders
        </h3>

        <!-- Reminders - Can be generated from appointment history, upcoming appointments, etc. -->
        <div class="space-y-3">
            <div class="p-3 bg-amber-50 dark:bg-amber-900/10 border border-amber-100 dark:border-amber-900/20 rounded-lg">
                <div class="flex items-start">
                    <flux:icon.exclamation-circle class="w-5 h-5 text-amber-500 mr-2 mt-0.5" />
                    <div>
                        <p class="text-sm font-medium text-amber-800 dark:text-amber-200">
                            Blood Test Due
                        </p>
                        <p class="text-xs text-amber-700 dark:text-amber-300">
                            Your annual blood test is overdue by 2 weeks.
                        </p>
                        <div class="mt-2">
                            <flux:button variant="ghost" size="xs" class="text-amber-700 dark:text-amber-300" icon="calendar-days">
                                Schedule Now
                            </flux:button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
