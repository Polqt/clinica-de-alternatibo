@props([
'title' => 'Find a Doctor | MediCare',
])

@extends('layouts.client')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Find a Doctor</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Browse our network of qualified and experienced healthcare professionals</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center mr-3">
                    <flux:icon.user-group class="w-6 h-6 text-teal-600 dark:text-teal-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Trusted Doctors</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalDoctors }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mr-3">
                    <flux:icon.academic-cap class="w-6 h-6 text-amber-600 dark:text-amber-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Specializations</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $specializationCount }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center mr-3">
                    <flux:icon.calendar class="w-6 h-6 text-emerald-600 dark:text-emerald-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Available Today</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5 mb-8">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="w-full md:w-96">
                <flux:input type="text" placeholder="Search doctors by name or specialty..." class="w-full" />
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <flux:dropdown position="bottom" align="end">
                    <flux:button variant="outline" icon="funnel">
                        Filter by Specialty
                    </flux:button>
                    <flux:menu>
                        <flux:menu.item>All Specialties</flux:menu.item>
                        @foreach($specializations as $specialization)
                        <flux:menu.item>{{ $specialization->name }}</flux:menu.item>
                        @endforeach
                    </flux:menu>
                </flux:dropdown>
                <flux:dropdown position="bottom" align="end">
                    <flux:button variant="outline" icon="adjustments-horizontal">Sort</flux:button>
                    <flux:menu>
                        <flux:menu.item>Name (A-Z)</flux:menu.item>
                        <flux:menu.item>Specialty</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
    </div>

    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center">
                <flux:icon.user-circle class="w-5 h-5 text-blue-500 mr-2" />
                Doctor Directory
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($doctors as $doctor)
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden transition-all hover:shadow-md">
                <div class="bg-gradient-to-r from-cyan-500/10 to-teal-500/10 dark:from-cyan-900/20 dark:to-teal-900/30 p-6 text-center">
                    <div class="w-24 h-24 rounded-full mx-auto bg-white dark:bg-slate-700 p-1 mb-3 flex items-center justify-center overflow-hidden">
                        <flux:icon.user-circle class="w-20 h-20 text-slate-300 dark:text-slate-600" />
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white">
                        Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        {{ $doctor->specialization->name }}
                    </p>
                </div>
                <div class="p-5">
                    <div class="mb-4">
                        <div class="flex items-center mb-2">
                            <flux:icon.identification class="w-5 h-5 text-slate-400 mr-2" />
                            <p class="text-sm text-slate-600 dark:text-slate-300">License: {{ $doctor->license_number }}</p>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <flux:button icon="calendar" class="w-full">
                            Book Appointment
                        </flux:button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 p-8 text-center text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">

                <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-2">No doctors found</h3>
                <p>Please try adjusting your search or filter criteria.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-6">
            <x-pagination :paginator="$doctors" />
        </div>
    </div>
</div>

@endsection