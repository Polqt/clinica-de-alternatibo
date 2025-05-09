<flux:modal name="confirm-appointment-{{ $appointment->id }}" class="md:max-w-lg">
    <form action="{{ route('admin.appointments.confirm', $appointment->id) }}" method="POST" class="p-6">
        @csrf
        <h2 class="text-lg font-medium text-slate-900 dark:text-white">Confirm Appointment</h2>

        <p>
            Are you sure you want to cconfirm this appointment with {{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}?
        </p>
        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
            <strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}<br>
            <strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('g:i A') }}<br>
            <strong>Doctor:</strong> Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
        </p>

        <div class="mt-6 flex justify-end space-x-3">
            <flux:button type="button" variant="outline" data-modal-toggle="confirm-appointment-{{ $appointment->id }}">
                Cancel
            </flux:button>
            <flux:button type="submit" variant="outline">
                Confirm
            </flux:button>
        </div>
    </form>
</flux:modal>