<?php

namespace App\Filament\Widgets;

use App\Models\TimeSlot;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Support\Facades\Log;

class CalendarWidget extends FullCalendarWidget
{
    /**
     * Return events that should be rendered statically on calendar.
     */
    protected static ?int $sort = 2;

    public function getViewData(): array
    {
        $timeslots = TimeSlot::all();
        $events = [];
        foreach ($timeslots as $timeslot) {
            $weekday = $timeslot->weekday; // is a string 'monday' ...
            $start = $timeslot->start_time; // is a time
            $end = $timeslot->end_time; // is a time

            // Convert weekday and times to a datetime this week
            $start = new \DateTime($weekday . ' this week ' . $start);
            $end = new \DateTime($weekday . ' this week ' . $end);

            // color is green if there are 2 or 3 members
            // orange if there is 1 member
            // red if there are 0 members

            $events[] = [
                'id' => $timeslot->id,
                'title' => $timeslot->members->count() . ' members',
                'start' => $start->format('Y-m-d H:i:s'),
                'end' => $end->format('Y-m-d H:i:s'),
                'allDay' => false,
                'color' => $timeslot->members->count() == 0 ? '#D3B9B9FF' : ($timeslot->members->count() == 1 ? '#A94040FF' : '#AC1010'),
                'textColor' => $timeslot->members->count() == 0 ? 'black' : 'white',
            ];
        }
        // log events
        return $events;
    }

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {
        // You can use $fetchInfo to filter events by date.
        return [];
    }

}
