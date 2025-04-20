@props([
'title' => 'Edit Profile | Medicare'
])

<flux:modal name="edit_profile" class="md:w-96">
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal detail.</flux:text>
            </div>
            <flux:input name="first_name" label="First Name" aria-placeholder="Jani" value="{{ $first_name }}" />
            <flux:input name="last_name" label="Last Name" aria-placeholder="Spancilla" value="{{ $last_name }}" />
            <flux:input name="phone_number" label="Phone Number" aria-placeholder="09XXXXX" value="{{ $phone_number }}" />
            <flux:input name="date_of_birth" label="Date of Birth" type="date" value="{{ $date_of_birth }}" />
            <flux:select name="gender" label="Gender">
                <option value="Male" {{ $gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $gender == 'Female' ? 'selected' : '' }}>Female</option>
                value="Other" {{ $gender == 'Other' ? 'selected' : '' }}>Other</option>
            </flux:select>
            <flux:select name="blood_type" label="Blood Type">
                @foreach (\App\Enums\BloodType::values() as $bloodType )
                <option value="{{ $bloodType }}" {{ $bloodType == $bloodType ? 'selected' : '' }}>{{ $bloodType }}</option>
                @endforeach
            </flux:select>
            <flux:input name="address" label="Address" aria-placeholder="Jani Poblacion" value="{{ $address }}" />
            <flux:input name="city" label="City" aria-placeholder="Jani City" value="{{ $city }}" />
            <div class="flex">
                <flex:spacer />
                <flux:button type="submit" variant="outline">Save changes</flux:button>
            </div>
        </div>
    </form>
</flux:modal>