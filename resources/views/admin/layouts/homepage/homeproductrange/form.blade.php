@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ $product->exists ? 'Edit Product' : 'Add Product' }}
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Update the details and imagery for your home product range.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form
                action="{{ $product->exists ? route('homeproductrange.update', $product->id) : route('homeproductrange.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">

                @csrf
                @if ($product->exists)
                    @method('PUT')
                @endif

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Product Title</label>
                    <input type="text" name="title" value="{{ old('title', $product->title) }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        placeholder="Enter product name" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Product Image</label>

                    <div
                        class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-200 rounded-xl hover:border-[#B11E38]/40 transition-colors group bg-gray-50/30">
                        <svg class="w-10 h-10 text-gray-300 group-hover:text-[#B11E38] transition-colors mb-3"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>

                        <input type="file" name="image"
                            class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#B11E38]/10 file:text-[#B11E38] hover:file:bg-[#B11E38]/20 cursor-pointer">
                    </div>

                    @if ($product->image)
                        <div class="mt-4 flex items-center p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="w-16 h-16 bg-white rounded border border-gray-200 overflow-hidden flex-shrink-0">
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-contain">
                            </div>
                            <div class="ml-4">
                                <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Current Image</p>
                                <p class="text-xs text-stone-800 font-medium">Existing file will be kept if no new file is
                                    chosen.</p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 bg-[#B11E38] hover:bg-[#8E182D] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        {{ $product->exists ? 'Update Product' : 'Create Product' }}
                    </button>

                    <a href="{{ route('homeproductrange.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
