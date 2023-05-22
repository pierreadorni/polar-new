import './bootstrap';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import resourceTimelinePlugin from '@fullcalendar/resource-timeline';
import interactionPlugin from '@fullcalendar/interaction';
import momentPlugin from '@fullcalendar/moment';
import momentTimezonePlugin from '@fullcalendar/moment-timezone';
import locales from '@fullcalendar/core/locales-all';

window.calendarVars = {
    Calendar,
    timeGridPlugin,
    dayGridPlugin,
    listPlugin,
    resourceTimelinePlugin,
    interactionPlugin,
    momentPlugin,
    momentTimezonePlugin,
    locales
}

