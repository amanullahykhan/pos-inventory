<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Add New Product</h1>
            <a href="{{ route('products.index') }}" class="text-sm text-blue-600 hover:underline">← Back to List</a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" class="bg-white shadow p-6 rounded space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium">Product Name</label>
                <input type="text" name="name" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Barcode</label>
                <input type="text" name="barcode" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Category</label>
                    <select name="category_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">Select</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Brand</label>
                    <select name="brand_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Select</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Unit</label>
                    <select name="unit_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Select</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Quantity</label>
                    <input type="number" name="quantity" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" min="0">
                </div>

                <div>
                    <label class="block text-sm font-medium">Purchase Price</label>
                    <input type="number" name="purchase_price" step="0.01" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" min="0">
                </div>

                <div>
                    <label class="block text-sm font-medium">Sale Price</label>
                    <input type="number" name="sale_price" step="0.01" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" min="0">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Product</button>
            </div>
        </form>
    </div>
</x-app-layout>
