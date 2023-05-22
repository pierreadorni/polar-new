<?php

namespace App\View\Components;

use App\Models\TimeSlot;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Calendar extends Component
{
    /**
     * Create a new component instance.
     */
    public $timeSlots;
    public function __construct()
    {
        $this->timeSlots = TimeSlot::all();
        // load members for each timeslot
        foreach ($this->timeSlots as $timeslot) {
            $timeslot->load('members');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calendar');
    }
}
