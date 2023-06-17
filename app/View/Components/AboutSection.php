<?php

namespace App\View\Components;

use App\Settings\WebsiteSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutSection extends Component
{
    /**
     * Create a new component instance.
     */

    public string $aboutText;

    public function __construct(WebsiteSettings $settings)
    {
        $this->aboutText = $settings->aboutText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-section');
    }
}
