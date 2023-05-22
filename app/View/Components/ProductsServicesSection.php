<?php

namespace App\View\Components;

use App\Models\InventoryItem;
use App\Models\RentalItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsServicesSection extends Component
{

    public $products;
    public $services;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->products = InventoryItem::take(3)->get();
        $this->services = RentalItem::take(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.products-services-section');
    }
}
