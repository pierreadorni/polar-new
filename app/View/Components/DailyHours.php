<?php

namespace App\View\Components;

use App\Models\TimeSlot;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class DailyHours extends Component
{

    public $timeSlots;
    public $open;
    public $minOpeningTime;
    public $maxClosingTime;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // get today's day as a string
        $today = [
            1 => 'monday',
            2 => 'tuesday',
            3 => 'wednesday',
            4 => 'thursday',
            5 => 'friday',
            6 => 'saturday',
            7 => 'sunday'
        ][date('w')];
        // get timesolts for the day
        $this->timeSlots = TimeSlot::where('weekday', $today)->get();
        // load members for each timeslot
        foreach ($this->timeSlots as $timeslot) {
            $timeslot->load('members');
        }


        // get the minimum opening time
        $this->minOpeningTime = Timeslot::all()->min('start_time');
        // get the maximum closing time
        $this->maxClosingTime = Timeslot::all()->max('end_time');

        // if there are no timeslots, set minOpeningTime to 8am and maxClosingTime to 6:30pm
        if (Timeslot::all()->count() == 0) {
            $this->minOpeningTime = '08:00:00';
            $this->maxClosingTime = '18:30:00';
        }


        // get the current time
        $now = date('H:i:s');
        // get the current timeslot
        $currentTimeSlot = $this->timeSlots->filter(function ($timeslot) use ($now) {
            return $timeslot->start_time <= $now && $timeslot->end_time >= $now;
        })->first();
        if (!$currentTimeSlot) {
            Log::info('No current timeslot');
            $this->open = false;
            return;
        }
        Log::info('Current timeslot: ' . $currentTimeSlot);
        if ($currentTimeSlot->members->count() == 0) {
            Log::info('No members in current timeslot');
            $this->open = false;
            return;
        }
        $this->open = true;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.daily-hours');
    }
}
