@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">📦 Stock In: {{ $product->name }}</h2>

    <form method="POST" action="{{ route('inventory.stockin', $product->id) }}">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1">Quantity <span class="text-red-500">*</span></label>
            <input type="number" name="quantity" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Purchase Price (optional)</label>
            <input type="number" name="purchase_price" step="0.01" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Lot Number (optional)</label>
            <input type="text" name="lot_number" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-6">
            <label class="block font-medium mb-1">Expiry Date (optional)</label>
            <input type="date" name="expiry_date" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('products.index') }}" class="text-gray-600 mr-4">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded">
                ➕ Add Stock
            </button>
        </div>
    </form>
</div>
@endsection
