<?php

namespace App\View\Components;

use App\Settings\WebsiteSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public string $title;
    public string $headerMessage;

    public function __construct(WebsiteSettings $settings, string $title = 'Le Polar')
    {
        $this->title = $title;
        $this->headerMessage = $settings->headerMessage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
