<flux:modal name="delete_doctor_{{ $doctor->id }}" class="md:max-w-md">
    <form method="POST" action="{{ route('admin.doctor.delete', ['id' => $doctor->id]) }}">
        @csrf
        @method('DELETE')
        <div class="space-y-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <flux:heading size="lg">Confirm Deletion</flux:heading>
                <flux:text class="mt-1 text-slate-500 dark:text-slate-400">Are you sure you want to delete this doctor?</flux:text>
            </div>
            <div class="text-center">
                <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <flux:icon.exclamation-triangle class="w-8 h-8 text-red-500" />
                </div>
                <flux:text>You are about to delete <strong>{{ $doctor->first_name }} {{ $doctor->last_name }}</strong>.</flux:text>
                <flux:text class="text-slate-500 mt-2">This action cannot be undone.</flux:text>
            </div>
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-center gap-3">
                <flux:modal.close>
                    <flux:button type="button" variant="outline">
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