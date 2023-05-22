<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\InventoryItem;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Inventory Items', InventoryItem::all()->count())
                ->icon('heroicon-o-collection'),
            Card::make('Items sold', '0')
                ->icon('heroicon-o-shopping-cart')
                ->description('This week'),
            Card::make('Revenue', '0.00€')
                ->icon('heroicon-o-currency-dollar')
                ->description('This week'),
        ];
    }
}
