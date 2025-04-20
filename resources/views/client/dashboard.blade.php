@props([
'title' => 'Dashboard | MediCare',

])

@extends('layouts.client')
@section('content')

<div clasvcontainer mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome back, {{ $first_name }}!</h1>
            <p class="text-slate-6000 dark:text-slate-400 mt-1">Here's an overview of your health appointments</p>
        </div>
        <div class="mt-4 md:mt-0">
            <flux:button href="{{ route('client.schedule') }}" icon="calendar-plus">Book New Appointment</flux:button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        
    </div>

</div>

@endsection