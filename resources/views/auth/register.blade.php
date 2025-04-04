@props([
'title' => 'Signup | MediCare',
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
                <h2 class="mb-2 text-2xl font-bold">Why Join MediCare?</h2>
                <ul class="space-y-4">
                    <li class="flex item-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Streamlined patient management</span>
                    </li>
                    <li class="flex item-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Simplied appointment scheduling</span>
                    </li>
                    <li class="flex item-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Simplied appointment scheduling</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Create your account</h2>
                <p class="mt-2 text-gray-600">Create your account in just a few steps</p>
            </div>

            <div class="flex justify-normal items-center mb-8">
                <div class="flex-1">
                    <div class="w-8 h-8 mx-auto rounded-full bg-teal-600 text-white flex items-center justify-center font-medium">1</div>
                    <p class="text-xs mt-1 text-center text-teal-600 font-medium">Account</p>
                </div>
                <div class="flex-1 flex">
                    <div class="h-1 flex-1 bg-gray-300"></div>
                </div>
                <div class="flex-1">
                    <div class="w-8 h-8 mx-auto rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-medium">2</div>
                    <p class="text-xs mt-1 text-center text-gray-500">Verification</p>
                </div>
                <div class="flex-1 flex">
                    <div class="h-1 flex-1 bg-gray-300"></div>
                </div>
                <div class="flex-1">
                    <div class="w-8 h-8 mx-auto rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-medium">3</div>
                    <p class="text-xs mt-1 text-center text-gray-500">Profile</p>
                </div>
            </div>

            <form action="{{ route('signup') }}" method="POST" class="space-y-5 p-6 rounded-xl shadow-sm border border-gray-100">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-forms.label for="first_name" class="block text-sm font-medium text-gray-700" required>First Name</x-forms.label>
                        <x-forms.input
                            type="text"
                            name="first_name"
                            id="first_name"
                            placeholder="Jul"
                            :value="old('first_name')"
                            class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                            required />
                        @error('first_name')
                        <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-forms.label for="last_name" class="block text-sm font-medium text-gray-700" required>Last Name</x-forms.label>
                        <x-forms.input
                            type="text"
                            name="last_name"
                            id="last_name"
                            placeholder="Maps"
                            :value="old('last_name')"
                            class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                            required />
                        @error('last_name')
                        <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <x-forms.label for="email" class="block text-sm font-medium text-gray-700" required>Email Address</x-forms.label>
                    <x-forms.input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="julmaps@gmail.com"
                        :value="old('email')"
                        class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                        required />
                    @error('email')
                    <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-forms.label for="password" class="block text-sm font-medium text-gray-700" required>Password</x-forms.label>
                    <x-forms.input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full rounded-lg border border-gray-300 p-3 mt-1 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500 transition-all"
                        required />
                    @error('password')
                    <span class="text-red-500 mt-1 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <x-forms.button type="submit" class="w-full rounded-lg bg-teal-600 py-3 text-center font-medium text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors">
                    Continue
                </x-forms.button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-teal-600 hover:text-teal-500 transition-colors">
                        Sign in
                    </a>
                </p>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection