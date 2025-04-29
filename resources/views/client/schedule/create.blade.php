<!-- Create Appointment Modal -->
<flux:modal name="create_appointment" class="md:max-w-2xl">
    <form method="POST" action="{{ route('client.appointments.create') }}">
        @csrf
        <div class="space-y-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <flux:heading size="lg">Schedule New Appointment</flux:heading>
                <flux:text class="mt-1 text-slate-500 dark:text-slate-400">Book your visit with one of our healthcare professionals.</flux:text>
            </div>

            <!-- Doctor Selection with Avatar -->
            <div>
                <flux:heading size="sm" class="text-gray-700 dark:text-gray-300 mb-4">Select Doctor</flux:heading>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
                    @foreach($doctors as $doctor)
                    <label class="relative flex items-center p-3 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                        <input type="radio" name="doctor_id" value="{{ $doctor->id }}" class="hidden peer" required>
                        <div class="flex flex-1 items-center gap-3">
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-slate-900 dark:text-white truncate">Dr. {{ $doctor->name }}</p>
                                <p class="text-sm text-slate-500 dark:text-slate-400 truncate">{{ $doctor->specialization }}</p>
                            </div>
                        </div>
                        <div class="absolute right-3 opacity-0 peer-checked:opacity-100">
                            <div class="w-5 h-5 bg-teal-500 rounded-full flex items-center justify-center">
                                <flux:icon.check class="w-3 h-3 text-white" />
                            </div>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Date and Time Selection -->
            <div>
                <flux:heading size="sm" class="text-gray-700 dark:text-gray-300 mb-4">Appointment Details</flux:heading>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <!-- Date Picker -->
                    <div>
                        <flux:input
                            type="date"
                            name="appointment_date"
                            label="Appointment Date"
                            min="{{ now()->format('Y-m-d') }}"
                            required />
                    </div>

                    <!-- Time Slots -->
                    <div>
                        <flux:select name="appointment_time" label="Available Time Slots" required>
                            <option value="" disabled selected>Select time</option>
                            @foreach($timeSlots as $slot)
                            <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </flux:select>
                    </div>
                </div>
            </div>

            <!-- Additional Notes -->
            <div>
                <flux:textarea
                    name="notes"
                    label="Additional Notes"
                    placeholder="Please include any symptoms or concerns you would like to discuss..."
                    rows="3"></flux:textarea>
            </div>

            <!-- Summary Card -->
            <div class="bg-slate-50 dark:bg-slate-800/50 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-1">
                        <flux:icon.info class="w-5 h-5 text-teal-500" />
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

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between gap-3">
                <flux:button type="submit" variant="primary" class="bg-teal-600 hover:bg-teal-700 dark:bg-teal-500 dark:hover:bg-teal-600 text-white">
                    <flux:icon.calendar-plus class="w-4 h-4 mr-2" />
                    Schedule Appointment
                </flux:button>
                <flux:modal.close>
                    <flux:button type="button" variant="outline" class="text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600">Cancel</flux:button>
                </flux:modal.close>
            </div>
        </div>
    </form>
</flux:modal>