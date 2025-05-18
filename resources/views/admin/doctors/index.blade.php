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
        <form method="GET" class="space-y-4 md:space-y-0 md:flex md:items-center md:justify-between">
            <div class="relative flex-grow max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <flux:icon.search class="h-5 w-5 text-slate-400" />
                </div>
                <input
                    type="text"
                    name="search"
                    placeholder="Search doctors..."
                    id="searchInput"
                    value="{{ request('search') }}"
                    class="block w-full pl-10 pr-3 py-2 border border-slate-300 dark:border-slate-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white sm:text-sm"
                    aria-label="Search doctors" />
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative inline-block">
                    <select
                        name="sort"
                        class="appearance-none block w-full pl-3 pr-10 py-2 border border-slate-300 dark:border-slate-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-slate-700 dark:text-white sm:text-sm"
                        aria-label="Sort by">
                        <option value="">Sort by</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                        <option value="license" {{ request('sort') == 'license' ? 'selected' : '' }}>License Number</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <flux:icon.chevron-down class="h-4 w-4 text-slate-400" />
                    </div>
                </div>

                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    <flux:icon.funnel class="mr-2 h-4 w-4" />
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8 overflow-hidden">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center">
                <flux:icon.user-circle class="w-5 h-5 text-blue-500 mr-2" />
                Doctor Directory
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left" id="doctorsTable">
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

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("input", () => {
            const searchTerm = searchInput.value.trim();
            const newUrl = new URL(window.location.href);

            if (searchTerm.length > 0) {
                newUrl.searchParams.set("search", searchTerm);
            } else {
                newUrl.searchParams.delete("search");
            }

            newUrl.searchParams.delete("sort");

            window.history.replaceState({}, "", newUrl);

            filterTable(searchTerm);
        });

        function filterTable(searchTerm) {
            const table = document.getElementById("doctorsTable");
            const rows = table.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const cells = row.querySelectorAll("td");
                const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(" ");
                row.style.display = rowText.includes(searchTerm.toLowerCase()) ? "" : "none";
            });
        }
        
        const initialSearch = new URL(window.location.href).searchParams.get("search");
        if (initialSearch) {
            filterTable(initialSearch);
        }
    });
</script>


@endsection