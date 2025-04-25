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
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <flux:label for="first_name">First Name</flux:label>
                    <flux:input type="text" id="first_name" name="first_name" class="w-full mt-1" required />
                </div>

                <div>
                    <flux:label for="last_name">Last Name</flux:label>
                    <flux:input type="text" id="last_name" name="last_name" class="w-full mt-1" required />
                </div>

                <div>
                    <flux:label for="license_number">License Number</flux:label>
                    <flux:input type="text" id="license_number" name="license_number" class="w-full mt-1" required />
                </div>
            </div>
        </div>

        <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-slate-700 flex justify-end space-x-2">
            <flux:modal.close>
                <flux:button variant="outline" type="button">
                    Cancel
                </flux:button>
            </flux:modal.close>

            <flux:button type="submit">
                Add Doctor
            </flux:button>
        </div>
    </form>
</flux:modal>
