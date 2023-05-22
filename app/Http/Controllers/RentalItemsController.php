<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalItem;
class RentalItemsController extends Controller
{
    public function index(Request $request)
    {
        // if there is a query string, search for it
        if ($request->has('q')) {
            $rentalItems = RentalItem::where('name', 'like', '%' . $request->input('q') . '%')->get();
            return view('services', [
                'rentalItems' => $rentalItems,
            ]);
        }
        $rentalItems = RentalItem::all();
        return view('services', [
            'rentalItems' => $rentalItems,
        ]);
    }
}
