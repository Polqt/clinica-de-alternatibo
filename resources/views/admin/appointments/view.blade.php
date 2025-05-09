<flux:modal name="view-appointment-{{ $appointment->id }}" class="md:max-w-lg">
    <div class="p-6">
        <h2 class="text-lg font-medium text-slate-900 dark:text-white">Appointment Details</h2>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Patient Information</h3>
                <div class="mt-2 border-t border-slate-200 dark:border-slate-700 pt-2">
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Name:</span> {{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}
                    </p>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Patient ID:</span> {{ $appointment->patient->patient_identifier }}
                    </p>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Phone:</span> {{ $appointment->patient->user->profile->phone_number ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Doctor Information</h3>
                <div class="mt-2 border-t border-slate-200 dark:border-slate-700 pt-2">
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Name:</span> Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
                    </p>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Specialization:</span> {{ $appointment->doctor->specialization->name }}
                    </p>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Appointment Information</h3>
                <div class="mt-2 border-t border-slate-200 dark:border-slate-700 pt-2">
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Date:</span> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                    </p>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Time:</span> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('g:i A') }}
                    </p>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">
                        <span class="font-medium">Status:</span>
                        @php
                        $statusLabel = match($appointment->status) {
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled_patient' => 'Cancelled (Patient)',
                        'cancelled_clinic' => 'Cancelled (Clinic)',
                        default => ucfirst($appointment->status)
                        };
                        @endphp
                        {{ $statusLabel }}
                    </p>
                </div>
            </div>

            @if($appointment->notes)
            <div>
                <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400">Notes</h3>
                <div class="mt-2 border-t border-slate-200 dark:border-slate-700 pt-2">
                    <p class="text-sm text-slate-900 dark:text-white">
                        {{ $appointment->notes }}
                    </p>
                </div>
            </div>
            @endif
        </div>
    </div>
</flux:modal>