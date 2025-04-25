<flux:modal name="delete_doctor" class="max-w-md">
    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center">
            <flux:icon.trash class="w-5 h-5 text-red-500 mr-2" />
            Delete Doctor
        </h3>
    </div>

    <div class="p-6">
        <p class="text-slate-700 dark:text-slate-300">
            Are you sure you want to delete this doctor? This action cannot be undone.
        </p>

        <input type="hidden" id="doctor_id_to_delete" name="doctor_id" value="">
    </div>

    <div class="px-6 py-4 dark:bg-slate-800/50 border-t border-slate-200 dark:border-slate-700 flex justify-end space-x-2">
        <flux:modal.close>
            <flux:button variant="outline" type="button">
                Cancel
            </flux:button>
        </flux:modal.close>

        <form id="delete-doctor-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <flux:button type="submit">
                Delete Doctor
            </flux:button>
        </form>
    </div>
</flux:modal>