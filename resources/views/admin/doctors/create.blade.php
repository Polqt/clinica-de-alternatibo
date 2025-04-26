<flux:modal name="create_doctor" class="md:max-w-2xl">
    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center">
            <flux:icon.user-plus class="w-5 h-5 text-blue-500 mr-2" />
            Add New Doctor
        </h3>
    </div>

    <form method="POST" action="{{ route('admin.doctor.create') }}">
        @csrf
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <flux:label for="first_name">First Name</flux:label>
                    <flux:input
                        type="text"
                        id="first_name"
                        name="first_name"
                        class="w-full mt-1"
                        placeholder="Enter first name"
                        value="{{ old('first_name') }}"
                        required />
                    @error('first_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <flux:label for="last_name">Last Name</flux:label>
                    <flux:input
                        type="text"
                        id="last_name"
                        name="last_name"
                        class="w-full mt-1"
                        placeholder="Enter last name"
                        value="{{ old('last_name') }}"
                        required />
                    @error('last_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <flux:label for="license_number">License Number</flux:label>
                    <flux:input
                        type="text"
                        id="license_number"
                        name="license_number"
                        class="w-full mt-1"
                        placeholder="Enter license number"
                        value="{{ old('license_number') }}"
                        required />
                    @error('license_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <flux:label for="specialization_id">Specialization</flux:label>
                    <flux:select
                        id="specialization_id"
                        name="specialization_id"
                        class="w-full mt-1"
                        required>
                        <option value="">Select Specialization</option>
                        @foreach($specializations as $specialization)
                        <option value="{{ $specialization->id }}" {{ old('specialization_id') == $specialization->id ? 'selected' : '' }}>
                            {{ $specialization->name }}
                        </option>
                        @endforeach
                    </flux:select>
                    @error('specialization_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-slate-700 flex justify-end space-x-2">
            <flux:modal.close>
                <flux:button variant="outline" type="button">
                    Cancel
                </flux:button>
            </flux:modal.close>

            <flux:button type="submit" icon="user-plus">
                Add Doctor
            </flux:button>
        </div>
    </form>
</flux:modal>