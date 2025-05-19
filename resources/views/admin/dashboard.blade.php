@props([
'title' => 'Dashboard | Medicare',
])

@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Admin Dashboard</h1>
            <p class=" text-sm text-slate-500 dark:text-slate-400 mt-1">Overview of the clinic operations</p>
        </div>
        <div class="mt-4 md:mt-8">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Appointments</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalAppointments }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-green-500 dark:text-green-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 1%
                        </span>
                        <span class="text-slate-500 dark:Text-slate-400 ml-1">vs. last month</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                    <flux:icon.calendar-days class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Pending Approvals</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $pendingAppointments }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-amber-500 dark:text-amber-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 2%
                        </span>
                        <span class="text-slate-500 dark:text-slate-400 ml-1">needs attention</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center">
                    <flux:icon.clock class="w-6 h-6 text-amber-600 dark:text-amber-400" />
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Patients</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalPatients }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-green-500 dark:text-green-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 5%
                        </span>
                        <span class="text-slate-500 dark:text-slate-400 ml-1">new this month</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                    <flux:icon.users class="w-6 h-6 text-green-600 dark:text-green-400" />
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Doctors</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalDoctors }}</p>
                    <p class="text-xs flex items-center mt-1">
                        <span class="text-cyan-500 dark:text-cyan-400 flex items-center">
                            <flux:icon.trending-up class="w-3 h-3 mr-1" /> 2
                        </span>
                        <span class="text-slate-500 dark:text-slate-400 ml-1">specialties</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center">
                    <flux:icon.stethoscope class="w-6 h-6 text-cyan-600 dark:text-cyan-400" />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overhlow-hidden">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Appointment Analytics</h2>
                    <flux:dropdown position="bottom" align="end">
                        <flux:button variant="ghost">
                            Last 30 Days
                            <flux:icon.chevron-down class="w-4 h-4 ml-1" />
                        </flux:button>
                        <flux:menu>
                            <flux:menu.item>Last 7 Days</flux:menu.item>
                            <flux:menu.item>Last 30 Days</flux:menu.item>
                            <flux:menu.item>Last 90 Days</flux:menu.item>
                            <flux:menu.item>This Year</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Pie Chart for Appointment Status Distribution -->
                    <div class="p-4">
                        <div class="mb-3 text-center">
                            <h3 class="text-sm font-medium text-slate-700 dark:text-slate-300">Appointment Status Distribution</h3>
                        </div>
                        <div class="h-72">
                            <canvas id="appointmentStatusChart"></canvas>
                        </div>
                    </div>

                    <!-- Line Chart for Appointments per Day -->
                    <div class="p-4">
                        <div class="mb-3 text-center">
                            <h3 class="text-sm font-medium text-slate-700 dark:text-slate-300">Appointments Trend (Last 30 Days)</h3>
                        </div>
                        <div class="h-72">
                            <canvas id="appointmentTrendChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Approval Queue</h2>
                <form action="{{ route('admin.appointments') }}">
                    <flux:button variant="primary">
                        View All
                    </flux:button>
                </form>
            </div>
            <div class="p-4">
                <div class="space-y-4">
                    @forelse($approvalQueue as $appointment)
                    <div class="border border-slate-200 dark:border-slate-700 rounded-md p-3 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-slate-900 dark:text-white">
                                    {{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}
                                </p>
                                <div class="flex items-center text-sm text-slate-500 dark:text-slate-400 mt-1">
                                    <flux:icon.calendar class="w-4 h-4 mr-1" />
                                    {{ Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                    <span class="mx-1">•</span>
                                    <flux:icon.clock class="w-4 h-4 mr-1" />
                                    {{ Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                </div>
                                <div class="flex items-center text-sm text-slate-500 dark:text-slate-400 mt-1">
                                    <flux:icon.stethoscope class="w-4 h-4 mr-1" />
                                    Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
                                    <span class="mx-1">•</span>
                                    {{ $appointment->doctor->specialization->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-700/50 mb-4">
                            <flux:icon.clipboard-check class="w-8 h-8 text-slate-400 dark:text-slate-500" />
                        </div>
                        <p class="text-slate-500 dark:text-slate-400">No pending appointments to approve</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusLabels = @json(array_keys($appointmentStatusCounts));
        const statusData = @json(array_values($appointmentStatusCounts));

        const statusColors = [
            '#F59E0B', // Amber - Pending
            '#3B82F6', // Blue - Confirmed
            '#10B981', // Green - Completed
            '#8B5CF6', // Purple - Rescheduled
            '#EF4444', // Red - Cancelled (Clinic)
            '#EC4899', // Pink - Cancelled (Patient)
        ];

        new Chart(document.getElementById('appointmentStatusChart'), {
            type: 'pie',
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusData,
                    backgroundColor: statusColors,
                    borderWidth: 1,
                    borderColor: window.matchMedia('(prefers-color-scheme: dark)').matches ?
                        '#1E293B' // dark mode border
                        :
                        '#FFFFFF', // light mode border
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 15,
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ?
                                '#CBD5E1' // dark mode text
                                :
                                '#475569', // light mode text
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.formattedValue;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((context.raw / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Setup for the Trend Line Chart
        const trendDates = @json(array_keys($appointmentsPerDay));
        const trendCounts = @json(array_values($appointmentsPerDay));

        // Format dates for display
        const formattedDates = trendDates.map(date => {
            return new Date(date).toLocaleDateString('en-US', {
                month: 'short',
                day: 'numeric'
            });
        });

        new Chart(document.getElementById('appointmentTrendChart'), {
            type: 'line',
            data: {
                labels: formattedDates,
                datasets: [{
                    label: 'Appointments',
                    data: trendCounts,
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#3B82F6',
                    pointRadius: 3,
                    pointHoverRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false,
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ?
                                'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ?
                                '#CBD5E1' // dark mode text
                                :
                                '#475569', // light mode text
                            maxRotation: 45,
                            minRotation: 45,
                            callback: function(val, index) {
                                // Show fewer labels on mobile
                                return index % 5 === 0 ? this.getLabelForValue(val) : '';
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ?
                                'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            precision: 0,
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ?
                                '#CBD5E1' // dark mode text
                                :
                                '#475569', // light mode text
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return context[0].label;
                            },
                            label: function(context) {
                                return `${context.formattedValue} appointments`;
                            }
                        }
                    }
                }
            }
        });

        // Handle dark/light mode theme changes
        const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        darkModeMediaQuery.addEventListener('change', () => {
            // Reload the page to update chart colors on theme change
            window.location.reload();
        });
    });
</script>

@endsection