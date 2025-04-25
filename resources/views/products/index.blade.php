<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Products</h1>
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Product</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full table-auto">
                <td class="px-4 py-2 text-right">
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                </td>
                <thead>
                    <tr class="bg-gray-100 text-left text-sm uppercase">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Brand</th>
                        <th class="px-4 py-2">Unit</th>
                        <th class="px-4 py-2">Qty</th>
                        <th class="px-4 py-2">Sale Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">{{ $product->category->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $product->brand->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $product->unit->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $product->quantity }}</td>
                            <td class="px-4 py-2">Rs. {{ number_format($product->sale_price, 2) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-4 py-4 text-center">No products found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
