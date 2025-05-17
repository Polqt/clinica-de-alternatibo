<flux:modal name="edit_profile" class="md:max-w-2xl">
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <flux:heading size="lg">Edit Profile</flux:heading>
                <flux:text class="mt-1 text-slate-500 dark:text-slate-400">Make changes to your personal detail.</flux:text>
            </div>

            <div class="flex flex-col items-center sm:flex-row sm:items-start gap-6">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-gray-100 dark:bg-gray-600 flex items-center justify-center overflow-hidden border border-gray-200 dark:border-gray-700">
                        @if ($profile_picture)
                        <img src="{{ $profile_picture }}" alt="Profile" class="w-full h-full object-cover" />
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @endif
                    </div>
                    <label for="profile_picture" class="absolute -bottom-1 -right-1 bg-white dark:bg-gray-800 rounded-full p-1 border border-gray-200 dark:border-gray-700 cursor-pointer shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">

                        <flux:icon.camera class="w-4 h-4" />
                    </label>
                    <input name="profile_picture" id="profile_picture" type="file" accept="image/*" class="hidden" />
                </div>

                <div class="w-full space-y-1">
                    <flux:text class="font-medium text-sm text-gray-700 dark:text-gray-300">Profile Photo</flux:text>
                    <flux:text class="text-xs text-gray-500 dark:text-gray-400">Upload a new photo or keep your current one</flux:text>
                </div>
            </div>

            <div>
                <flux:heading size="sm" class="text-gray-700 dark:text-gray-300 mb-4">Personal Information</flux:heading>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <flux:input name="first_name" label="First Name" value="{{ $first_name }}" />
                    <flux:input name="last_name" label="Last Name" value="{{ $last_name }}" />
                    <flux:input name="phone_number" label="Phone Number" value="{{ $phone_number }}" />
                    <flux:input name="date_of_birth" label="Date of Birth" type="date" value="{{ old('date_of_birth', $date_of_birth?->format('Y-m-d')) }}" />
                    <flux:select name="gender" label="Gender">
                        <option value="" disabled>Select gender</option>
                        @foreach($genders as $gender)
                        <option value="{{ $gender }}" {{ old('gender') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                        @endforeach
                    </flux:select>
                    <flux:select name="blood_type" label="Blood Type">
                        <option value="" disabled>Select blood type</option>
                        @foreach($bloodTypes as $type)
                        <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </flux:select>
                </div>
            </div>

            <div>
                <flux:heading size="sm" class="text-gray-700 dark:text-gray-300 mb-4">Address</flux:heading>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="sm:col-span-2">
                        <flux:input name="address" label="Street Address" value="{{ $address }}" />
                    </div>
                    <flux:input name="city" label="City" value="{{ $city }}" />
                    <flux:input name="postal_code" label="Postal Code" value="{{ $postal_code ?? '' }}" />
                </div>
            </div>
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between gap-3">
                <flux:button type="submit" variant="outline" class="bg-teal-600 hover:bg-teal-700 dark:bg-teal-500 dark:hover:bg-teal-600 text-white">Save Changes</flux:button>
                <flux:button type="button" variant="outline" class="text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600">Cancel</flux:button>
            </div>
        </div>
    </form>
</flux:modal>