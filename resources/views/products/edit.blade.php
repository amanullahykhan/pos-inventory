<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white shadow p-6 rounded space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Category</label>
                    <select name="category_id" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Brand</label>
                    <select name="brand_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Unit</label>
                    <select name="unit_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ $product->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Quantity</label>
                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Purchase Price</label>
                    <input type="number" name="purchase_price" step="0.01" value="{{ $product->purchase_price }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Sale Price</label>
                    <input type="number" name="sale_price" step="0.01" value="{{ $product->sale_price }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
