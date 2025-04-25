<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryLogController extends Controller
{
    public function index()
    {
        $logs = InventoryLog::with('product', 'user')->latest()->paginate(20);
        return view('inventory.logs', compact('logs'));
    }

    public function stockInForm(Product $product)
    {
        return view('inventory.stock-in', compact('product'));
    }

    public function stockIn(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'nullable|numeric',
            'lot_number' => 'nullable|string',
            'expiry_date' => 'nullable|date',
        ]);

        InventoryLog::create([
            'product_id' => $product->id,
            'type' => 'in',
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'lot_number' => $request->lot_number,
            'expiry_date' => $request->expiry_date,
            'user_id' => auth()->id()
        ]);

        // Update product stock
        $product->increment('quantity', $request->quantity);

        return redirect()->route('products.index')->with('success', 'Stock-in successful!');
    }

}
