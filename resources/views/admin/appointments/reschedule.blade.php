<flux:modal name="edit-appointment-{{ $appointment->id }}">
    <form action="{{ route('admin.appointments.reschedule', $appointment->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        <h2 class="text-lg font-medium text-slate-900 dark:text-white">Reschedule Appointment</h2>

        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
            Update appointment details for {{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}.
        </p>

        <div class="mt-4 grid grid-cols-1 gap-4">
            <div>
                <flux:select name="doctor_id" label="Doctor" required>
                    @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                        Dr. {{ $doctor->first_name }} {{ $doctor->last_name }} - {{ $doctor->specialization->name }}
                    </option>
                    @endforeach
                </flux:select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <flux:input
                        type="date"
                        name="appointment_date"
                        label="Appointment Date"
                        value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}"
                        min="{{ now()->format('Y-m-d') }}"
                        required />
                </div>

                <div>
                    <flux:select name="appointment_time" label="Time" required>
                        @php
                        $times = [
                        '09:00:00' => '9:00 AM',
                        '10:00:00' => '10:00 AM',
                        '11:00:00' => '11:00 AM',
                        '12:00:00' => '12:00 PM',
                        '13:00:00' => '1:00 PM',
                        '14:00:00' => '2:00 PM',
                        '15:00:00' => '3:00 PM',
                        '16:00:00' => '4:00 PM',
                        ];
                        $currentTime = \Carbon\Carbon::parse($appointment->appointment_date)->format('H:i:s');
                        @endphp

                        @foreach ($times as $value => $label)
                        <option value="{{ $value }}" {{ $currentTime == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                        @endforeach
                    </flux:select>
                </div>
            </div>

            <div>
                <flux:textarea
                    name="reschedule_reason"
                    label="Reason for Rescheduling"
                    placeholder="Please provide a reason for rescheduling..."
                    rows="3"></flux:textarea>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <flux:button type="button" variant="outline" data-modal-toggle="edit-appointment-{{ $appointment->id }}">
                Cancel
            </flux:button>
            <flux:button type="submit" variant="primary">
                Update Appointment
            </flux:button>
        </div>
    </form>
</flux:modal>
