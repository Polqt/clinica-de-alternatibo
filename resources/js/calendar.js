import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const events = typeof calendarEvents !== 'undefined' && calendarEvents ?
        JSON.parse(calendarEvents) : [];
    
    let selectedAppointmentId = null;
    const editBtn = document.querySelector('[data-flux-trigger="edit_appointment"]');
    const deleteBtn = document.querySelector('[data-flux-trigger="delete_appointment"]');
    
    // Initially disable the edit and delete buttons
    if (editBtn) editBtn.classList.add('opacity-50', 'cursor-not-allowed');
    if (deleteBtn) deleteBtn.classList.add('opacity-50', 'cursor-not-allowed');

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        height: 'auto',
        events: events,
        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
        },
        longPressDelay: 100,
        eventLongPressDelay: 100,
        selectLongPressDelay: 100,
        eventDidMount: function (info) {
            styleEventElement(info);
        },
        eventClick: function(info) {
            // Select the appointment when clicked
            selectedAppointmentId = info.event.id;
            
            // Enable edit and delete buttons
            if (editBtn) {
                editBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                editBtn.dataset.appointmentId = selectedAppointmentId;
            }
            if (deleteBtn) {
                deleteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                deleteBtn.dataset.appointmentId = selectedAppointmentId;
            }
            
            // Highlight the selected event
            document.querySelectorAll('.fc-event').forEach(el => {
                el.classList.remove('selected-appointment');
            });
            info.el.classList.add('selected-appointment');
            
            // Update the hidden inputs in the edit and delete forms
            document.querySelectorAll('input[name="appointment_id"]').forEach(input => {
                input.value = selectedAppointmentId;
            });
            
            // Load appointment data for edit form
            if (info.event.extendedProps) {
                const doctorIdElement = document.querySelector('#editAppointmentForm select[name="doctor_id"]');
                if (doctorIdElement) {
                    const doctorId = info.event.extendedProps.doctor_id;
                    if (doctorId) {
                        doctorIdElement.value = doctorId;
                    }
                }
                
                const dateElement = document.querySelector('#editAppointmentForm input[name="appointment_date"]');
                if (dateElement && info.event.start) {
                    dateElement.value = formatDateForInput(info.event.start);
                }
                
                const timeElement = document.querySelector('#editAppointmentForm select[name="appointment_time"]');
                if (timeElement && info.event.start) {
                    timeElement.value = formatTimeForInput(info.event.start);
                }
                
                const notesElement = document.querySelector('#editAppointmentForm textarea[name="notes"]');
                if (notesElement) {
                    notesElement.value = info.event.extendedProps.notes || '';
                }
            }
        }
    });

    calendar.render();
    
    if (editBtn) {
        editBtn.addEventListener('click', function(e) {
            if (!selectedAppointmentId) {
                e.preventDefault();
                alert('Please select an appointment first');
            }
        });
    }
    
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function(e) {
            if (!selectedAppointmentId) {
                e.preventDefault();
                alert('Please select an appointment first');
            }
        });
    }
    
    const todayBtn = document.querySelector('[data-calendar-today]');
    if (todayBtn) {
        todayBtn.addEventListener('click', function() {
            calendar.today();
        });
    }
});

function formatDateForInput(date) {
    const d = new Date(date);
    let month = '' + (d.getMonth() + 1);
    let day = '' + d.getDate();
    const year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function formatTimeForInput(date) {
    const d = new Date(date);
    let hours = '' + d.getHours();
    let minutes = '' + d.getMinutes();
    let seconds = '00';

    if (hours.length < 2) hours = '0' + hours;
    if (minutes.length < 2) minutes = '0' + minutes;

    return [hours, minutes, seconds].join(':');
}

function styleEventElement(info) {
    const status = info.event.extendedProps.status;
    if (!status) return;

    const dotColor = getStatusDotColor(status);
    const bgColor = getStatusBackgroundColor(status);

    info.el.style.borderLeft = `4px solid ${dotColor}`;
    info.el.style.backgroundColor = bgColor;
    addEventTooltip(info);
}

function addEventTooltip(info) {
    const tooltip = document.createElement('div');
    tooltip.className = 'appointment-tooltip';
    tooltip.innerHTML = `
        <div class="p-2 bg-white dark:bg-slate-800 rounded shadow-lg border border-slate-200 dark:border-slate-700">
            <p class="font-bold">${info.event.extendedProps.doctor}</p>
            <p class="text-xs">${info.event.extendedProps.specialization}</p>
            <p class="text-xs mt-1">${formatDate(info.event.start)} at ${formatTime(info.event.start)}</p>
            <span class="inline-block px-2 py-0.5 mt-1 text-xs rounded-full ${getStatusColor(info.event.extendedProps.status)}">${info.event.extendedProps.status}</span>
            ${info.event.extendedProps.notes ? '<p class="text-xs mt-1 italic">Has notes</p>' : ''}
        </div>
    `;

    info.el.addEventListener('mouseover', function () {
        document.body.appendChild(tooltip);
        positionTooltip(tooltip, info.el);
    });

    info.el.addEventListener('mouseout', function () {
        if (document.body.contains(tooltip)) {
            document.body.removeChild(tooltip);
        }
    });
}

function positionTooltip(tooltip, targetEl) {
    const rect = targetEl.getBoundingClientRect();
    tooltip.style.position = 'absolute';
    tooltip.style.zIndex = 1000;
    tooltip.style.top = (rect.bottom + window.scrollY) + 'px';
    tooltip.style.left = (rect.left + window.scrollX) + 'px';
}

function formatDate(date) {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString(undefined, options);
}

function formatTime(date) {
    const options = { hour: 'numeric', minute: '2-digit', hour12: true };
    return new Date(date).toLocaleTimeString(undefined, options);
}

function getStatusColor(status) {
    switch (status.toLowerCase()) {
        case 'scheduled': return 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300';
        case 'completed': return 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300';
        case 'cancelled':
        case 'cancelledbyclinic':
        case 'cancelledbypatient': return 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300';
        case 'rescheduled': return 'bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300';
        case 'confirmed': return 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300';
        default: return 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300';
    }
}

function getStatusDotColor(status) {
    switch (status.toLowerCase()) {
        case 'scheduled': return '#3b82f6'; 
        case 'completed': return '#10b981';
        case 'cancelled':
        case 'cancelledbyclinic':
        case 'cancelledbypatient': return '#ef4444'; 
        case 'rescheduled': return '#f59e0b'; 
        case 'confirmed': return '#6366f1'; 
        default: return '#64748b'; 
    }
}

function getStatusBackgroundColor(status) {
    switch (status.toLowerCase()) {
        case 'scheduled': return 'rgba(59, 130, 246, 0.1)'; 
        case 'completed': return 'rgba(16, 185, 129, 0.1)'; 
        case 'cancelled':
        case 'cancelledbyclinic':
        case 'cancelledbypatient': return 'rgba(239, 68, 68, 0.1)';
        case 'rescheduled': return 'rgba(245, 158, 11, 0.1)'; 
        case 'confirmed': return 'rgba(99, 102, 241, 0.1)'; 
        default: return 'rgba(148, 163, 184, 0.1)'; 
    }
}

const style = document.createElement('style');
style.textContent = `
    .selected-appointment {
        box-shadow: 0 0 0 2px #3b82f6 !important;
        position: relative;
        z-index: 5;
    }
`;
document.head.appendChild(style);