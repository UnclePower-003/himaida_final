@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                    Product Categories
                </h2>
                <p class="text-[#C9962A] text-sm font-medium mt-1">Organize your inventory by visual groups</p>
            </div>

            <a href="{{ route('productcategories.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-[#B11E38] hover:bg-[#8E182D] text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="12 4v16m8-8H4"></path>
                </svg>
                Add Category
            </a>
        </div>

        @if (session('success'))
            <div
                class="mb-6 p-4 bg-green-50 border-l-4 border-[#0E733D] text-[#0E733D] rounded-r-lg text-sm font-medium shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($categories->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($categories as $cat)
                    <div
                        class="group bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col">

                        <div class="relative h-48 w-full flex items-center justify-center p-6 transition-transform duration-500"
                            style="background-color: {{ $cat->bg_color ?? '#f9fafb' }};">
                            <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->title }}"
                                class="max-h-full max-w-full object-contain transform group-hover:scale-110 transition-transform duration-300">
                        </div>

                        <div class="p-5 flex flex-col flex-grow">
                            <h5 class="text-lg font-bold text-gray-800 mb-1 group-hover:text-[#B11E38] transition-colors">
                                {{ $cat->title }}
                            </h5>

                            <div class="flex items-center mt-auto pb-4">
                                <span
                                    class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mr-2">Background</span>
                                <span class="text-xs font-mono text-stone-800 bg-stone-100 px-2 py-0.5 rounded">
                                    {{ $cat->bg_color ?? '#FFFFFF' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-50 mt-auto">
                                <a href="{{ route('productcategories.edit', $cat->id) }}"
                                    class="text-sm font-bold text-amber-600 hover:text-amber-700 transition-colors flex items-center">
                                    <i class="fas fa-edit mr-1.5"></i> Edit
                                </a>

                                <form action="{{ route('productcategories.destroy', $cat->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm font-bold text-red-600 hover:text-red-700 transition-colors flex items-center"
                                        onclick="return confirm('Delete this category?')">
                                        <i class="fas fa-trash-alt mr-1.5"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl py-20 text-center">
                <div class="bg-gray-200 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-600">No categories found</h3>
                <p class="text-gray-400 text-sm mt-1">Get started by creating your first product category.</p>
            </div>
        @endif
    </div>
@endsection
