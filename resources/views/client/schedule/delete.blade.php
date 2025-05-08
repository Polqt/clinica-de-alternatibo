<flux:modal name="delete_appointment" class="md:max-w-lg" title="Delete Appointment">
    <form id="deleteAppointmentForm" method="POST" action="{{ route('client.schedule.delete') }}">
        @csrf
        @method('DELETE')
        <div class="space-y-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <flux:heading size="lg">Cancel Appointment</flux:heading>
                <flux:text class="mt-1 text-slate-500 dark:text-slate-400">Are you sure you want to cancel this appointment?</flux:text>
            </div>

            @if(isset($selectedAppointment))
            <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-100 dark:border-red-800">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <flux:icon.circle-alert class="w-5 h-5 text-red-500" />
                    </div>
                    <div class="ml-3">
                        <flux:heading size="xs" class="text-red-800 dark:text-red-300">Appointment Details</flux:heading>
                        <div class="mt-2 space-y-2 text-sm text-red-700 dark:text-red-300">
                            <p><span class="font-medium">Doctor:</span> Dr. {{ $selectedAppointment->doctor->first_name }} {{ $selectedAppointment->doctor->last_name }}</p>
                            <p><span class="font-medium">Date:</span> {{ \Carbon\Carbon::parse($selectedAppointment->appointment_date)->format('F j, Y') }}</p>
                            <p><span class="font-medium">Time:</span> {{ \Carbon\Carbon::parse($selectedAppointment->appointment_time)->format('g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div id="appointment_details_container" class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-100 dark:border-red-800 hidden">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <flux:icon.circle-alert class="w-5 h-5 text-red-500" />
                    </div>
                    <div class="ml-3">
                        <flux:heading size="xs" class="text-red-800 dark:text-red-300">Appointment Details</flux:heading>
                        <div id="appointment_details" class="mt-2 space-y-2 text-sm text-red-700 dark:text-red-300">
                            <!-- Will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" id="delete_appointment_id" name="appointment_id" value="{{ $selectedAppointment->id ?? '' }}">

            <div class="bg-slate-50 dark:bg-slate-800/50 rounded-lg p-4 border border-slate-200 dark:border-slate-700">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <flux:icon.info class="w-5 h-5 text-red-500" />
                    </div>
                    <div class="ml-3">
                        <flux:heading size="xs" class="text-slate-900 dark:text-white">Cancellation Policy</flux:heading>
                        <flux:text class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Appointments cancelled less than 24 hours before the scheduled time may be subject to a cancellation fee.
                            This slot will be made available to other patients once cancelled.
                        </flux:text>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between gap-3">
                <flux:button type="button" variant="outline" class="border-slate-300 text-slate-700 hover:bg-slate-50 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-800" data-flux-dismiss="modal">
                    Keep Appointment
                </flux:button>
                <flux:button icon="trash" type="submit" variant="danger" class="bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-600 text-white">
                    Cancel Appointment
                </flux:button>
            </div>
        </div>
    </form>
</flux:modal>