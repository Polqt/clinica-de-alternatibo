@props([
'title' => 'Help | MediCare',
])

@extends('layouts.client')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-8">MediCare Help Center</h1>
            <p class="mt-2 text-lg text-slate-600 dark:text-slate-300">Find answers to common questions about using MediCare.</p>
        </div>

        <div class="grid gap-8">
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 dark:bg-blue-900/30 p-3 rounded-full mr-4">
                        <flux:icon.loader class="text-blue-600 dark:text-blue-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-90 dark:text-white">Getting Started</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">Welcome to MediCare, your all-in-one clinic scheduling application. Here's how to get started:</p>
                    <ol class="space-y-3 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Login to your account using your credentials</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>Navigate using the sidebar menu to access different features</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Complete your profile information to personalize your experience</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Explore the Dashboard to see your upcoming appointments</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-full mr-4">
                        <flux:icon.calendar class="text-green-600 dark:text-green-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Using the Schedule Feature</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">The Schedule feature allows you to view available time slots for clinic visits and book your appointments.</p>
                    <h3 class="font-medium text-slate-700 dark:text-white mt-4 mb-2">How to Schedule an Apointment:</h3>
                    <ol class="space-y-3 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Click on the "Schedule" icon in the sidebar</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>Browse the calendar to view available dates</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Select your preferred date to see available time slots</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Choose a time slot that works for you</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">5.</span>
                            <span>Fill in the appointment details (reason for visit, symptoms, etc.)</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">6.</span>
                            <span>Confirm your booking</span>
                        </li>
                    </ol>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">Schedule Features:</h3>
                    <ul class="space-y-2 text-slate-700 dark:text-gray-300">
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-green-600 dark:text-green-400 mt-1 w-5 h-5" />
                            <span>Color-coded slots showing availability status</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-green-600 dark:text-green-400 mt-1 w-5 h-5" />
                            <span>Filter options by doctor, specialty, or time of day</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-green-600 dark:text-green-400 mt-1 w-5 h-5" />
                            <span>Month and week view options</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 dark:bg-purple-900/30 p-3 rounded-full mr-4">
                        <flux:icon.calendar-x class="text-purple-600 dark:text-purple-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Managing Appointments</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">The Appointments section helps you keep track of your upcoming medical visits.</p>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">Key Appointment Features:</h3>
                    <ul class="space-y-2 text-slate-700 dark:text-slate-300">
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>View all your upcoming appointments in one place</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>Reschedule appointments when needed</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>Cancel appointments (at least 24 hours in advance)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-purple-600 dark:text-purple-400 mt-1 w-5 h-5" />
                            <span>Receive reminders about upcoming appointments</span>
                        </li>
                    </ul>

                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">How to Manage Appointments:</h3>
                    <ol class="space-y-3 text-gray-700 dark:text-gray-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Click on the "Appointments" icon in the sidebar</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>View your list of upcoming appointments</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Click on an appointment to see details</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Use the action buttons to reschedule or cancel if needed</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-amber-100 dark:bg-amber-900/30 p-3 rounded-full mr-4">
                        <flux:icon.clock class="text-amber-600 dark:text-amber-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Appointment History</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">The History section provides a record of all your past clinic visits and appointments.</p>
                    <h3 class="font-medium text-slate-900 dark:text-white mt-4 mb-2">Using the History Feature:</h3>
                    <ul class="space-y-2 text-slate-700 dark:text-slate-300">
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-amber-600 dark:text-amber-400 mt-1 w-5 h-5" />
                            <span>View details of past appointments including date, doctor, and reason</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-amber-600 dark:text-amber-400 mt-1 w-5 h-5" />
                            <span>Access visit summaries and doctor's notes</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-amber-600 dark:text-amber-400 mt-1 w-5 h-5" />
                            <span>Filter and search through your medical visit history</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <flux:icon.check class="text-amber-600 dark:text-amber-400 mt-1 w-5 h-5" />
                            <span>Request follow-up appointments based on past visits</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-full mr-4">
                        <flux:icon.circle-help class="text-red-600 dark:text-red-400" />
                    </div>
                    <h2 class="text-xl font-medium text-slate-900 dark:text-white">Frequently Asked Questions</h2>
                </div>
                <div class="pl-14 soace-y-4">

                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-indigo-100 dark:bg-indigo-900/30 p-3 rounded-full mr-4">
                        <flux:icon.message-square class="text-indigo-600 dark:text-indigo-400" />
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Need More Help?</h2>
                </div>
                <div class="pl-14">
                    <p class="text-slate-700 dark:text-slate-300 mb-4">If you couldn't find the answer to your question, our support team is here to help.</p>

                    <div class="grid gap-4 md:grid-cols-2 items-start justify-start">
                        <div class="flex gap-3 items-center p-4 bg-slate-50 dark:bg-slate-700/50 rounded-md">
                            <flux:icon.phone class="text-indigo-600 dark:text-indigo-400" />
                            <div>
                                <p class="text-slate-700 dark:text-white">(123) 456-7891</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center p-4 bg-gray-50 dark:bg-zinc-700/50 rounded-md">
                            <flux:icon.mail class="text-indigo-600 dark:text-indigo-400" />
                            <div>
                                <p class="text-gray-700 dark:text-gray-300">support@medicare.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 bg-slate-50 dark:bg-slate-700/50 p-4 rounded-md">
                    <h3 class="font-medium text-slate-900 dark:text-white mb-2">Technical Issues?</h3>
                    <p class="text-slate-700 dark:text-slate-300">If you're experiencing technical difficulties with the application, try these steps:</p>
                    <ol class="mt-2 space-y-1 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-2">
                            <span class="font-semibold">1.</span>
                            <span>Refresh your browser page</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">2.</span>
                            <span>Clear your browser cache and cookies</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">3.</span>
                            <span>Try using a different browser</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="font-semibold">4.</span>
                            <span>Contact our technical support team if the issue persists</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800">
        <h2 class="text-xl font-semibold text-blue-900 dark:text-blue-300 mb-4">Quick Tips</h2>
        <div class="grid gap-4 md:grid-cols-2">
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-800/50 rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.key-round class="text-blue-600 dark:text-blue-400 w-4 h-4" />
                </div>
                <p class=" text-blue-800 dark:text-blue-200">Set up notifications to receive reminders about your appointments</p>
            </div>
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-800/50 rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.key-round class="text-blue-600 dark:text-blue-400 w-4 h-4" />
                </div>
                <p class=" text-blue-800 dark:text-blue-200">Complete your profile with medical history for better care</p>
            </div>
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-800/50 rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.key-round class="text-blue-600 dark:text-blue-400 w-4 h-4" />
                </div>
                <p class=" text-blue-800 dark:text-blue-200">Book appointments during off-peak hours for more availability</p>
            </div>
            <div class="flex gap-3">
                <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-800/50 rounded-full p-2 h-8 w-8 flex items-center justify-center">
                    <flux:icon.key-round class="text-blue-600 dark:text-blue-400 w-4 h-4" />
                </div>
                <p class="text-blue-800 dark:text-blue-200">Check your Dashboard regularly for any schedule changes</p>
            </div>
        </div>
    </div>
</div>
@endsection