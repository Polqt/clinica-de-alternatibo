<flux:modal name="complete-appointment-{{ $appointment->id }}" class="md:max-w-lg">
    <form action="{{ route('admin.appointments.complete', $appointment->id) }}" method="POST" class="p-6">
        @csrf
        <h2 class="text-lg font-medium text-slate-900 dark:text-white">Complete Appointment</h2>

        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
            Mark this appointment as completed for {{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}.
        </p>
        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
            <strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}<br>
            <strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('g:i A') }}<br>
            <strong>Doctor:</strong> Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
        </p>

        <div class="mt-4">
            <label for="clinic_notes" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Clinic Notes</label>
            <textarea id="clinic_notes" name="clinic_notes" rows="3" class="mt-1 block w-full rounded-md border-slate-300 dark:border-slate-700 dark:bg-slate-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required></textarea>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <flux:button type="button" variant="outline" data-modal-toggle="complete-appointment-{{ $appointment->id }}">
                Cancel
            </flux:button>
            <flux:button type="submit" variant="primary">
                Mark as Complete
            </flux:button>
        </div>
    </form>
</flux:modal>
