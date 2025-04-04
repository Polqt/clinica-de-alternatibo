@props([
    'title' => 'Complete Profile | MediCare',    
])

@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen">
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-teal-700 to-teal-400 flex-col justify-between p-12 text-white">
        <div>
            <h1 class="text-4xl font-bold text-teal-200">
                MediCare
            </h1>
            <p class="mt-6 text-xl font-light">Clinical Management Platform</p>

            <div class="mt-12">
                <h2 class="mb-2 text-2xl font-bold">Complete Your Profile</h2>
                <p class="text-teal-100 mb-4">We need a few more details to provide you with the best experience.</p>
                <ul class="space-y-4">
                    <li class="flex item-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Medical information for better care</span>
                    </li>
                    <li class="flex item-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Contact details for appointments</span>
                    </li>
                    <li class="flex item-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Personal information for your health record</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Complete Your Profile</h2>
                <p class="mt-2 text-gray-600">Please provide your personal and medical information</p>

                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-4">
                    {{ session('success') }}
                </div>
                @endif
            </div>

            <form action="{{ route('profile.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                
                <h3 class="font-semibold text-gray-800 text-lg border-b pb-2">Contact Information</h3>
                
                <div>
                    <x-forms.label for="phone-number" class="block text-sm font-medium text-gray-700" required>Phone Number</x-forms.label>
                    <x-forms.input
                        type="text"
                        name="phone-number"
                        id="phone-number"
                        placeholder="+1234567890"
                        :value="old('phone-number')"
                        class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                        required />
                    @error('phone-number')
                    <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-forms.label for="address" class="block text-sm font-medium text-gray-700" required>Address</x-forms.label>
                    <x-forms.textarea
                        name="address"
                        id="address"
                        placeholder="123 Main St, Apt 4B"
                        :value="old('address')"
                        class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                        required></x-forms.textarea>
                    @error('address')
                    <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-forms.label for="postal_code" class="block text-sm font-medium text-gray-700" required>Postal Code</x-forms.label>
                        <x-forms.input
                            type="text"
                            name="postal_code"
                            id="postal_code"
                            placeholder="10001"
                            :value="old('postal_code')"
                            class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                            required />
                        @error('postal_code')
                        <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-forms.label for="city" class="block text-sm font-medium text-gray-700" required>City</x-forms.label>
                        <x-forms.input
                            type="text"
                            name="city"
                            id="city"
                            placeholder="New York"
                            :value="old('city')"
                            class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                            required />
                        @error('city')
                        <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <h3 class="font-semibold text-gray-800 text-lg border-b pb-2 pt-4">Personal Information</h3>
                
                <div>
                    <x-forms.label for="date_of_birth" class="block text-sm font-medium text-gray-700" required>Date of Birth</x-forms.label>
                    <x-forms.input
                        type="date"
                        name="date_of_birth"
                        id="date_of_birth"
                        :value="old('date_of_birth')"
                        class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                        required />
                    @error('date_of_birth')
                    <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-forms.label for="gender" class="block text-sm font-medium text-gray-700" required>Gender</x-forms.label>
                        <x-forms.select
                            name="gender"
                            id="gender"
                            class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                            required>
                            <option value="">Select gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </x-forms.select>
                        @error('gender')
                        <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-forms.label for="blood_type" class="block text-sm font-medium text-gray-700" required>Blood Type</x-forms.label>
                        <x-forms.select
                            name="blood_type"
                            id="blood_type"
                            class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                            required>
                            <option value="">Select blood type</option>
                            <option value="A+" {{ old('blood_type') == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('blood_type') == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('blood_type') == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('blood_type') == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ old('blood_type') == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('blood_type') == 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ old('blood_type') == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('blood_type') == 'O-' ? 'selected' : '' }}>O-</option>
                        </x-forms.select>
                        @error('blood_type')
                        <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <x-forms.label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture (Optional)</x-forms.label>
                    <x-forms.input
                        type="file"
                        name="profile_picture"
                        id="profile_picture"
                        class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                        accept="image/*" />
                    @error('profile_picture')
                    <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <x-forms.button type="submit" class="w-full rounded-lg bg-teal-600 py-3 text-center font-medium text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors">
                    Complete Profile
                </x-forms.button>
            </form>
        </div>
    </div>
</div>

@endsection
