@props([
'title' => 'Edit Profile',
])

@extends('layouts.client')
@section('content')
<flux:modal name="edit-profile" class="md:w-96">
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>

            <flux:input name="first_name" label="First Name" placeholder="Your first name" value="{{ $first_name }}" />
            <flux:input name="last_name" label="Last Name" placeholder="Your last name" value="{{ $last_name }}" />
            <flux:input name="phone_number" label="Phone Number" placeholder="Your phone number" value="{{ $phone_number }}" />
            <flux:input name="date_of_birth" label="Date of birth" type="date" value="{{ $date_of_birth }}" />

            <flux:select name="gender" label="Gender">
                <option value="Male" {{ $gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $gender == 'Other' ? 'selected' : '' }}>Other</option>
            </flux:select>

            <flux:select name="blood_type" label="Blood Type">
                @foreach(\App\Enums\BloodType::values() as $bloodType)
                <option value="{{ $bloodType }}" {{ $blood_type == $bloodType ? 'selected' : '' }}>{{ $bloodType }}</option>
                @endforeach
            </flux:select>

            <flux:input name="address" label="Address" placeholder="Your address" value="{{ $address }}" />
            <flux:input name="city" label="City" placeholder="Your city" value="{{ $city }}" />

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </form>
</flux:modal>
@endsection