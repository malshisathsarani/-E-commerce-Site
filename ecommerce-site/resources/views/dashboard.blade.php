<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WELCOME') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Cards Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <!-- Total Products Card -->
                <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
                    <div>
                        <h3 class="text-md font-semibold text-gray-700">Total Products</h3>
                        <p class="text-2xl font-bold text-indigo-600 mt-1">{{ \App\Models\Product::count() }}</p>
                        <a href="{{ route('products.index') }}" class="text-sm text-indigo-500 hover:underline mt-2 inline-block">View All Products</a>
                    </div>
                    <!-- Circular Mock Graph -->
                    <svg class="w-16 h-16" viewBox="0 0 36 36">
                        <path class="text-gray-200" d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none" stroke="currentColor" stroke-width="3" />
                        <path class="text-indigo-500" d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 15"
                            fill="none" stroke="currentColor" stroke-width="3" stroke-dasharray="40, 100" />
                        <text x="18" y="20.35" class="text-sm fill-gray-700 font-semibold text-center" text-anchor="middle">{{ \App\Models\Product::count() }}</text>
                    </svg>
                </div>

                <!-- Add New Product Card -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-md font-semibold text-gray-700">Add New Product</h3>
                    <p class="text-sm text-gray-600 mt-1">Easily add a new product to your store.</p>
                    <a href="{{ route('products.create') }}" class="mt-3 inline-block bg-indigo-500 text-white text-sm px-4 py-2 rounded hover:bg-indigo-600">Add Product</a>
                </div>
            </div>

            <!-- Product Table -->
            <div class="bg-white p-4 rounded-lg shadow mt-6">
                <h3 class="text-md font-semibold text-gray-700 mb-4">Product List</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-600">Image</th>
                                <th class="px-4 py-2 text-left text-gray-600">Name</th>
                                <th class="px-4 py-2 text-left text-gray-600">Description</th>
                                <th class="px-4 py-2 text-left text-gray-600">Price</th>
                                <th class="px-4 py-2 text-left text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach (\App\Models\Product::latest()->take(5)->get() as $product)
                                <tr>
                                    <td class="px-4 py-2">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded">
                                        @else
                                            <span class="text-gray-400 italic">No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $product->name }}</td>
                                    <td class="px-4 py-2">{{ \Illuminate\Support\Str::limit($product->description, 40) }}</td>
                                    <td class="px-4 py-2">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:underline">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <a href="{{ route('products.index') }}" class="text-indigo-500 hover:underline text-sm">View all products</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
