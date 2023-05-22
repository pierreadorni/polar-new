<?php

namespace App\View\Components;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TeamSection extends Component
{

    public $members;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // members are the first 5 members in the database
        $this->members = Member::take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.team-section');
    }
}
