@props([
'title' => 'Medical History | MediCare',
])

@extends('layouts.client')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Page Header with Filter Button -->
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Medical History</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Your complete medical records and past visits</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-2">
            <flux:input icon="magnifying-glass" placeholder="Search records..." size="sm" class="w-48" />
            <flux:dropdown position="bottom" align="end">
                <flux:button variant="outline" icon="funnel" size="sm">
                    Filter
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

    <!-- Health Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-4">
                    <flux:icon.clock class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Visits</p>
                    <!-- Replace with data of total visits -->
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">24</p>
                </div>
            </div>
            <div class="mt-4 h-1 w-full bg-slate-100 dark:bg-slate-700 rounded">
                <div class="h-1 bg-blue-500 rounded" style="width: 75%"></div>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2">6 visits in the last 90 days</p>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-4">
                    <flux:icon.calendar class="h-6 w-6 text-green-600 dark:text-green-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Last Checkup</p>
                    <!-- Replace with data of last checkup -->
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">Mar 15, 2025</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    <!-- Replace with data of days since last check up -->
                    <span class="font-medium text-green-600 dark:text-green-400">35 days ago</span> with Dr. Thompson
                </p>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-4">
                    <flux:icon.flask-conical class="h-6 w-6 text-purple-600 dark:text-purple-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Active Treatments</p>
                    <!-- Replace with data of active treatments -->
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">2</p>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="inline-block w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                <span class="text-xs text-slate-700 dark:text-slate-300">2 medications due for refill</span>
            </div>
        </div>
    </div>

    <!-- Medical Timeline -->
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Medical Timeline</h2>
            <flux:button variant="ghost" size="sm" icon="calendar">
                View Calendar
            </flux:button>
        </div>

        <div class="p-6">
            <div class="relative">
                <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-slate-200 dark:bg-slate-700"></div>

                <!-- Replace this with a loop through actual appointment data -->
                <div class="relative pl-12 pb-8">
                    <div class="absolute left-1.5 top-1 w-6 h-6 bg-blue-500 border-4 border-white dark:border-slate-800 rounded-full"></div>
                    <div class="bg-slate-50 dark:bg-slate-700/30 p-4 rounded-lg border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">
                                    <!-- Replace with data of appointment date -->
                                    Mar 15, 2025
                                </span>
                                <span class="ml-2 text-xs text-slate-500 dark:text-slate-400">
                                    <!-- Replace with data of appointment time }} -->
                                    10:30 AM
                                </span>
                            </div>
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 rounded">
                                <!-- Replace with data of appointment status -->
                                Completed
                            </span>
                        </div>

                        <h3 class="text-md font-medium text-slate-900 dark:text-white mb-1">
                            <!-- Replace with data of appointment notes -->
                            Check-up: Annual physical examination
                        </h3>

                        <div class="flex items-center text-sm text-slate-600 dark:text-slate-300 mb-3">
                            <flux:icon.user-circle class="h-4 w-4 mr-1" />
                            <!-- Replace with data of doctors name -->
                            Dr. Sarah Thompson
                            <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                            <flux:icon.building-office class="h-4 w-4 mr-1" />
                            <!-- Replace with data of clinic -->
                            Main Street Clinic
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-700 dark:text-slate-300">Blood Pressure</span>
                                <span class="font-medium text-slate-900 dark:text-white">120/80 mmHg</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-700 dark:text-slate-300">Heart Rate</span>
                                <span class="font-medium text-slate-900 dark:text-white">72 bpm</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-700 dark:text-slate-300">Weight</span>
                                <span class="font-medium text-slate-900 dark:text-white">165 lbs</span>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center gap-2">
                            <flux:button size="xs" variant="outline" icon="document-text">
                                View Report
                            </flux:button>
                            <flux:button size="xs" variant="ghost" icon="chat-bubble-left-right">
                                Notes
                            </flux:button>
                        </div>
                    </div>
                </div>

                <div class="relative pl-12 pb-8">
                    <div class="absolute left-1.5 top-1 w-6 h-6 bg-orange-500 border-4 border-white dark:border-slate-800 rounded-full"></div>
                    <div class="bg-slate-50 dark:bg-slate-700/30 p-4 rounded-lg border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">
                                    Feb 10, 2025
                                </span>
                                <span class="ml-2 text-xs text-slate-500 dark:text-slate-400">
                                    2:15 PM
                                </span>
                            </div>
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900/70 dark:text-orange-200 rounded">
                                Lab Results
                            </span>
                        </div>

                        <h3 class="text-md font-medium text-slate-900 dark:text-white mb-1">
                            Blood Work Results
                        </h3>

                        <div class="flex items-center text-sm text-slate-600 dark:text-slate-300 mb-3">
                            <flux:icon.user-circle class="h-4 w-4 mr-1" />
                            Dr. Michael Chen
                            <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                            <flux:icon.building-office class="h-4 w-4 mr-1" />
                            Central Laboratory
                        </div>

                        <div class="flex items-center gap-3 mt-4">
                            <flux:button size="xs" variant="outline" icon="chart-bar">
                                View Results
                            </flux:button>
                            <flux:button size="xs" variant="ghost" icon="download">
                                Download
                            </flux:button>
                        </div>
                    </div>
                </div>

                <div class="relative pl-12 pb-8">
                    <div class="absolute left-1.5 top-1 w-6 h-6 bg-purple-500 border-4 border-white dark:border-slate-800 rounded-full"></div>
                    <div class="bg-slate-50 dark:bg-slate-700/30 p-4 rounded-lg border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">
                                    Jan 05, 2025
                                </span>
                                <span class="ml-2 text-xs text-slate-500 dark:text-slate-400">
                                    9:00 AM
                                </span>
                            </div>
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900/70 dark:text-purple-200 rounded">
                                Prescription
                            </span>
                        </div>

                        <h3 class="text-md font-medium text-slate-900 dark:text-white mb-1">
                            Medication Prescribed
                        </h3>

                        <div class="flex items-center text-sm text-slate-600 dark:text-slate-300 mb-3">
                            <flux:icon.user-circle class="h-4 w-4 mr-1" />
                            Dr. Sarah Thompson
                            <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                            <flux:icon.building-office class="h-4 w-4 mr-1" />
                            Main Street Clinic
                        </div>

                        <ul class="space-y-2 mt-3">
                            <li class="text-sm flex justify-between">
                                <span class="text-slate-700 dark:text-slate-300">Loratadine 10mg</span>
                                <span class="text-slate-500 dark:text-slate-400">Once daily</span>
                            </li>
                            <li class="text-sm flex justify-between">
                                <span class="text-slate-700 dark:text-slate-300">Albuterol Inhaler</span>
                                <span class="text-slate-500 dark:text-slate-400">As needed</span>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <flux:button size="xs" variant="outline" icon="arrow-path">
                                Request Refill
                            </flux:button>
                        </div>
                    </div>
                </div>
                <div class="relative pl-12 text-center py-4">
                    <flux:button variant="outline" size="sm" icon="chevron-down" class="w-full">
                        View More History
                    </flux:button>
                </div>
            </div>
        </div>
    </div>

    <!-- Health Details Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Allergies & Conditions -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.triangle-alert class="w-5 h-5 text-red-500 mr-2" />
                Allergies & Conditions
            </h3>

            <!-- Replace with actual data of masakits -->
            <ul class="space-y-3">
                <li class="flex items-center justify-between text-sm p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex items-center">
                        <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                        <span class="text-slate-700 dark:text-slate-300">Penicillin Allergy</span>
                    </div>
                    <span class="text-xs text-slate-500 dark:text-slate-400">Since 2015</span>
                </li>
                <li class="flex items-center justify-between text-sm p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex items-center">
                        <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                        <span class="text-slate-700 dark:text-slate-300">Seasonal Allergies</span>
                    </div>
                    <span class="text-xs text-slate-500 dark:text-slate-400">Since 2018</span>
                </li>
                <li class="flex items-center justify-between text-sm p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                        <span class="text-slate-700 dark:text-slate-300">Asthma (Mild)</span>
                    </div>
                    <span class="text-xs text-slate-500 dark:text-slate-400">Since 2010</span>
                </li>
            </ul>

            <div class="mt-4">
                <flux:button variant="ghost" size="sm" icon="plus" class="w-full">
                    Update Medical Information
                </flux:button>
            </div>
        </div>

        <!-- Middle Column - Current Medications -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.flask-conical class="w-5 h-5 text-blue-500 mr-2" />
                Current Medications
            </h3>

            <!-- Replace with actual data of mga bulong -->
            <ul class="space-y-3">
                <li class="p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-medium text-slate-900 dark:text-white">Loratadine 10mg</span>
                        <span class="inline-block px-2 py-0.5 text-xs bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">Active</span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Once daily, as needed for allergies</p>
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-500 dark:text-slate-400">Refills: 2 remaining</span>
                        <flux:button size="xs" variant="ghost" icon="arrow-path">
                            Refill
                        </flux:button>
                    </div>
                </li>
                <li class="p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-medium text-slate-900 dark:text-white">Albuterol Inhaler</span>
                        <span class="inline-block px-2 py-0.5 text-xs bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">Active</span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">As needed for asthma symptoms</p>
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-500 dark:text-slate-400">Refills: 1 remaining</span>
                        <flux:button size="xs" variant="ghost" icon="arrow-path">
                            Refill
                        </flux:button>
                    </div>
                </li>
            </ul>

            <div class="mt-4">
                <flux:button variant="ghost" size="sm" icon="document-text" class="w-full">
                    Medication History
                </flux:button>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700">
            <h3 class="text-md font-semibold text-slate-900 dark:text-white mb-4 flex items-center">
                <flux:icon.calendar class="w-5 h-5 text-green-500 mr-2" />
                Upcoming Appointments
            </h3>

            <!-- Replace with actual data of upcoming appointment -->
            <ul class="space-y-3">
                <li class="p-3 rounded-md bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 transition-all hover:shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="inline-block px-2 py-0.5 text-xs bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 rounded">
                            May 20, 2025
                        </span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">2:30 PM</span>
                    </div>
                    <p class="font-medium text-slate-900 dark:text-white mb-1">Follow-up Appointment</p>
                    <div class="flex items-center text-xs text-slate-600 dark:text-slate-300 mb-2">
                        <flux:icon.user-circle class="h-3 w-3 mr-1" />
                        Dr. Sarah Thompson
                        <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                        <flux:icon.building-office class="h-3 w-3 mr-1" />
                        Main Street Clinic
                    </div>
                    <div class="flex gap-2">
                        <flux:button size="xs" variant="outline" icon="pencil-square">
                            Reschedule
                        </flux:button>
                        <flux:button size="xs" variant="ghost" icon="calendar-x-mark" class="text-red-500">
                            Cancel
                        </flux:button>
                    </div>
                </li>
            </ul>

            <div class="mt-4">
                <flux:button variant="outline" size="sm" icon="plus" class="w-full">
                    Schedule New Appointment
                </flux:button>
            </div>
        </div>
    </div>
</div>
@endsection