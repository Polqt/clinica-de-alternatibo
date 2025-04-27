<flux:modal name="delete_doctor" class="md:max-w-lg">
    <form method="POST" action="{{ route('admin.doctor.delete', ['id' => $doctor->id ?? '']) }}">
        @csrf
        @method('DELETE')
        <div class="space-y-6 p-6">
            <div class="flex items-center justify-center">
                <div class="bg-red-100 dark:bg-red-900/30 rounded-full p-3">
                    <flux:icon.trash class="w-8 h-8 text-red-500 dark:text-red-400" />
                </div>
            </div>

            <div class="text-center">
                <flux:heading size="lg">Delete Doctor</flux:heading>
                <flux:text class="mt-2 text-slate-500 dark:text-slate-400">
                    Are you sure you want to delete this doctor? <br /> 
                    This action cannot be undone.
                </flux:text>
            </div>

            @if(isset($doctor))
            <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                <div class="font-medium">{{ $doctor->first_name }} {{ $doctor->last_name }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">License: {{ $doctor->license_number }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Specialization: {{ $doctor->specialization->name }}</div>
            </div>
            @endif

            <div class="flex justify-center gap-3">
                <flux:modal.close>
                    <flux:button type="button" variant="outline" class="text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600">
                        Cancel
                    </flux:button>
                </flux:modal.close>
                <flux:button icon="trash" type="submit" variant="danger">
                    Delete Doctor
                </flux:button>
            </div>
        </div>
    </form>
</flux:modal>