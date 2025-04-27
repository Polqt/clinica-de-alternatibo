<flux:modal name="edit_doctor" class="md:max-w-2xl">
    <form method="POST" action="{{ route('admin.doctor.edit', ['id' => $doctor->id ?? '']) }}">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <flux:heading size="lg">Edit Doctor</flux:heading>
                <flux:text class="mt-1 text-slate-500 dark:text-slate-400">Update doctor information in the system.</flux:text>
            </div>

            <div>
                <flux:heading size="sm" class="text-gray-700 dark:text-gray-300 mb-4">Doctor Information</flux:heading>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <flux:input
                        name="first_name"
                        label="First Name"
                        placeholder="Enter first name"
                        value="{{ $doctor->first_name ?? old('first_name') }}"
                        required />
                    <flux:input
                        name="last_name"
                        label="Last Name"
                        placeholder="Enter last name"
                        value="{{ $doctor->last_name ?? old('last_name') }}"
                        required />
                    <flux:input
                        name="license_number"
                        label="License Number"
                        placeholder="Enter license number"
                        value="{{ $doctor->license_number ?? old('license_number') }}"
                        required />
                    <flux:select
                        name="specialization_id"
                        label="Specialization"
                        required>
                        <option value="">Select Specialization</option>
                        @foreach ($specializations as $specialization)
                        <option value="{{ $specialization->id }}"
                            {{ (isset($doctor) && $doctor->specialization_id == $specialization->id) || old('specialization_id') == $specialization->id ? 'selected' : '' }}>
                            {{ $specialization->name }}
                        </option>
                        @endforeach
                    </flux:select>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between gap-3">
                <flux:modal.close>
                    <flux:button type="button" variant="outline" class="text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600">
                        Cancel
                    </flux:button>
                </flux:modal.close>
                <flux:button icon="check" type="submit" variant="filled">
                    Save Changes
                </flux:button>
            </div>
        </div>
    </form>
</flux:modal>