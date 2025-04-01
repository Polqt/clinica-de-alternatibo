@props([
'title' => 'Login | MediCare',
])

@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen items-center justify-center p-6">
    <div class="w-full max-w-md rounded-xl p-8 shadow-lg">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-teal-900">
                Medi<span class="text-teal-500">Care</span>
            </h1>
        </div>
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <x-forms.label for="email" class="block text-sm font-medium text-teal-800">Email Address</x-forms.label>
                <x-forms.input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="poyhidalgo@example.com"
                    :value="old('email')"
                    class="w-full rounded-lg border border-gray-300/70 p-2 focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500/30 transition-all"
                    required />
                @error('email')
                <span class="text-red-500 mt-1 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-forms.label for="password" class="block text-sm font-medium text-teal-800">Password</x-forms.label>
                <x-forms.input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full rounded-lg border border-gray-300/70 p-2 focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500/30 transition-all"
                    required />
                @error('password')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <x-forms.button type="submit" class="w-full text-md rounded-lg bg-teal-600 py-2 text-center font-medium text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors">
                Sign in
            </x-forms.button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('signup') }}" class="font-medium text-teal-600 hover:text-teal-500 hover:underline transition-colors">Sign up now</a>
            </p>
        </div>
    </div>
</div>
@endsection