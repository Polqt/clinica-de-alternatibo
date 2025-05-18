@props([
'title' => 'Doctors | Medicare',
])

@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Doctors Management</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">View, add, and manage medical practitioners</p>
        </div>
        <div class="mt-4 md:mt-0 space-x-2">
            <flux:modal.trigger name="create_doctor">
                <flux:button variant="outline" icon="plus">
                    Add Doctor
                </flux:button>
            </flux:modal.trigger>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center mr-3">
                    <flux:icon.user class="w-6 h-6 text-teal-600 dark:text-teal-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Total Doctors</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalDoctors }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-3">
                    <flux:icon.calendar class="w-6 h-6 text-purple-600 dark:text-purple-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Scheduled Today</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white"></p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                    <flux:icon.check class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Active Doctors</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white"></p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mr-3">
                    <flux:icon.clock class="w-6 h-6 text-amber-600 dark:text-amber-400" />
                </div>
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Pending Approvals</p>
                    <p class="text-2xl font-bold text-slate-900 dark:text-white"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5 mb-8">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="w-full md:w-96">
                <flux:input type="text" placeholder="Search doctors..." class="w-full" />
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <flux:dropdown position="bottom" align="end">
                    <flux:menu>
                        <flux:menu.item>All Doctors</flux:menu.item>
                        <flux:menu.item>Active Doctors</flux:menu.item>
                        <flux:menu.item>Inactive Doctors</flux:menu.item>
                        <flux:menu.separator />
                        <!-- <flux:menu.item icon="identification">By Specialty</flux:menu.item> -->
                    </flux:menu>
                </flux:dropdown>
                <flux:dropdown position="bottom" align="end">
                    <flux:button variant="outline" icon="adjustments-horizontal">Sort</flux:button>
                    <flux:menu>
                        <flux:menu.item>Name (A-Z)</flux:menu.item>
                        <flux:menu.item>License Number</flux:menu.item>
                        <flux:menu.item>Newest First</flux:menu.item>
                        <flux:menu.item>Oldest First</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8 overflow-hidden">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center">
                <flux:icon.user-circle class="w-5 h-5 text-blue-500 mr-2" />
                Doctor Directory
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-700/50">
                    <tr>
                        <th class="px-4 py-3 font-medium">First Name</th>
                        <th class="px-4 py-3 font-medium">Last Name</th>
                        <th class="px-4 py-3 font-medium">License Number</th>
                        <th class="px-4 py-3 font-medium">Specialization</th>
                        <th class="px-4 py-3 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse($doctors as $doctor)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-700 dark:text-slate-300">{{ $doctor->first_name }}</td>
                        <td class="px-4 py-3 text-slate-700 dark:text-slate-300">{{ $doctor->last_name }}</td>
                        <td class="px-4 py-3 text-slate-700 dark:text-slate-300">{{ $doctor->license_number }}</td>
                        <td class="px-4 py-3 text-slate-700 dark:text-slate-300">
                            {{ $doctor->specialization ? $doctor->specialization->name : 'Not assigned' }}
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end space-x-12">
                                <flux:modal.trigger name="edit_doctor_{{ $doctor->id }}">
                                    <flux:button variant="ghost" icon="pencil">Edit</flux:button>
                                </flux:modal.trigger>
                                <flux:modal.trigger name="delete_doctor_{{ $doctor->id }}">
                                    <flux:button variant="ghost" icon="trash">Delete</flux:button>
                                </flux:modal.trigger>
                            </div>
                        </td>
                    </tr>

                    @include('admin.doctors.edit', ['doctor' => $doctor])
                    @include('admin.doctors.delete', ['doctor' => $doctor])
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-slate-500 dark:text-slate-400">No doctors found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <x-pagination :paginator="$doctors" />
    </div>
</div>

@include('admin.doctors.create')

@endsection