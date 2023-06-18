<?php

namespace App\Http\Controllers;

use App\Models\RentalItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RentalsController extends Controller
{
    public function store(Request $request)
    {
        Log::info($request);
        $quantityRequested = $request->quantity;
        // get all rentalitem's rentals for the day and sum the quantity
        // fetch rental Item
        $rentalItem = RentalItem::find($request->rentalItem);
        $quantityAvailable = $rentalItem->quantity - $rentalItem->rentals()->where('date', $request->date)->sum('count');
        Log::info($quantityAvailable);

        if ($quantityRequested > $quantityAvailable) {
            return redirect()->route('rentalItems.show', ['rentalItem' => $request->rentalItem])->withErrors([
                'quantity' => 'Il ne reste plus que '.$quantityAvailable.' '.$rentalItem->name.' disponible(s) pour le '.$request->date.'.',
            ]);
        }

        if ($request->date == null) {
            return redirect()->route('rentalItems.show', ['rentalItem' => $request->rentalItem])->withErrors([
                'date' => 'Veuillez choisir une date.',
            ]);
        }

        if ($request->cgl == null) {
            return redirect()->route('rentalItems.show', ['rentalItem' => $request->rentalItem])->withErrors([
                'cgl' => 'Veuillez accepter les conditions générales de location.',
            ]);
        }

        $validated = $request->validate([
            'rentalItem' => 'required|exists:rental_items,id',
        ]);

        Log::info("before getting user");
        $casUser = session('cas_user');
        Log::info("Authenticated user is ".$casUser);

        $rentalItem->rentals()->create([
            'user_cas' => $casUser,
            'date' => $request->date,
            'count' => $request->quantity,
        ]);


        return redirect()->back()->with('success', 'Votre location a bien été enregistrée.');
    }
}
