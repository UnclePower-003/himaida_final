@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                    Home Product Range
                </h2>
                <h3 class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                    Manage products showcased on your landing page.
                </h3>
            </div>

            <a href="{{ route('homeproductrange.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-[#B11E38] hover:bg-[#8E182D] text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="12 4v16m8-8H4"></path>
                </svg>
                Add Product
            </a>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] w-32 text-center">
                                Image</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Product Title
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-[#8E182D] w-48">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50/80 transition-colors group">
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        @if ($product->image)
                                            <div
                                                class="w-16 h-16 rounded-lg bg-gray-50 border border-gray-100 flex items-center justify-center p-1 overflow-hidden">
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->title }}"
                                                    class="max-h-full max-w-full object-contain transform group-hover:scale-110 transition-transform">
                                            </div>
                                        @else
                                            <div class="w-16 h-16 rounded-lg bg-gray-100 flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="text-sm font-semibold text-gray-800 group-hover:text-[#B11E38] transition-colors leading-relaxed">
                                        {{ $product->title }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center space-x-4">
                                        <a href="{{ route('homeproductrange.edit', $product->id) }}"
                                            class="text-amber-500 hover:text-amber-600 font-bold text-sm transition-colors uppercase tracking-tight">
                                            Edit
                                        </a>

                                        <span class="text-gray-200">|</span>

                                        <form action="{{ route('homeproductrange.destroy', $product->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-700 font-bold text-sm transition-colors uppercase tracking-tight"
                                                onclick="return confirm('Remove this product?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($products->isEmpty())
                <div class="py-16 text-center">
                    <div class="bg-gray-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-gray-500 font-medium">No products in this range yet</h3>
                    <p class="text-gray-400 text-sm">Add your first product to see it appear here.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
