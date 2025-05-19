@props([
'title' => 'Patients | Medicare',
])

@extends('layouts.admin')
@section('content')

<div class="container mx-auto px-6 py-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Patients Management</h1>
            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">Monitor and manage registered patients</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mr-4">
                    <flux:icon.users class="w-6 h-6 text-cyan-600 dark:text-cyan-400" />
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Patients</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ number_format($totalPatients ?? 0) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center mr-4">
                    <flux:icon.user-plus class="w-6 h-6 text-emerald-600 dark:text-emerald-400" />
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">New Patients</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ number_format($newPatients ?? 0) }}</p>
                    <p class="text-xs text-emerald-600 dark:text-emerald-400">+{{ $newPatientsGrowth ?? 0 }}% this month</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-5 border border-slate-200 dark:border-slate-700 transition-all hover:shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center mr-4">
                    <flux:icon.calendar-days class="w-6 h-6 text-amber-600 dark:text-amber-400" />
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Today's Appointments</p>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $appointmentsToday ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-5 mb-6">
        <form id="patientFilterForm" action="{{ route('admin.patients') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <flux:input
                    name="search"
                    id="searchInput"
                    icon="magnifying-glass"
                    placeholder="Search patients by name or ID..."
                    value="{{ request('search', '') }}"
                    class="w-full" />
            </div>
            <div class="flex flex-wrap gap-3 items-center"> 
                <div>
                    <select name="blood_type" id="bloodTypeSelect" class="bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md px-3 py-2 text-sm focus:ring-cyan-500 focus:border-cyan-500">
                        <option value="">All Blood Types</option>
                        @foreach($bloodTypes as $type)
                        <option value="{{ $type }}" {{ request('blood_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="gender" id="genderSelect" class="bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md px-3 py-2 text-sm focus:ring-cyan-500 focus:border-cyan-500">
                        <option value="">All Genders</option>
                        @foreach($genders as $g)
                        <option value="{{ $g }}" {{ request('gender') == $g ? 'selected' : '' }}>{{ ucfirst($g) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white rounded-md text-sm">
                        Filter
                    </button>
                    @if(request('search') || request('blood_type') || request('gender'))
                    <a href="{{ route('admin.patients') }}" id="clearFiltersButton" class="px-4 py-2 bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 rounded-md text-sm ml-2">
                        Clear
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-700/50">
                    <tr>
                        <th class="px-6 py-3 font-medium">Patient</th>
                        <th class="px-6 py-3 font-medium">Patient ID</th>
                        <th class="px-6 py-3 font-medium">Contact Info</th>
                        <th class="px-6 py-3 font-medium">Date of Birth</th>
                        <th class="px-6 py-3 font-medium">Gender</th>
                        <th class="px-6 py-3 font-medium">Blood Type</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse ($patients as $patient)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden">
                                        @if($patient->user->profile && $patient->user->profile->profile_picture)
                                        <img src="{{ Storage::url($patient->user->profile->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                                        @else
                                        <flux:icon.user class="w-5 h-5 text-slate-600 dark:text-slate-400" />
                                        @endif
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-slate-900 dark:text-white">{{ $patient->user->first_name }} {{ $patient->user->last_name }}</div>
                                    <div class="text-sm text-slate-500 dark:text-slate-400">{{ $patient->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-700 dark:text-slate-300">{{ $patient->patient_identifier }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-700 dark:text-slate-300">
                                @if ($patient->user->profile && $patient->user->profile->phone_number)
                                {{ $patient->user->profile->phone_number }}
                                @else
                                <span class="text-slate-400 dark:text-slate-500">No phone number</span>
                                @endif
                            </div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                @if ($patient->user->profile && $patient->user->profile->address)
                                {{ $patient->user->profile->city ?? '' }}
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-700 dark:text-slate-300">
                                @if ($patient->user->profile && $patient->user->profile->date_of_birth)
                                {{ $patient->user->profile->date_of_birth->format('M d, Y') }}
                                @else
                                <span class="text-slate-400 dark:text-slate-500">Not provided</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-700 dark:text-slate-300">
                                @if ($patient->user->profile && $patient->user->profile->gender)
                                @php
                                $gender = $patient->user->profile->gender;
                                $bgClass = ''; $textClass = ''; $darkBgClass = ''; $darkTextClass = '';
                                if ($gender == 'male') {
                                $bgClass = 'bg-blue-100'; $textClass = 'text-blue-800';
                                $darkBgClass = 'dark:bg-blue-900/30'; $darkTextClass = 'dark:text-blue-400';
                                } elseif ($gender == 'female') {
                                $bgClass = 'bg-pink-100'; $textClass = 'text-pink-800';
                                $darkBgClass = 'dark:bg-pink-900/30'; $darkTextClass = 'dark:text-pink-400';
                                } else {
                                $bgClass = 'bg-purple-100'; $textClass = 'text-purple-800';
                                $darkBgClass = 'dark:bg-purple-900/30'; $darkTextClass = 'dark:text-purple-400';
                                }
                                @endphp
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $bgClass }} {{ $textClass }} {{ $darkBgClass }} {{ $darkTextClass }}">
                                    {{ ucfirst($gender) }}
                                </span>
                                @else
                                <span class="text-slate-400 dark:text-slate-500">Not specified</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium">
                                @if ($patient->user->profile && $patient->user->profile->blood_type)
                                @php
                                $bloodTypeValue = $patient->user->profile->blood_type->value ?? $patient->user->profile->blood_type ?? '';
                                $bgClass = ''; $textClass = ''; $darkBgClass = ''; $darkTextClass = '';
                                if (str_contains($bloodTypeValue, 'A') && !str_contains($bloodTypeValue, 'AB')) {
                                $bgClass = 'bg-red-100'; $textClass = 'text-red-800';
                                $darkBgClass = 'dark:bg-red-900/30'; $darkTextClass = 'dark:text-red-400';
                                } elseif (str_contains($bloodTypeValue, 'B') && !str_contains($bloodTypeValue, 'AB')) {
                                $bgClass = 'bg-green-100'; $textClass = 'text-green-800';
                                $darkBgClass = 'dark:bg-green-900/30'; $darkTextClass = 'dark:text-green-400';
                                } elseif (str_contains($bloodTypeValue, 'AB')) {
                                $bgClass = 'bg-purple-100'; $textClass = 'text-purple-800';
                                $darkBgClass = 'dark:bg-purple-900/30'; $darkTextClass = 'dark:text-purple-400';
                                } elseif (str_contains($bloodTypeValue, 'O')) {
                                $bgClass = 'bg-amber-100'; $textClass = 'text-amber-800';
                                $darkBgClass = 'dark:bg-amber-900/30'; $darkTextClass = 'dark:text-amber-400';
                                }
                                @endphp
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $bgClass }} {{ $textClass }} {{ $darkBgClass }} {{ $darkTextClass }}">
                                    {{ $bloodTypeValue }}
                                </span>
                                @else
                                <span class="text-slate-400 dark:text-slate-500">Not recorded</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">
                            <div class="flex flex-col items-center justify-center">
                                <flux:icon.face-frown class="w-12 h-12 text-slate-300 dark:text-slate-600 mb-2" />
                                <p class="text-lg font-medium">No patients found</p>
                                @if(request('search') || request('blood_type') || request('gender'))
                                <p class="text-sm mt-1">Try adjusting your search terms or filters</p>
                                @else
                                <p class="text-sm mt-1">No patients have been added to the system yet</p>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($patients->hasPages())
        <div class="p-4 border-t border-slate-200 dark:border-slate-700">
            {{ $patients->appends(request()->query())->links() }}
        </div>
        @endif
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Recently Added Patients</h2>
            <flux:button variant="ghost" size="sm" class="text-cyan-600 dark:text-cyan-400">
                View All
            </flux:button>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($patients->take(4) as $patient)
            <div class="bg-slate-50 dark:bg-slate-700/30 rounded-lg p-4 hover:shadow-md transition-all">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0 w-12 h-12">
                        <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden">
                            @if($patient->user->profile && $patient->user->profile->profile_picture)
                            <img src="{{ Storage::url($patient->user->profile->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                            @else
                            <flux:icon.user class="w-6 h-6 text-slate-600 dark:text-slate-400" />
                            @endif
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 dark:text-white truncate">
                            {{ $patient->user->first_name }} {{ $patient->user->last_name }}
                        </p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Added {{ $patient->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <flux:button variant="ghost" size="sm" icon="chevron-right" class="text-slate-600 dark:text-slate-400"></flux:button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('patientFilterForm');
        const searchInput = document.getElementById('searchInput');
        const bloodTypeSelect = document.getElementById('bloodTypeSelect');
        const genderSelect = document.getElementById('genderSelect');
        const filterSubmitButton = document.getElementById('filterSubmitButton');

        let typingTimer;
        const doneTypingInterval = 200;

        function buildUrlAndNavigate() {
            clearTimeout(typingTimer);

            const searchValue = searchInput.value.trim();
            const bloodTypeValue = bloodTypeSelect.value;
            const genderValue = genderSelect.value;

            const params = new URLSearchParams();

            if (searchValue) {
                params.append('search', searchValue);
            }
            if (bloodTypeValue) {
                params.append('blood_type', bloodTypeValue);
            }
            if (genderValue) { 
                params.append('gender', genderValue);
            }

            let queryString = params.toString();
            let newUrl = filterForm.action; 

            if (queryString) {
                newUrl += '?' + queryString;
            }

            const currentComparableSearch = new URLSearchParams(window.location.search);
            const currentCleanParams = new URLSearchParams();
            if (currentComparableSearch.get('search')) currentCleanParams.append('search', currentComparableSearch.get('search'));
            if (currentComparableSearch.get('blood_type')) currentCleanParams.append('blood_type', currentComparableSearch.get('blood_type'));
            if (currentComparableSearch.get('gender')) currentCleanParams.append('gender', currentComparableSearch.get('gender'));

            params.sort();
            currentCleanParams.sort();

            const currentCleanQueryString = currentCleanParams.toString();
            let currentUrlToCompare = filterForm.action;
            if (currentCleanQueryString) {
                currentUrlToCompare += '?' + currentCleanQueryString;
            }


            if (newUrl !== currentUrlToCompare) {
                window.location.href = newUrl;
            }
        }

        searchInput.addEventListener('input', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(buildUrlAndNavigate, doneTypingInterval);
        });

        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); 
                clearTimeout(typingTimer); 
                buildUrlAndNavigate(); 
            }
        });

        bloodTypeSelect.addEventListener('change', buildUrlAndNavigate);
        genderSelect.addEventListener('change', buildUrlAndNavigate);

        if (filterSubmitButton) {
            filterSubmitButton.addEventListener('click', function(event) {
                event.preventDefault(); 
                buildUrlAndNavigate(); 
            });
        }
    });
</script>

@endsection