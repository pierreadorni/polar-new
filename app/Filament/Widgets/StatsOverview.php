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
            $rentals[] = Rental::whereBetween('date', [$startOfweek, $endOfWeek])->count();
            // multiply rental's count by rentals->rentalItems's price
            $revenue[] = Rental::whereBetween('date', [$startOfweek, $endOfWeek])->get()->map(function ($rental) {
                return $rental->rental_item()->first()->price * $rental->count;
            })->sum();
        }

        return [
            Card::make('Inventory Items', InventoryItem::all()->count())
                ->icon('heroicon-o-collection'),
            Card::make('Items rented', Rental::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count())
                ->icon('heroicon-o-shopping-cart')
                ->description('This week')
                ->chart($rentals),
            Card::make('Revenue this week', Rental::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->map(function ($rental) {
                return $rental->rental_item()->first()->price * $rental->count;
            })->sum()."€")
                ->icon('heroicon-o-currency-euro')
                ->description("+".($revenue[5]-$revenue[4])."€")
                ->chart($revenue)
                ->color('success'),
        ];
    }
}
