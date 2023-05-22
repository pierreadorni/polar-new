<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalResource\Pages;
use App\Filament\Resources\RentalResource\RelationManagers;
use App\Models\Rental;
use App\Models\RentalItem;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('rental_item_id')
                    ->searchable()
                    ->reactive()
                    ->relationship('rental_item', 'name'),
                Forms\Components\TextInput::make('user_cas')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->disabledDates(function (Closure $get) {
                        $rentalItem = RentalItem::all()->find($get('rental_item_id'));
                        if ($rentalItem) {
                            // create an array of the sum of all rentals counts for each date

                            // filter out past dates
                            $rentals = $rentalItem->rentals->filter(function ($rental) {
                                // $rental->date is a string of a date
                                return $rental->date >= now()->format('Y-m-d');
                            });

                            // create empty array
                            $dates = [];
                            // loop through rentals
                            foreach ($rentals as $rental) {
                                // if the date is already in the array, add the count to the existing value
                                if (array_key_exists($rental->date, $dates)) {
                                    $dates[$rental->date] += $rental->count;
                                } else {
                                    // otherwise, create a new key with the count
                                    $dates[$rental->date] = $rental->count;
                                }
                            }
                            // keep only dates where the sum of all rentals is greater than the quantity
                            $dates = array_filter($dates, function ($count) use ($rentalItem) {
                                return $count >= $rentalItem->quantity;
                            });
                            // return the keys of the array
                            return array_keys($dates);
                        }
                        return [];
                    })
                    ->reactive()
                    ->required(),
                Forms\Components\TextInput::make('count')
                    ->required()
                    ->numeric()
                    ->minValue(1)// max is dependent on the selected rental item
                    ->maxValue(function (Closure $get) {
                            $rentalItem = RentalItem::all()->find($get('rental_item_id'));
                            if ($rentalItem) {
                                // get the sum of all rentals for the selected date
                                $rentals = $rentalItem->rentals->filter(function ($rental) use ($get) {
                                    // parse date string to date object
                                    $rentalDate = date_create_from_format('Y-m-d', $rental->date);
                                    return $rentalDate == $get('date');
                                });
                                $count = 0;
                                foreach ($rentals as $rental) {
                                    $count += $rental->count;
                                }
                                // subtract the sum from the quantity to get the max
                                return $rentalItem->quantity - $count;
                            }
                            return 10000;
                        })
                ->label(function (Closure $get) {
                    $rentalItem = RentalItem::all()->find($get('rental_item_id'));
                    if ($rentalItem) {
                        $rentals = $rentalItem->rentals->filter(function ($rental) use ($get) {
                            $rentalDate = date_create_from_format('Y-m-d', $rental->date);
                            $selectedDate = date_create_from_format('Y-m-d', $get('date'));
                            return $rentalDate == $selectedDate;
                        });
                        $count = 0;
                        foreach ($rentals as $rental) {
                            $count += $rental->count;
                        }
                        $count_max = $rentalItem->quantity - $count;
                        return 'Count (date: '.$rentalItem->rentals->last()->date.')';
                    }
                    return 'Count';
                })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rental_item.name'),
                Tables\Columns\TextColumn::make('user_cas'),
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('count'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}
