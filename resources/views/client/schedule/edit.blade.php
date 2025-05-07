<flux:modal name="edit_appointment" class="md:max-w-2xl">
    <form method="POST" action="{{ route('client.schedule.edit') }}">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <flux:heading size="lg">Edit Appointment</flux:heading>
                <flux:text class="mt-1 text-slate-500 dark:text-slate-400">Modify your scheduled appointment details.</flux:text>
            </div>
            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <div class="font-bold">Oops! Something went wrong.</div>
                <ul class="mt-1 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
                    <flux:select name="doctor_id" label="Select Doctor" required>
                        <option value="" disabled>Select a doctor</option>
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ isset($selectedAppointment) && $selectedAppointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                            Dr. {{ $doctor->first_name }} {{ $doctor->last_name }} - {{ $doctor->specialization->name }}
                        </option>
                        @endforeach
                    </flux:select>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div>
                        <flux:input
                            type="date"
                            name="appointment_date"
                            label="Appointment Date"
                            min="{{ now()->format('Y-m-d') }}"
                            value="{{ $selectedAppointment->appointment_date ?? old('appointment_date') }}"
                            required />
                    </div>

                    <div>
                        <flux:select name="appointment_time" label="Available Time Slots" required>
                            <option value="" disabled>Select time</option>
                            <option value="09:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '09:00:00' ? 'selected' : '' }}>9:00 AM</option>
                            <option value="10:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '10:00:00' ? 'selected' : '' }}>10:00 AM</option>
                            <option value="11:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '11:00:00' ? 'selected' : '' }}>11:00 AM</option>
                            <option value="12:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '12:00:00' ? 'selected' : '' }}>12:00 PM</option>
                            <option value="13:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '13:00:00' ? 'selected' : '' }}>1:00 PM</option>
                            <option value="14:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '14:00:00' ? 'selected' : '' }}>2:00 PM</option>
                            <option value="15:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '15:00:00' ? 'selected' : '' }}>3:00 PM</option>
                            <option value="16:00:00" {{ isset($selectedAppointment) && $selectedAppointment->appointment_time == '16:00:00' ? 'selected' : '' }}>4:00 PM</option>
                        </flux:select>
                    </div>
                </div>
            </div>

            <div>
                <flux:textarea
                    name="notes"
                    label="Additional Notes"
                    placeholder="Please include any symptoms or concerns you would like to discuss..."
                    rows="3">{{ $selectedAppointment->notes ?? old('notes') }}</flux:textarea>
                <input type="hidden" name="appointment_id" value="{{ $selectedAppointment->id ?? '' }}">
            </div>

            <div class="bg-slate-50 dark:bg-slate-800/50 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <flux:icon.info class="w-5 h-5 text-amber-500" />
                    </div>
                    <div class="ml-3">
                        <flux:heading size="xs" class="text-slate-900 dark:text-white">Modification Notice</flux:heading>
                        <flux:text class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Changes to your appointment less than 24 hours before the scheduled time may incur a rescheduling fee.
                            Please contact our office directly for urgent changes.
                        </flux:text>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between gap-3">
                <flux:button type="button" variant="outline" class="border-slate-300 text-slate-700 hover:bg-slate-50 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-800" data-flux-dismiss="modal">
                    Cancel
                </flux:button>
                <flux:button icon="save" type="submit" variant="primary" class="bg-amber-600 hover:bg-amber-700 dark:bg-amber-700 dark:hover:bg-amber-600 text-white">
                    Save Changes
                </flux:button>
            </div>
        </div>
    </form>
</flux:modal>
