<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\InventoryItem;
use App\Models\Rental;
use Illuminate\Support\Facades\Log;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // build an array of the number of rented items, and the total money earned by week for the last 5 weeks
        $rentals = [];
        $revenue = [];
        for ($i = 5; $i >= 0; $i--) {
            $startOfweek = now();
            $endOfWeek = now();
            for ($j = 0; $j < $i; $j++) {
                $startOfweek = $startOfweek->subWeek();
                $endOfWeek = $endOfWeek->subWeek();
            }
            $startOfweek = $startOfweek->startOfWeek();
            $endOfWeek = $endOfWeek->endOfWeek();
            Log::info($startOfweek . " -> " . $endOfWeek);
            $rentals[] = Rental::whereBetween('date', [$startOfweek->subHour(), $endOfWeek])->sum('count');
            // multiply rental's count by rentals->rentalItems's price
            $revenue[] = Rental::whereBetween('date', [$startOfweek->subHour(), $endOfWeek])->get()->map(function ($rental) {
                return $rental->rental_item()->first()->price * $rental->count;
            })->sum();
        }

        return [
            Card::make('Inventory Items', InventoryItem::all()->count())
                ->icon('heroicon-o-collection'),
            Card::make('Items rented this week', $rentals[5])
                ->icon('heroicon-o-shopping-cart')
                ->description(($rentals[5]-$rentals[4] >= 0 ? "+" : "").($rentals[5]-$rentals[4]))
                ->chart($rentals)
                ->color($rentals[5]-$rentals[4] >= 0 ? 'success' : 'danger'),
            Card::make('Revenue this week',$revenue[5]."€")
                ->icon('heroicon-o-currency-euro')
                ->description(($revenue[5]-$revenue[4] >= 0 ? "+" : "").($revenue[5]-$revenue[4])."€")
                ->chart($revenue)
                ->color($revenue[5]-$revenue[4] >= 0 ? 'success' : 'danger'),
        ];
    }
}
