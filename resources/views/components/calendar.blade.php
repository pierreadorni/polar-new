<div id="calendar" class="max-w-6xl"></div>
<script>

    const weekDayStringToJsNum = {
        monday: 1,
        tuesday: 2,
        wednesday: 3,
        thursday: 4,
        friday: 5,
        saturday: 6,
        sunday: 0,
    }

    // on document ready
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            const {Calendar, timeGridPlugin} = window.calendarVars;

            const timeSlots = @json($timeSlots);

            // create events from timeSlots
            const events = timeSlots.map((timeSlot) => {
                const startDate = new Date();
                startDate.setDate(startDate.getDate() + (weekDayStringToJsNum[timeSlot.weekday] - startDate.getDay()) % 7);
                startDate.setHours(timeSlot.start_time.split(':')[0]);
                startDate.setMinutes(timeSlot.start_time.split(':')[1]);
                startDate.setSeconds(0);

                const endDate = new Date();
                endDate.setDate(endDate.getDate() + (weekDayStringToJsNum[timeSlot.weekday] - endDate.getDay()) % 7);
                endDate.setHours(timeSlot.end_time.split(':')[0]);
                endDate.setMinutes(timeSlot.end_time.split(':')[1]);
                endDate.setSeconds(0);

                // return event object
                return {
                    id: timeSlot.id,
                    start: startDate,
                    title: `${timeSlot.members.length} permanencier${timeSlot.members.length === 1 ? "" : "s"}`,
                    end: endDate,
                    color: timeSlot.members.length === 0 ? '#D3B9B9FF' : (timeSlot.members.length === 1 ? '#A94040FF' : '#AC1010'),
                    textColor: timeSlot.members.length === 0 ? '#000000' : '#FFFFFF',
                }
            })

            console.log(events)


            let calendar = new Calendar(document.getElementById("calendar"), {
                    plugins: [timeGridPlugin],
                    initialView: 'agenda',
                    timeZone: 'local',
                    locale: 'fr',
                    headerToolbar: {
                        left: '',
                        center: '',
                        right: ''
                    },
                    views: {
                        agenda: {
                            type: 'timeGridWeek',
                            duration: {
                                days: 7
                            },
                            // hide day numbers
                            dayHeaderFormat: {
                                'weekday': 'short',
                            },
                            // start day at 8am
                            slotMinTime: '08:00:00',
                            // end day at 7pm
                            slotMaxTime: '19:00:00',
                            // show time as european format
                            slotLabelFormat: {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false
                            },
                            // hide all day events
                            allDaySlot: false,
                            nowIndicator: true,
                            // hide bottom
                            slotLabelInterval: '01:00:00',
                        }
                    },
                    navLinks: true,
                    editable: true,
                    selectable: false,
                    dayMaxEvents: true,
                    dateAlignment: 'week',
                    firstDay: 1,
                    // show length of events in day view
                    eventDisplay: 'block',
                    height: 'auto',
                    events: events,
                }
            )
            calendar.render();
        }
    }
</script>
