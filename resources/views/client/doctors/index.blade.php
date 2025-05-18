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
        <form action="{{ route('client.doctors') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="w-full md:w-96">
                <flux:input
                    type="text"
                    name="search"
                    placeholder="Search doctors by name or specialty..."
                    class="w-full"
                    value="{{ request('search') }}"
                    autofocus />
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <select name="specialization" onchange="this.form.submit()" class="px-4 py-2 bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded-md text-sm text-slate-700 dark:text-white">
                    <option value="">All Specialties</option>
                    @foreach($specializations as $specialization)
                    <option value="{{ $specialization->id }}" {{ request('specialization') == $specialization->id ? 'selected' : '' }}>
                        {{ $specialization->name }}
                    </option>
                    @endforeach
                </select>
                @if(request('search') || request('specialization'))
                <a href="{{ route('client.doctors') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 hover:bg-slate-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-white rounded-md text-sm font-medium transition-colors">
                    <flux:icon.x-circle class="w-4 h-4 mr-2" />
                    Clear Filters
                </a>
                @endif
            </div>
        </form>
    </div>

    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center">
                <flux:icon.user-circle class="w-5 h-5 text-blue-500 mr-2" />
                Doctor Directory
                @if(request('search') || request('specialization'))
                <span class="ml-2 text-sm font-normal text-slate-500 dark:text-slate-400">
                    Showing filtered results
                </span>
                @endif
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($doctors->count() > 0)
            @foreach($doctors as $doctor)
            <div class="col-span-1">
                <div class="bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden transition-all hover:shadow-md">
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-slate-900 dark:text-white">
                                Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}
                            </h3>
                            @if($doctor->specialization)
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/70 dark:text-blue-200 rounded">
                                {{ $doctor->specialization->name }}
                            </span>
                            @endif
                        </div>

                        <div class="flex items-center text-sm text-slate-600 dark:text-slate-300 mb-4">
                            <flux:icon.academic-cap class="h-4 w-4 mr-1" />
                            License: {{ $doctor->license_number }}
                        </div>

                        <div class="mt-4">
                            <flux:button size="sm" variant="primary" icon="calendar" class="w-full">
                                Schedule Appointment
                            </flux:button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-span-3 p-8 text-center">
                <flux:icon.x class="w-12 h-12 text-slate-300 dark:text-slate-600 mx-auto mb-3" />
                <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-1">No doctors found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Try adjusting your search or filter criteria</p>
            </div>
            @endif
        </div>

        <div class="mt-6">
            {{ $doctors->appends(request()->query())->links() }}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[name="search"]');

        if (searchInput) {
            let typingTimer;
            const typingDelay = 200;

            searchInput.addEventListener('input', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(() => {
                    const baseUrl = "{{ route('client.doctors') }}";
                    const searchValue = searchInput.value.trim();

                    if (searchValue !== "") {
                        const newUrl = `${baseUrl}?search=${encodeURIComponent(searchValue)}`;
                        window.location.href = newUrl;
                    } else {
                        window.location.href = baseUrl;
                    }
                }, typingDelay);
            });
        }
    });
</script>
@endsection