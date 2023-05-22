<?php

return [
    'timeZone' => config('app.timezone'),
    'locale' => config('app.locale'),
    'initialView' => 'agenda',
    'headerToolbar' => [
        'start' => '',
        'center' => '',
        'end' => ''
    ],
    'views' => [
        'agenda' => [
            'type' => 'timeGridWeek',
            'duration' => [
                'days' => 7,
            ],
            'firstDay' => 3,
            // hide day numbers
            'dayHeaderFormat' => [
                'weekday' => 'long',
            ],
            // start day at 8am
            'slotMinTime' => '08:00:00',
            // end day at 7pm
            'slotMaxTime' => '19:00:00',
            // show time as european format
            'slotLabelFormat' => [
                'hour' => '2-digit',
                'minute' => '2-digit',
                'hour12' => false
            ],
            // hide all day events
            'allDaySlot' => false,
            'nowIndicator' => true,
        ],
    ],
    'navLinks' => true,
    'editable' => true,
    'selectable' => false,
    'dayMaxEvents' => true,
    'dateAlignment' => 'week',
    'firstDay' => 1,
    // show length of events in day view
    'eventDisplay' => 'block',
];
