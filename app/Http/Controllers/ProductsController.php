<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem;

class ProductsController extends Controller
{
    // index takes ?q= as a parameter
    public function index(Request $request)
    {
        // if there is a query string, search for it
        if ($request->has('q')) {
            $products = InventoryItem::where('name', 'like', '%' . $request->input('q') . '%')->get();
            return view('products', [
                'products' => $products,
            ]);
        }
        // otherwise, return all products
        $products = InventoryItem::all();
        return view('products', [
            'products' => $products,
        ]);
    }
}
