@props([
'title' => 'Help | MediCare',
])

@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Admin Help Center</h1>
                    <p class="text-lg text-slate-600 dark:text-slate-300">Find answers and guides for managing the MediCare system.</p>
                </div>
            </div>
        </div>

        <div class="grid gap-8">
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                        <flux:icon.layout-dashboard class="text-indigo-600 dark:text-indigo-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Getting Started with Admin Dashboard</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">The Admin Dashboard provides a comprehensive overview of the MediCare system and key metrics. Here's how to use it:</p>
                    <ol class="space-y-3 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Login with your admin credentials to access the admin interface</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>View analytics cards showing appointment statistics, user registrations, and system status</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Use the quick action buttons to navigate to common administrative tasks</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Check the activity log to monitor recent changes in the system</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 dark:bg-blue-900/30 p-3 rounded-full mr-4">
                        <flux:icon.users class="text-blue-600 dark:text-blue-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Managing Users</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">The User Management section allows you to oversee patient and staff accounts in the system.</p>
                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">Key User Management Features:</h3>
                    <ul class="space-y-2 text-slate-700 dark:text-slate-300">
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-blue-600 dark:text-blue-400 mt-1 w-5 h-5" />
                            <span>View and edit user account information</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-blue-600 dark:text-blue-400 mt-1 w-5 h-5" />
                            <span>Assign roles and permissions to staff accounts</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-blue-600 dark:text-blue-400 mt-1 w-5 h-5" />
                            <span>Reset passwords and manage account security</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-blue-600 dark:text-blue-400 mt-1 w-5 h-5" />
                            <span>Disable accounts or manage account status</span>
                        </li>
                    </ul>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">How to Manage Users:</h3>
                    <ol class="space-y-3 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Navigate to the "Users" section in the sidebar</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>Use the filter options to search for specific users</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Click on a user to view their complete profile</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Use the action buttons to edit information, reset password, or modify account status</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-full mr-4">
                        <flux:icon.calendar class="text-green-600 dark:text-green-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Appointment Administration</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">The Appointment section provides tools for managing the clinic's scheduling system.</p>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">Appointment Management Features:</h3>
                    <ul class="space-y-2 text-slate-700 dark:text-slate-300">
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-green-600 dark:text-green-400 mt-1 w-5 h-5" />
                            <span>View all scheduled appointments across the system</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-green-600 dark:text-green-400 mt-1 w-5 h-5" />
                            <span>Configure doctor availability and working hours</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-green-600 dark:text-green-400 mt-1 w-5 h-5" />
                            <span>Manage cancellations and reschedule requests</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-green-600 dark:text-green-400 mt-1 w-5 h-5" />
                            <span>Set up appointment types and duration templates</span>
                        </li>
                    </ul>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">How to Manage Appointments:</h3>
                    <ol class="space-y-3 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Navigate to the "Appointments" section in the admin dashboard</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>Use the calendar view to see all scheduled appointments</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Filter by doctor, department, or date range</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Click on an appointment to view details or make changes</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">5.</span>
                            <span>Use the "Block Time" feature to mark periods when appointments cannot be scheduled</span>
                        </li>
                    </ol>
                </div>
            </div>


            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 dark:bg-purple-900/30 p-3 rounded-full mr-4">
                        <flux:icon.stethoscope class="text-purple-600 dark:text-purple-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Managing Doctors</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">The Doctors section allows you to manage medical staff profiles and availability.</p>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">Doctor Management Features:</h3>
                    <ul class="space-y-2 text-slate-700 dark:text-slate-300">
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>Create and edit doctor profiles with specializations</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>Manage doctor schedules and availability</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>Track doctor performance and appointment statistics</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>Configure vacation days and time off</span>
                        </li>
                    </ul>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">Adding a New Doctor:</h3>
                    <ol class="space-y-3 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Go to the "Doctors" section in the admin dashboard</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>Click on the "Add Doctor" button</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Fill in the required information (name, credentials, specialty, etc.)</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Set up their regular working hours and availability</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">5.</span>
                            <span>Upload a profile photo and create login credentials</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                        <flux:icon.headset class="text-indigo-600 dark:text-indigo-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Admin Support</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">If you need assistance with administrative functions, our dedicated admin support team is available.</p>
                    <div class="grid gap-4 md:grid-cols-3 items-start justify-start">
                        <div class="flex gap-3 items-center p-4 bg-slate-50 dark:bg-slate-700/50 rounded-md">
                            <flux:icon.phone class="text-indigo-600 dark:text-indigo-400" />
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Priority Support Line</p>
                                <p class="text-slate-700 dark:text-white font-medium">(123) 456-7890</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center p-4 bg-slate-50 dark:bg-slate-700/50 rounded-md">
                            <flux:icon.mail class="text-indigo-600 dark:text-indigo-400" />
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Admin Support Email</p>
                                <p class="text-slate-700 dark:text-slate-300 font-medium">admin-support@medicare.com</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center p-4 bg-slate-50 dark:bg-slate-700/50 rounded-md">
                            <flux:icon.message-square class="text-indigo-600 dark:text-indigo-400" />
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Live Chat</p>
                                <p class="text-slate-700 dark:text-slate-300 font-medium">Available 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 bg-indigo-50 dark:bg-indigo-900/20 p-5 rounded-md">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-indigo-100 dark:bg-indigo-800/50 rounded-full">
                            <flux:icon.sparkles class="text-indigo-600 dark:text-indigo-400 w-5 h-5" />
                        </div>
                        <div>
                            <h3 class="font-medium text-indigo-900 dark:text-indigo-300 mb-1">Pro Tip: Admin Training</h3>
                            <p class="text-indigo-800 dark:text-indigo-200 text-sm">Schedule a personalized training session for new admin staff members by contacting our training department at <span class="font-medium">training@medicare.com</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-gradient-to-r from-indigo-500 to-purple-600 dark:from-indigo-600 dark:to-purple-700 rounded-lg p-6 shadow-lg">
        <h2 class="text-xl font-semibold text-white mb-5">Administrator Quick Tips</h2>
        <div class="grid gap-4 md:grid-cols-2">
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-white/20 backdrop-blur-sm rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.shield class="text-white w-4 h-4" />
                </div>
                <p class="text-white/90">Regularly check the system logs for unusual activity or error patterns</p>
            </div>
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-white/20 backdrop-blur-sm rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.calendar class="text-white w-4 h-4" />
                </div>
                <p class="text-white/90">Review and adjust doctor schedules at least one month in advance</p>
            </div>
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-white/20 backdrop-blur-sm rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.bell class="text-white w-4 h-4" />
                </div>
                <p class="text-white/90">Set up automated notifications for appointment changes and cancellations</p>
            </div>
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-white/20 backdrop-blur-sm rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.users class="text-white w-4 h-4" />
                </div>
                <p class="text-white/90">Perform routine audits of user roles and permissions for security</p>
            </div>
        </div>
    </div>
</div>
@endsection