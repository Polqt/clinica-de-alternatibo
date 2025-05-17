<flux:modal name="create_appointment" class="md:max-w-2xl">
    <form method="POST" action="{{ route('client.schedule.store') }}" id="createAppointmentForm">
        @csrf
        <div class="space-y-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <flux:heading size="lg">Schedule New Appointment</flux:heading>
                <flux:text class="mt-1 text-slate-500 dark:text-slate-400">Book your visit with one of our healthcare professionals.</flux:text>
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

            <!-- Time slot availability warning -->
            <div id="create-availability-warning" class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded hidden">
                <div class="font-bold">Time Slot Not Available</div>
                <p class="mt-1 text-sm" id="create-availability-message">This time slot is already booked.</p>
            </div>

            <div>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
                    <flux:select name="doctor_id" label="Select Doctor" required id="create-doctor-select">
                        <option value="" disabled selected>Select a doctor</option>
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">
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
                            id="create-appointment-date"
                            label="Appointment Date"
                            min="{{ now()->format('Y-m-d') }}"
                            required />
                    </div>

                    <div>
                        <flux:select name="appointment_time" id="create-appointment-time" label="Available Time Slots" required>
                            <option value="" disabled selected>Select time</option>
                            <option value="09:00:00">9:00 AM</option>
                            <option value="10:00:00">10:00 AM</option>
                            <option value="11:00:00">11:00 AM</option>
                            <option value="12:00:00">12:00 PM</option>
                            <option value="13:00:00">1:00 PM</option>
                            <option value="14:00:00">2:00 PM</option>
                            <option value="15:00:00">3:00 PM</option>
                            <option value="16:00:00">4:00 PM</option>
                        </flux:select>
                    </div>
                </div>
            </div>

            <div>
                <flux:textarea
                    name="notes"
                    label="Additional Notes"
                    placeholder="Please include any symptoms or concerns you would like to discuss..."
                    rows="3"></flux:textarea>
            </div>

            <div class="bg-slate-50 dark:bg-slate-800/50 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <flux:icon.info class="w-5 h-5 text-cyan-500" />
                    </div>
                    <div class="ml-3">
                        <flux:heading size="xs" class="text-slate-900 dark:text-white">Appointment Information</flux:heading>
                        <flux:text class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Please arrive 15 minutes before your scheduled time. Bring your insurance card and ID.
                            Cancellations must be made at least 24 hours in advance to avoid fees.
                        </flux:text>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between gap-3">
                <flux:button icon="calendar-plus" type="submit" variant="primary" id="create-submit-button" class="bg-cyan-600 hover:bg-cyan-700 dark:bg-cyan-700 dark:hover:bg-cyan-600 text-white">
                    Schedule Appointment
                </flux:button>
            </div>
        </div>
    </form>
</flux:modal>